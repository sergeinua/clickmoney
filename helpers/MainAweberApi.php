<?php
namespace app\helpers;

use linslin\yii2\curl\Curl;
use Yii;
use app\helpers\CurlObject;
use app\helpers\CurlResponse;

Class MainAweberApi
{
    /**
     * @var String Location for API calls
     */
    public $baseUri = 'https://api.aweber.com/1.0';

    /**
     * @var String Location to request an access token
     */
    public $accessTokenUrl = 'https://auth.aweber.com/1.0/oauth/access_token';

    /**
     * @var String Location to authorize an Application
     */
    public $authorizeUrl = 'https://auth.aweber.com/1.0/oauth/authorize';

    /**
     * @var String Location to request a request token
     */
    public $requestTokenUrl = 'https://auth.aweber.com/1.0/oauth/request_token';

    public $debug = false;

    public $userAgent = 'AWeber OAuth Consumer Application 1.0 - https://labs.aweber.com/';

    public $format = false;

    public $requiresTokenSecret = true;

    public $signatureMethod = 'HMAC-SHA1';
    public $version         = '1.0';

    public $curl = false;

    /**
     * @var OAuthUser User currently interacting with the service provider
     */
    public $user = false;

    // Data binding this OAuthApplication to the consumer application it is acting
    // as a proxy for
    public $consumerKey = false;
    public $consumerSecret = false;
    /*user*/
    public $authorizedToken = false;
    public $requestToken = false;
    public $verifier = false;
    public $tokenSecret = false;
    public $accessToken = false;

    public function getBaseUri() {
        return $this->baseUri;
    }

    public function removeBaseUri($url) {
        return str_replace($this->getBaseUri(), '', $url);
    }

    public function getAccessTokenUrl() {
        return $this->accessTokenUrl;
    }

    public function getAuthorizeUrl() {
        return $this->authorizeUrl;
    }

    public function getRequestTokenUrl() {
        return $this->requestTokenUrl;
    }

    public function getAuthTokenFromUrl() { return ''; }

    public function getUserData() { return ''; }

    public function __construct($consumerKey, $consumerSecret)
    {
        $this->consumerKey    = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->curl = new CurlObject();
    }

    /**
     * request
     *
     * Implemented for a standard OAuth adapter interface
     * @param mixed $method
     * @param mixed $uri
     * @param array $data
     * @param array $options
     * @access public
     * @return void
     */
    public function request($method, $uri, $data = array(), $options = array()) {
        $uri = $this->removeBaseUri($uri);
        $url = $this->getBaseUri() . $uri;

        # WARNING: non-primative items in data must be json serialized in GET and POST.
        if ($method == 'POST' or $method == 'GET') {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $data[$key] = json_encode($value);
                }
            }
        }

        $response = $this->makeRequest($method, $url, $data);
        if (!empty($options['return'])) {
            if ($options['return'] == 'status') {
                return $response->headers['Status-Code'];
            }
            if ($options['return'] == 'headers') {
                return $response->headers;
            }
            if ($options['return'] == 'integer') {
                return intval($response->body);
            }
        }

        $data = json_decode($response->body, true);


        return $data;
    }

    /**
     * makeRequest
     *
     * Public facing function to make a request
     *
     * @param mixed $method
     * @param mixed $url  - Reserved characters in query params MUST be escaped
     * @param mixed $data - Reserved characters in values MUST NOT be escaped
     * @access public
     * @return void
     */
    public function makeRequest($method, $url, $data=array()) {
        if ($this->debug) echo "\n** {$method}: $url\n";

        switch (strtoupper($method)) {
            case 'POST':
                $oauth = $this->prepareRequest($method, $url, $data);
                $resp = $this->post($url, $oauth);
                break;

            case 'GET':
                $oauth = $this->prepareRequest($method, $url, $data);
                $resp = $this->get($url, $oauth, $data);
                break;

            case 'DELETE':
                $oauth = $this->prepareRequest($method, $url, $data);
                $resp = $this->delete($url, $oauth);
                break;

            case 'PATCH':
                $oauth = $this->prepareRequest($method, $url, array());
                $resp  = $this->patch($url, $oauth, $data);
                break;
        }

        // enable debug output
        if ($this->debug) {
            echo "<pre>";
            print_r($oauth);
            echo " --> Status: {$resp->headers['Status-Code']}\n";
            echo " --> Body: {$resp->body}";
            echo "</pre>";
        }

        if (!$resp) {
            $msg  = 'Unable to connect to the AWeber API.  (' . $this->error . ')';
            $error = array('message' => $msg, 'type' => 'APIUnreachableError',
                'documentation_url' => 'https://labs.aweber.com/docs/troubleshooting');
            throw new AWeberAPIException($error, $url);
        }

        return $resp;
    }

    /**
     * prepareRequest
     *
     * @param mixed $method     HTTP method
     * @param mixed $url        URL for the request
     * @param mixed $data       The data to generate oauth data and be signed
     * @access public
     * @return void             The data, with all its OAuth variables and signature
     */
    public function prepareRequest($method, $url, $data) {
        $data = $this->mergeOAuthData($data);
        $data = $this->signRequest($method, $url, $data);
        return $data;
    }

    /**
     * mergeOAuthData
     *
     * @param mixed $requestData
     * @access public
     * @return void
     */
    public function mergeOAuthData($requestData) {
        $oauthData = $this->getOAuthRequestData();
        return array_merge($requestData, $oauthData);
    }

    /**
     * signRequest
     *
     * Signs the request.
     *
     * @param mixed $method     HTTP method
     * @param mixed $url        URL for the request
     * @param mixed $data       The data to be signed
     * @access public
     * @return array            The data, with the signature.
     */
    public function signRequest($method, $url, $data) {
        $base = $this->createSignatureBase($method, $url, $data);
        $key  = $this->createSignatureKey();
        $data['oauth_signature'] = $this->createSignature($base, $key);
        ksort($data);
        return $data;
    }

    /**
     * getOAuthRequestData
     *
     * Get all the pre-signature, OAuth specific parameters for a request.
     * @access public
     * @return void
     */
    public function getOAuthRequestData() {
        $token = $this->getHighestPriorityToken();
        $ts = $this->generateTimestamp();
        $nonce = $this->generateNonce($ts);
        return array(
            'oauth_token' => $token,
            'oauth_consumer_key' => $this->consumerKey,
            'oauth_version' => $this->version,
            'oauth_timestamp' => $ts,
            'oauth_signature_method' => $this->signatureMethod,
            'oauth_nonce' => $nonce);
    }

    /**
     * createSignatureBase
     *
     * @param mixed $method     String name of HTTP method, such as "GET"
     * @param mixed $url        URL where this request will go
     * @param mixed $data       Array of params for this request. This should
     *      include ALL oauth properties except for the signature.
     * @access public
     * @return void
     */
    public function createSignatureBase($method, $url, $data) {
        $method = $this->encode(strtoupper($method));
        $query = parse_url($url, PHP_URL_QUERY);
        if ($query) {
            $parts = explode('?', $url, 2);
            $url = array_shift($parts);
            $items = explode('&', $query);
            foreach ($items as $item) {
                list($key, $value) = explode('=', $item);
                $data[rawurldecode($key)] = rawurldecode($value);
            }
        }
        $url = $this->encode($url);
        $data = $this->encode($this->collapseDataForSignature($data));

        return $method.'&'.$url.'&'.$data;
    }

    /**
     * createSignatureKey
     *
     * Creates a key that will be used to sign our signature.  Signatures
     * are signed with the consumerSecret for this consumer application and
     * the token secret of the user that the application is acting on behalf
     * of.
     * @access public
     * @return void
     */
    public function createSignatureKey() {
        return $this->consumerSecret.'&'.$this->tokenSecret;
    }

    /**
     * createSignature
     *
     * Creates a signature on the signature base and the signature key
     * @param mixed $sigBase    Base string of data to sign
     * @param mixed $sigKey     Key to sign the data with
     * @access public
     * @return string   The signature
     */
    public function createSignature($sigBase, $sigKey) {
        switch ($this->signatureMethod) {
            case 'HMAC-SHA1':
            default:
                return base64_encode(hash_hmac('sha1', $sigBase, $sigKey, true));
        }
    }

    /**
     * getHighestPriorityToken
     *
     * Returns highest priority token - used to define authorization
     * state for a given OAuthUser
     * @access public
     * @return void
     */
    public function getHighestPriorityToken() {
        if (!empty($this->accessToken)) return $this->accessToken;
        if (!empty($this->authorizedToken)) return $this->authorizedToken;
        if (!empty($this->requestToken)) return $this->requestToken;

        // Return no token, new user
        return '';
    }

    /**
     * generateTimestamp
     *
     * Generates a timestamp, in seconds
     * @access public
     * @return int Timestamp, in epoch seconds
     */
    public function generateTimestamp() {
        return time();
    }

    /**
     * generateNonce
     *
     * Generates a 'nonce', which is a unique request id based on the
     * timestamp.  If no timestamp is provided, generate one.
     * @param mixed $timestamp Either a timestamp (epoch seconds) or false,
     *  in which case it will generate a timestamp.
     * @access public
     * @return string   Returns a unique nonce
     */
    public function generateNonce($timestamp = false) {
        if (!$timestamp) $timestamp = $this->generateTimestamp();
        return md5($timestamp.'-'.rand(10000,99999).'-'.uniqid());
    }

    /**
     * encode
     *
     * Short-cut for utf8_encode / rawurlencode
     * @param mixed $data   Data to encode
     * @access protected
     * @return void         Encoded data
     */
    protected function encode($data) {
        return rawurlencode($data);
    }

    /**
     * collapseDataForSignature
     *
     * Turns an array of request data into a string, as used by the oauth
     * signature
     * @param mixed $data
     * @access public
     * @return void
     */
    public function collapseDataForSignature($data) {
        ksort($data);
        $collapse = '';
        foreach ($data as $key => $val) {
            if (!empty($collapse)) $collapse .= '&';
            $collapse .= $key.'='.$this->encode($val);
        }
        return $collapse;
    }

    /**
     * Request a request token from AWeber and associate the
     * provided $callbackUrl with the new token
     * @param String The URL where users should be redirected
     *     once they authorize your app
     * @return Array Contains the request token as the first item
     *     and the request token secret as the second item of the array
     */
    public function getRequestToken($callbackUrl) {
        $requestToken = $this->_getRequestToken($callbackUrl);
        return array($requestToken, $this->tokenSecret);
    }

    /**
     * getRequestToken
     *
     * Gets a new request token / secret for this user.
     * @access public
     * @return void
     */
    public function _getRequestToken($callbackUrl=false) {
        $data = ($callbackUrl)? array('oauth_callback' => $callbackUrl) : array();
        $resp = $this->makeRequest('POST', $this->getRequestTokenUrl(), $data);
        $data = $this->parseResponse($resp);
        $this->requiredFromResponse($data, array('oauth_token', 'oauth_token_secret'));
        $this->requestToken = $data['oauth_token'];
        $this->tokenSecret  = $data['oauth_token_secret'];
        return $data['oauth_token'];
    }

    /**
     * parseResponse
     *
     * Parses the body of the response into an array
     * @param mixed $string     The body of a response
     * @access public
     * @return void
     */
    public function parseResponse($resp) {
        $data = array();

        if (!$resp) {       return $data; }
        if (empty($resp)) { return $data; }
        if (empty($resp->body)) { return $data; }

        switch ($this->format) {
            case 'json':
                $data = json_decode($resp->body);
                break;
            default:
                parse_str($resp->body, $data);
        }
        $this->parseAsError($data);
        return $data;
    }

    /**
     * requiredFromResponse
     *
     * Enforce that all the fields in requiredFields are present and not
     * empty in data.  If a required field is empty, throw an exception.
     *
     * @param mixed $data               Array of data
     * @param mixed $requiredFields     Array of required field names.
     * @access protected
     * @return void
     */
    protected function requiredFromResponse($data, $requiredFields) {
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new AWeberOAuthDataMissing($field);
            }
        }
    }

    /**
     * post
     *
     * Prepare an OAuth post method.
     *
     * @param mixed $url    URL where we are making the request to
     * @param mixed $data   Data that is used to make the request
     * @access protected
     * @return void
     */
    protected function post($url, $oauth) {
        $handle = $this->curl->init($url);
        $postData = $this->buildData($oauth);
        $this->curl->setopt($handle, CURLOPT_POST, true);
        $this->curl->setopt($handle, CURLOPT_POSTFIELDS, $postData);
        $resp = $this->_sendRequest($handle);
        echo "post request \n";
        return $resp;
    }

    /**
     * get
     *
     * Make a get request.  Used to exchange user tokens with serice provider.
     * @param mixed $url        URL to make a get request from.
     * @param array $data       Data for the request.
     * @access protected
     * @return void
     */
    protected function get($url, $data) {
        $url = $this->_addParametersToUrl($url, $data);
        $handle = $this->curl->init($url);
        $resp = $this->_sendRequest($handle);
        echo "get request \n";
        return $resp;
    }

    /**
     * _addParametersToUrl
     *
     * Adds the parameters in associative array $data to the
     * given URL
     * @param String $url       URL
     * @param array $data       Parameters to be added as a query string to
     *      the URL provided
     * @access protected
     * @return void
     */
    protected function _addParametersToUrl($url, $data) {
        if (!empty($data)) {
            if (strpos($url, '?') === false) {
                $url .= '?'.$this->buildData($data);
            } else {
                $url .= '&'.$this->buildData($data);
            }
        }
        return $url;
    }

    /**
     * buildData
     *
     * Creates a string of data for either post or get requests.
     * @param mixed $data       Array of key value pairs
     * @access public
     * @return void
     */
    public function buildData($data) {
        ksort($data);
        $params = array();
        foreach ($data as $key => $value) {
            $params[] = $key.'='.$this->encode($value);
        }
        return implode('&', $params);
    }

    /**
     * _sendRequest
     *
     * Actually makes a request.
     * @param mixed $handle     Curl handle
     * @param array $headers    Additional headers needed for request
     * @access private
     * @return void
     */
    private function _sendRequest($handle, $headers = array('Expect:')) {
        $this->curl->setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $this->curl->setopt($handle, CURLOPT_HEADER, true);
        $this->curl->setopt($handle, CURLOPT_HTTPHEADER, $headers);
        $this->curl->setopt($handle, CURLOPT_USERAGENT, $this->userAgent);
        $this->curl->setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        $this->curl->setopt($handle, CURLOPT_VERBOSE, FALSE);
        $this->curl->setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
        $this->curl->setopt($handle, CURLOPT_TIMEOUT, 90);
        $resp = $this->curl->execute($handle);
        if ($resp) {
            return new CurlResponse($resp);
        }
        $this->error = $this->curl->errno($handle) . ' - ' .
            $this->curl->error($handle);
        return false;
    }

    /**
     * parseAsError
     *
     * Checks if response is an error.  If it is, raise an appropriately
     * configured exception.
     *
     * @param mixed $response   Data returned from the server, in array form
     * @access public
     * @throws AWeberOAuthException
     * @return void
     */
    public function parseAsError($response) {
        if (!empty($response['error'])) {
            throw new AWeberOAuthException($response['error']['type'],
                $response['error']['message']);
        }
    }

    /**
     * readResponse
     *
     * Interprets a response, and creates the appropriate object from it.
     * @param mixed $response   Data returned from a request to the AWeberAPI
     * @param mixed $url        URL that this data was requested from
     * @access protected
     * @return mixed
     */
    protected function readResponse($response, $url) {
        $this->parseAsError($response);
        if (!empty($response['id'])) {
            return new AWeberEntry($response, $url, $this->adapter);
        } else if (array_key_exists('entries', $response)) {
            return $response;
        }
        return false;
    }

    /**
     * Fetches account data for the associated account
     *
     * @param String Access Token (Only optional/cached if you called getAccessToken() earlier
     *      on the same page)
     * @param String Access Token Secret (Only optional/cached if you called getAccessToken() earlier
     *      on the same page)
     * @return array
     */
    public function getAccount($token=false, $secret=false) {
        if ($token && $secret) {
            $this->accessToken = $token;
            $this->tokenSecret = $secret;
        }
        $body = $this->request('GET', '/accounts');
        $accounts = $this->readResponse($body, '/accounts');

        return $accounts['entries'][0]['id'];
    }

    /**
     * Returns array of all the lists of the account
     *
     * @param $accessToken
     * @param $accessTokenSecret
     * @param $account
     * @return mixed
     */
    public function getLists($accessToken, $accessTokenSecret, $account_id)
    {
        if ($accessToken && $accessTokenSecret) {
            $this->accessToken = $accessToken;
            $this->tokenSecret = $accessTokenSecret;
        }
        $body = $this->request('GET', '/accounts/' . $account_id . '/lists');
        $lists = $this->readResponse($body, '/accounts/' . $account_id . '/lists');

        return $lists;
    }

    /**
     * Returns list by id
     *
     * @param $lists
     * @param $list_id
     * @return mixed
     */
    public function findList($lists, $list_id)
    {
        foreach ($lists['entries'] as $key => $value) {
            if ($value['id'] == $list_id) {
                return $lists['entries'][$key];
            }
        }
    }

    /**
     * Checks if subscriber exists in the distinct list
     *
     * @param $accessToken
     * @param $accessTokenSecret
     * @param $account_id
     * @param $list_id
     * @param $email
     * @return bool
     */
    public function findSubscriber($accessToken, $accessTokenSecret, $account_id, $list_id, $email)
    {
        if ($accessToken && $accessTokenSecret) {
            $this->accessToken = $accessToken;
            $this->tokenSecret = $accessTokenSecret;
        }
        /* instant search method */
//        $params = array_merge(['email' => $email], array('ws.op' => 'find'));
//        $body = $this->request('GET', '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers', $params);
//        $subscribers = $this->readResponse($body, '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers');
        /* this one is for getting array of the existing emails */
        $body = $this->request('GET', '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers');
        $subscribers = $this->readResponse($body, '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers');
        $exists = false;
        foreach ($subscribers['entries'] as $item) {
            if ($item['email'] == $email) {
                $exists = true;
            }
        }

        return $exists;
    }

    /**
     * Adds subscriber
     *
     * @param $accessToken
     * @param $accessTokenSecret
     * @param $account_id
     * @param $list_id
     * @param $subscriber_data
     * @return bool
     */
    public function addSubscriber($accessToken, $accessTokenSecret, $account_id, $list_id, $subscriber_data)
    {
        if ($accessToken && $accessTokenSecret) {
            $this->accessToken = $accessToken;
            $this->tokenSecret = $accessTokenSecret;
        }
        $create_url = '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers';
        $params = array_merge(array('ws.op' => 'create'), $subscriber_data);
        $data = $this->request('POST', $create_url, $params, array('return' => 'headers'));
        if ($data['Status-Code'] == '201') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets the array of subscribers for the defined list
     *
     * @param $accessToken
     * @param $accessTokenSecret
     * @param $account_id
     * @param $list_id
     * @return mixed
     */
    public function getAllSubscribers($accessToken, $accessTokenSecret, $account_id, $list_id)
    {
        if ($accessToken && $accessTokenSecret) {
            $this->accessToken = $accessToken;
            $this->tokenSecret = $accessTokenSecret;
        }
        $body = $this->request('GET', '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers');
        $subscribers = $this->readResponse($body, '/accounts/' . $account_id . '/lists/' . $list_id . '/subscribers');

        return $subscribers['entries'];
    }

    /**
     * Looks through all lists for subscribers
     *
     * @param $accessToken
     * @param $accessTokenSecret
     * @param $account_id
     * @param $search_data
     * @return array
     */
    public function findSubscribers($accessToken, $accessTokenSecret, $account_id, $search_data) {
        if ($accessToken && $accessTokenSecret) {
            $this->accessToken = $accessToken;
            $this->tokenSecret = $accessTokenSecret;
        }

        $search_data = ['email' => 'joet2053@yahoo.co.uk'];

        $params = array_merge($search_data, array('ws.op' => 'findSubscribers'));
        $body = $this->request('GET', 'https://api.aweber.com/1.0/accounts/' . $account_id, $params);
        $result = $this->readResponse($body, 'https://api.aweber.com/1.0/accounts/' . $account_id);
        var_dump($result); die;

    }
}