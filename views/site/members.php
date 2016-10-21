<?php
use yii\web\JqueryAsset;
use yii\bootstrap\BootstrapAsset;
use Mobile_Detect;
use yii\helpers\Url;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style_members.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['integrity' => "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa", 'crossorigin' => "anonymous", 'depends' => [JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/jquery.cookie.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/jquery.animateNumber.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/counter.js', ['depends' => [JqueryAsset::className()]]);

$script = <<< JS
    $(document).ready(function () {
       $('.membership-footer ul.info li').on('click', function(){
           var item_class = $(this).data('class');
           $('.membership-footer .content div.active').removeClass('active');
           $('.membership-footer .' + item_class).addClass('active');
           $('.membership-footer .' + item_class + ' h3').text($(this).text());
           $('.membership-footer li').removeClass('active');
           $(this).addClass('active');
       });
       $('.panel-default a').on('click', function () {
           if ($(this).attr('aria-expanded') == 'true') {
               $(this).parent().next().remove();
           } else {
               $('.arrow-img').remove();
               $(this).parent().parent().append('<img class="arrow-img-active" src="/images/down.png">');
           }
       });
       $('.panel-default a').hover(
           function () {
               if ($(this).parent().next().hasClass('arrow-img-active') == false) {
                   $(this).parent().parent().append('<img class="arrow-img" src="/images/down.png">');
               }
           },
           function () {
               $('.arrow-img').remove();
           }
       );
   });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $is_mobile = true;
}
?>

<?= \Yii::$app->view->renderFile('@app/views/site/getip.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<?php
$rd = 3;
$gi = 409;

?>
<script>
    var gvars = {'gi': <?php echo $gi?>, 'wl': 90,'rd': <?php echo $rd?>, 'sb': 0};
</script>

<!--<script src="https://s3-eu-west-1.amazonaws.com/gaff/js/gaff.js"></script>-->
<script src="https://gaff.s3.amazonaws.com/js/gaff.js"></script>











<header class="membership-header">
    <div class="membership-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 membership-welcome">
                    WELCOME
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 membership-biz-area">
                    <h2>This is the CLICKMONEY Biz Members Area</h2>
                </div>
            </div>
            <div class="row header-last-mrow">
                <div class="col-md-1 col-xs-12 membership-logo">
                    <img src="images/ClickMoneyLogo/Logo-yellow.svg">
                </div>
                <div class="col-md-10 col-xs-12">
                    Please Watch The <span class="text-dashed">Video
                        Below</span> For Further Instructions
                </div>
                <div class="col-md-2 col-xs-12 membership-boxIcon">
                    <div class="col-md-2">
                        <img src="images/elipsOne.png">
                    </div>
                    <div class="col-md-11 row membership-right-box">
                        <div class="col-lg-12 membership-licence-left">
                            LICENCE LEFT
                        </div>
                        <div class="col-lg-12 membership-updated">
                            UPDATED SEP 20 2016
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container left-right-container">
            <div class="row">
                <div class="col-md-7 left_block">
                    <img class="img-responsive img-membership1" src="images/imagineForVideoLarge1.jpg">
                    <img class="img-responsive play-button" src="images/play.png">
                    <img class="img-responsive yellow-arrow" src="images/yellowArrow1.png">
                    <p>Watch Video Now! Expires in: 00h:03m:27s</p>
                </div>
                <div class="col-md-5 right_block">
                    <h2 class="register-right-text">Please
                        <span class="reg-bold">register</span> your clickmoney
                        biz below</h2>
                    <div class="gaff" id="gaff">
                        <script src="https://s3.amazonaws.com/caff/js/formhelpers.min.js"></script>
                        <input id="brokerName" type="hidden" value="brokenName">
                        <form action=
                              "http://ap.valaffiliates.com/Forms/ProcForm" id=
                              "caffForm" method="post" name="caffForm">
                            <input name="sub" type="hidden" value="222">
                            <input name="rd" type="hidden" value="3">
                            <input name="token" type="hidden" value="14893170%%2cxxmiyylu">
                            <input name="wl" type="hidden" value="90">
                            <input name="lg" type="hidden" value="'en'">
                            <input name="so" type= "hidden" value="">
                            <input id="phone" name="phone" type="hidden" value="">
                            <input id="prefix" name="prefix" type="hidden" value="248">
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    <label class="register-label">First
                                        Name</label> <input class=
                                                            "form-control email-reg-name email-Reg0"
                                                            name="firstname" pattern=
                                                            "^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$"
                                                            placeholder="First Name" required=""
                                                            title=
                                                            "Please enter 3-15 characters (alphabets only)"
                                                            type="text" value="">
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="register-label">Last Name</label>
                                    <input class="form-control email-reg-name email-Reg0 email-Reg2"
                                           name="lastname" pattern=
                                           "^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$"
                                           placeholder="Last Name" required=""
                                           title=
                                           "Please enter 3-15 characters (alphabets only)"
                                           type="text" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    <label class=
                                           "register-label">Country</label>
                                    <select class=
                                            "form-control bfh-countries select-register email-reg-name email-Reg0"
                                            data-country="UA" id="countryData_gaff"
                                            name="countryabbr" required="">
                                        <option value="AF">
                                            Afghanistan
                                        </option>
                                        <option value="AL">
                                            Albania
                                        </option>
                                        <option value="DZ">
                                            Algeria
                                        </option>
                                        <option value="AS">
                                            American Samoa
                                        </option>
                                        <option value="AD">
                                            Andorra
                                        </option>
                                        <option value="AO">
                                            Angola
                                        </option>
                                        <option value="AI">
                                            Anguilla
                                        </option>
                                        <option value="AQ">
                                            Antarctica
                                        </option>
                                        <option value="AG">
                                            Antigua and Barbuda
                                        </option>
                                        <option value="AR">
                                            Argentina
                                        </option>
                                        <option value="AM">
                                            Armenia
                                        </option>
                                        <option value="AW">
                                            Aruba
                                        </option>
                                        <option value="AU">
                                            Australia
                                        </option>
                                        <option value="AT">
                                            Austria
                                        </option>
                                        <option value="AZ">
                                            Azerbaijan
                                        </option>
                                        <option value="BH">
                                            Bahrain
                                        </option>
                                        <option value="BD">
                                            Bangladesh
                                        </option>
                                        <option value="BB">
                                            Barbados
                                        </option>
                                        <option value="BY">
                                            Belarus
                                        </option>
                                        <option value="BE">
                                            Belgium
                                        </option>
                                        <option value="BZ">
                                            Belize
                                        </option>
                                        <option value="BJ">
                                            Benin
                                        </option>
                                        <option value="BM">
                                            Bermuda
                                        </option>
                                        <option value="BT">
                                            Bhutan
                                        </option>
                                        <option value="BO">
                                            Bolivia
                                        </option>
                                        <option value="BA">
                                            Bosnia and Herzegovina
                                        </option>
                                        <option value="BW">
                                            Botswana
                                        </option>
                                        <option value="BV">
                                            Bouvet Island
                                        </option>
                                        <option value="BR">
                                            Brazil
                                        </option>
                                        <option value="IO">
                                            British Indian Ocean Territory
                                        </option>
                                        <option value="VG">
                                            British Virgin Islands
                                        </option>
                                        <option value="BN">
                                            Brunei
                                        </option>
                                        <option value="BG">
                                            Bulgaria
                                        </option>
                                        <option value="BF">
                                            Burkina Faso
                                        </option>
                                        <option value="BI">
                                            Burundi
                                        </option>
                                        <option value="CI">
                                            Côte d'Ivoire
                                        </option>
                                        <option value="KH">
                                            Cambodia
                                        </option>
                                        <option value="CM">
                                            Cameroon
                                        </option>
                                        <option value="CA">
                                            Canada
                                        </option>
                                        <option value="CV">
                                            Cape Verde
                                        </option>
                                        <option value="KY">
                                            Cayman Islands
                                        </option>
                                        <option value="CF">
                                            Central African Republic
                                        </option>
                                        <option value="TD">
                                            Chadddd
                                        </option>
                                        <option value="CL">
                                            Chile
                                        </option>
                                        <option value="CN">
                                            China
                                        </option>
                                        <option value="CX">
                                            Christmas Island
                                        </option>
                                        <option value="CC">
                                            Cocos (Keeling) Islands
                                        </option>
                                        <option value="CO">
                                            Colombia
                                        </option>
                                        <option value="KM">
                                            Comoros
                                        </option>
                                        <option value="CG">
                                            Congo
                                        </option>
                                        <option value="CK">
                                            Cook Islands
                                        </option>
                                        <option value="CR">
                                            Costa Rica
                                        </option>
                                        <option value="HR">
                                            Croatia
                                        </option>
                                        <option value="CU">
                                            Cuba
                                        </option>
                                        <option value="CY">
                                            Cyprus
                                        </option>
                                        <option value="CZ">
                                            Czech Republic
                                        </option>
                                        <option value="CD">
                                            Democratic Republic of the
                                            Congo
                                        </option>
                                        <option value="DK">
                                            Denmark
                                        </option>
                                        <option value="DJ">
                                            Djibouti
                                        </option>
                                        <option value="DM">
                                            Dominica
                                        </option>
                                        <option value="DO">
                                            Dominican Republic
                                        </option>
                                        <option value="TP">
                                            East Timor
                                        </option>
                                        <option value="EC">
                                            Ecuador
                                        </option>
                                        <option value="EG">
                                            Egypt
                                        </option>
                                        <option value="SV">
                                            El Salvador
                                        </option>
                                        <option value="GQ">
                                            Equatorial Guinea
                                        </option>
                                        <option value="ER">
                                            Eritrea
                                        </option>
                                        <option value="EE">
                                            Estonia
                                        </option>
                                        <option value="ET">
                                            Ethiopia
                                        </option>
                                        <option value="FO">
                                            Faeroe Islands
                                        </option>
                                        <option value="FK">
                                            Falkland Islands
                                        </option>
                                        <option value="FJ">
                                            Fiji
                                        </option>
                                        <option value="FI">
                                            Finland
                                        </option>
                                        <option value="MK">
                                            Former Yugoslav Republic of
                                            Macedonia
                                        </option>
                                        <option value="FR">
                                            France
                                        </option>
                                        <option value="FX">
                                            France, Metropolitan
                                        </option>
                                        <option value="GF">
                                            French Guiana
                                        </option>
                                        <option value="PF">
                                            French Polynesia
                                        </option>
                                        <option value="TF">
                                            French Southern Territories
                                        </option>
                                        <option value="GA">
                                            Gabon
                                        </option>
                                        <option value="GE">
                                            Georgia
                                        </option>
                                        <option value="DE">
                                            Germany
                                        </option>
                                        <option value="GH">
                                            Ghana
                                        </option>
                                        <option value="GI">
                                            Gibraltar
                                        </option>
                                        <option value="GR">
                                            Greece
                                        </option>
                                        <option value="GL">
                                            Greenland
                                        </option>
                                        <option value="GD">
                                            Grenada
                                        </option>
                                        <option value="GP">
                                            Guadeloupe
                                        </option>
                                        <option value="GU">
                                            Guam
                                        </option>
                                        <option value="GT">
                                            Guatemala
                                        </option>
                                        <option value="GN">
                                            Guinea
                                        </option>
                                        <option value="GW">
                                            Guinea-Bissau
                                        </option>
                                        <option value="GY">
                                            Guyana
                                        </option>
                                        <option value="HT">
                                            Haiti
                                        </option>
                                        <option value="HM">
                                            Heard and Mc Donald Islands
                                        </option>
                                        <option value="HN">
                                            Honduras
                                        </option>
                                        <option value="HK">
                                            Hong Kong
                                        </option>
                                        <option value="HU">
                                            Hungary
                                        </option>
                                        <option value="IS">
                                            Iceland
                                        </option>
                                        <option value="IN">
                                            India
                                        </option>
                                        <option value="ID">
                                            Indonesia
                                        </option>
                                        <option value="IR">
                                            Iran
                                        </option>
                                        <option value="IQ">
                                            Iraq
                                        </option>
                                        <option value="IE">
                                            Ireland
                                        </option>
                                        <option value="IL">
                                            Israel
                                        </option>
                                        <option value="IT">
                                            Italy
                                        </option>
                                        <option value="JM">
                                            Jamaica
                                        </option>
                                        <option value="JP">
                                            Japan
                                        </option>
                                        <option value="JO">
                                            Jordan
                                        </option>
                                        <option value="KZ">
                                            Kazakhstan
                                        </option>
                                        <option value="KE">
                                            Kenya
                                        </option>
                                        <option value="KI">
                                            Kiribati
                                        </option>
                                        <option value="KW">
                                            Kuwait
                                        </option>
                                        <option value="KG">
                                            Kyrgyzstan
                                        </option>
                                        <option value="LA">
                                            Laos
                                        </option>
                                        <option value="LV">
                                            Latvia
                                        </option>
                                        <option value="LB">
                                            Lebanon
                                        </option>
                                        <option value="LS">
                                            Lesotho
                                        </option>
                                        <option value="LR">
                                            Liberia
                                        </option>
                                        <option value="LY">
                                            Libya
                                        </option>
                                        <option value="LI">
                                            Liechtenstein
                                        </option>
                                        <option value="LT">
                                            Lithuania
                                        </option>
                                        <option value="LU">
                                            Luxembourg
                                        </option>
                                        <option value="MO">
                                            Macau
                                        </option>
                                        <option value="MG">
                                            Madagascar
                                        </option>
                                        <option value="MW">
                                            Malawi
                                        </option>
                                        <option value="MY">
                                            Malaysia
                                        </option>
                                        <option value="MV">
                                            Maldives
                                        </option>
                                        <option value="ML">
                                            Mali
                                        </option>
                                        <option value="MT">
                                            Malta
                                        </option>
                                        <option value="MH">
                                            Marshall Islands
                                        </option>
                                        <option value="MQ">
                                            Martinique
                                        </option>
                                        <option value="MR">
                                            Mauritania
                                        </option>
                                        <option value="MU">
                                            Mauritius
                                        </option>
                                        <option value="YT">
                                            Mayotte
                                        </option>
                                        <option value="MX">
                                            Mexico
                                        </option>
                                        <option value="FM">
                                            Micronesia
                                        </option>
                                        <option value="MD">
                                            Moldova
                                        </option>
                                        <option value="MC">
                                            Monaco
                                        </option>
                                        <option value="MN">
                                            Mongolia
                                        </option>
                                        <option value="ME">
                                            Montenegro
                                        </option>
                                        <option value="MS">
                                            Montserrat
                                        </option>
                                        <option value="MA">
                                            Morocco
                                        </option>
                                        <option value="MZ">
                                            Mozambique
                                        </option>
                                        <option value="MM">
                                            Myanmar
                                        </option>
                                        <option value="NA">
                                            Namibia
                                        </option>
                                        <option value="NR">
                                            Nauru
                                        </option>
                                        <option value="NP">
                                            Nepal
                                        </option>
                                        <option value="NL">
                                            Netherlands
                                        </option>
                                        <option value="AN">
                                            Netherlands Antilles
                                        </option>
                                        <option value="NC">
                                            New Caledonia
                                        </option>
                                        <option value="NZ">
                                            New Zealand
                                        </option>
                                        <option value="NI">
                                            Nicaragua
                                        </option>
                                        <option value="NE">
                                            Niger
                                        </option>
                                        <option value="NG">
                                            Nigeria
                                        </option>
                                        <option value="NU">
                                            Niue
                                        </option>
                                        <option value="NF">
                                            Norfolk Island
                                        </option>
                                        <option value="KP">
                                            North Korea
                                        </option>
                                        <option value="MP">
                                            Northern Marianas
                                        </option>
                                        <option value="NO">
                                            Norway
                                        </option>
                                        <option value="OM">
                                            Oman
                                        </option>
                                        <option value="PK">
                                            Pakistan
                                        </option>
                                        <option value="PW">
                                            Palau
                                        </option>
                                        <option value="PS">
                                            Palestine
                                        </option>
                                        <option value="PA">
                                            Panama
                                        </option>
                                        <option value="PG">
                                            Papua New Guinea
                                        </option>
                                        <option value="PY">
                                            Paraguay
                                        </option>
                                        <option value="PE">
                                            Peru
                                        </option>
                                        <option value="PH">
                                            Philippines
                                        </option>
                                        <option value="PN">
                                            Pitcairn Islands
                                        </option>
                                        <option value="PL">
                                            Poland
                                        </option>
                                        <option value="PT">
                                            Portugal
                                        </option>
                                        <option value="PR">
                                            Puerto Rico
                                        </option>
                                        <option value="QA">
                                            Qatar
                                        </option>
                                        <option value="RE">
                                            Reunion
                                        </option>
                                        <option value="RO">
                                            Romania
                                        </option>
                                        <option value="RU">
                                            Russia
                                        </option>
                                        <option value="RW">
                                            Rwanda
                                        </option>
                                        <option value="ST">
                                            Sao Tome and Principe
                                        </option>
                                        <option value="SH">
                                            Saint Helena
                                        </option>
                                        <option value="PM">
                                            St. Pierre and Miquelon
                                        </option>
                                        <option value="KN">
                                            Saint Kitts and Nevis
                                        </option>
                                        <option value="LC">
                                            Saint Lucia
                                        </option>
                                        <option value="VC">
                                            Saint Vincent and the
                                            Grenadines
                                        </option>
                                        <option value="WS">
                                            Samoa
                                        </option>
                                        <option value="SM">
                                            San Marino
                                        </option>
                                        <option value="SA">
                                            Saudi Arabia
                                        </option>
                                        <option value="SN">
                                            Senegal
                                        </option>
                                        <option value="RS">
                                            Serbia
                                        </option>
                                        <option value="SC">
                                            Seychelles
                                        </option>
                                        <option value="SL">
                                            Sierra Leone
                                        </option>
                                        <option value="SG">
                                            Singapore
                                        </option>
                                        <option value="SK">
                                            Slovakia
                                        </option>
                                        <option value="SI">
                                            Slovenia
                                        </option>
                                        <option value="SB">
                                            Solomon Islands
                                        </option>
                                        <option value="SO">
                                            Somalia
                                        </option>
                                        <option value="ZA">
                                            South Africa
                                        </option>
                                        <option value="GS">
                                            South Georgia and the South
                                            Sandwich Islands
                                        </option>
                                        <option value="KR">
                                            South Korea
                                        </option>
                                        <option value="ES">
                                            Spain
                                        </option>
                                        <option value="LK">
                                            Sri Lanka
                                        </option>
                                        <option value="SD">
                                            Sudan
                                        </option>
                                        <option value="SR">
                                            Suriname
                                        </option>
                                        <option value="SJ">
                                            Svalbard and Jan Mayen Islands
                                        </option>
                                        <option value="SZ">
                                            Swaziland
                                        </option>
                                        <option value="SE">
                                            Sweden
                                        </option>
                                        <option value="CH">
                                            Switzerland
                                        </option>
                                        <option value="SY">
                                            Syria
                                        </option>
                                        <option value="TW">
                                            Taiwan
                                        </option>
                                        <option value="TJ">
                                            Tajikistan
                                        </option>
                                        <option value="TZ">
                                            Tanzania
                                        </option>
                                        <option value="TH">
                                            Thailand
                                        </option>
                                        <option value="BS">
                                            The Bahamas
                                        </option>
                                        <option value="GM">
                                            The Gambia
                                        </option>
                                        <option value="TG">
                                            Togo
                                        </option>
                                        <option value="TK">
                                            Tokelau
                                        </option>
                                        <option value="TO">
                                            Tonga
                                        </option>
                                        <option value="TT">
                                            Trinidad and Tobago
                                        </option>
                                        <option value="TN">
                                            Tunisia
                                        </option>
                                        <option value="TR">
                                            Turkey
                                        </option>
                                        <option value="TM">
                                            Turkmenistan
                                        </option>
                                        <option value="TC">
                                            Turks and Caicos Islands
                                        </option>
                                        <option value="TV">
                                            Tuvalu
                                        </option>
                                        <option value="VI">
                                            US Virgin Islands
                                        </option>
                                        <option value="UG">
                                            Uganda
                                        </option>
                                        <option value="UA">
                                            Ukraine
                                        </option>
                                        <option value="AE">
                                            United Arab Emirates
                                        </option>
                                        <option value="GB">
                                            United Kingdom
                                        </option>
                                        <option value="US">
                                            United States
                                        </option>
                                        <option value="UM">
                                            United States Minor Outlying
                                            Islands
                                        </option>
                                        <option value="UY">
                                            Uruguay
                                        </option>
                                        <option value="UZ">
                                            Uzbekistan
                                        </option>
                                        <option value="VU">
                                            Vanuatu
                                        </option>
                                        <option value="VA">
                                            Vatican City
                                        </option>
                                        <option value="VE">
                                            Venezuela
                                        </option>
                                        <option value="VN">
                                            Vietnam
                                        </option>
                                        <option value="WF">
                                            Wallis and Futuna Islands
                                        </option>
                                        <option value="EH">
                                            Western Sahara
                                        </option>
                                        <option value="YE">
                                            Yemen
                                        </option>
                                        <option value="ZM">
                                            Zambia
                                        </option>
                                        <option value="ZW">
                                            Zimbabwe
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class=
                                           "register-label">Phone</label>
                                    <input class=
                                           "form-control bfh-phone email-reg-name email-Reg0 email-Reg4"
                                           data-content=
                                           "You have to use a VALID number in order to continue."
                                           data-country="countryData_gaff"
                                           data-placement="top" data-toggle=
                                           "popover" data-trigger="focus" id=
                                           "phoneOrig_gaff" pattern=".{9,20}"
                                           required="" type="text">
                                </div>
                            </div>
                            <div class="row register-last-row">
                                <div class="col-xs-6 form-group">
                                    <label class=
                                           "register-label">Email</label>
                                    <input class=
                                           "form-control email-Reg0 email-reg-bestem"
                                           data-error=
                                           "Bruh, that email address is invalid"
                                           name="email" placeholder=
                                           "Your Best Email" required="" type=
                                           "email" value="">
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class=
                                           "register-label">Password</label>
                                    <input class=
                                           "col-xs-12 form-control email-Reg0 email-Reg6 email-reg-name"
                                           name="password" pattern=".{6,12}"
                                           placeholder="Password" required=""
                                           title="Please enter 6-12 characters"
                                           type="password" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button type="submit">
                                        <div class="row">
                                            <div class="arrow"><img src=
                                                                    "images/Layer18.png"></div>
                                            <div class="col-md-12 col-xs-9">
                                                UNLOCK MY PERSONAL ACCOUNT NOW
                                            </div>
                                        </div></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-11 col-md-offset-2 col-xs-12 membership-block-text">
                            <img class="blockImg" src="images/block.png">Guaranteed Secure Access Ensured by Trusted Companies
                        </div>
                    </div>
                    <div class="row text-center icons-block">
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="m" src=
                                "images/mcafee.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="t" src=
                                "images/truste.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="v" src=
                                "images/red.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="n" src=
                                "images/norton.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="quick-and-easy">
    <div class="container memebership_content">
        <p class="text1"><span class="green">3</span> Quick and Easy
            Steps</p>
        <p class="text">TO START YOUR BUSINESS</p>
    </div>
</section>
<section class="membership02 register-deposit-profit">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="first-arrow" src="images/arrow-3-active.png">
                    <div class="first-num">
                        1
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="grey">YOU'RE HERE!</p>
                    <p class="green">Register</p>
                    <p class="green green-little-text">Sign up to the system,
                        choose<br>
                        a username and a password</p>
                </div><img class="hidden-xs hidden-sm arrow arrow1 arrow111 "
                           src="images/arrowLittleGreen.png"></div>
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="second-arrow" src="images/arrow-4.png">
                    <div class="second-num">
                        2
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="steps-title">Deposit</p>
                    <p class="grey-small-text">Find your trading account with
                        a<br>
                        minimum investment of $250</p>
                </div><img class="hidden-xs hidden-sm arrow arrow1 " src=
                "images/arrowLittleGreen.png"></div>
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="third-arrow-add" src="images/arrow-5.png">
                    <div class="third-num">
                        3
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="steps-title">Profit!</p>
                    <p class="grey-small-text">Open a bottle of champagne
                        and<br> watch the money rain!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="days">
    <div class="container col-md-12 membership-text">
        <div class="text-center text-days">
            180 DAYS
        </div>
        <div class="text-center text-lower">
            SEE WHAT CLICKMONEY CAN DO IN JUST
        </div>
    </div>
    <div class="container membership-text1">
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src=
                    "images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class="green-small-text">$1,344,521</span> in<span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src=
                    "images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class="green-small-text">$1,344,521</span> in<span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src=
                    "images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class="green-small-text">$1,344,521</span> in<span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src=
                    "images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class="green-small-text">$1,344,521</span> in<span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src=
                    "images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class="green-small-text">$1,344,521</span> in<span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 single-item">
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                    <img class="img-responsive video-poster" src="images/girl.jpg">
                    <img class="img-responsive play-button" src="images/play.png">
                    <h5>JOAN KOWALOWSKY</h5>
                    <p>TESTIMONIAL</p>
                </div>
            </div>
            <div class="row join-member-club">
                <div class="col-md-10 col-md-offset-1 video-item">
                    <h4>See How Joan Made<br> <span class=
                                                    "green-small-text">$1,344,521</span> in
                        <span class="green-small-text">87 days</span></h4>
                    <p class="grey-small-text">Clickmoney was a
                        lifechanger for Joan. Watch her testimonial and
                        prepare to be amazed. Clickmoney was a lifechanger
                        for Joan. Watch her testimonial and prepare to be
                        amazed</p>
                </div>
            </div>
            <div class="col-md-4 hover-video">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-16by10" data-toggle="modal" data-target="#myVideo">
                        <img class="img-responsive video-poster" src="images/greenGirl.jpg">
                        <img class="img-responsive play-button" src="images/white-smile.png">
                        <h5>THIS COULD BE YOUR SPOT</h5>
                        <p>AMD YOUR SUCCESS STORY</p>
                    </div>
                </div>
                <div class="row join-member-club">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="last-chace-register">
    <div class="container">
        <div class="row qick-and-easy">
            <div class="text-center">
                <p class="grey">THIS OFFER CLOSES IN &nbsp;<span class= "count-down" id="minutes-mem">3m</span><span class="count-down" id="seconds-mem">35s</span></p>
                <p class="register-text"><span class="green">Last chance,</span> Register your</p>
                <p class="register-text">ClickMoney Biz Right Now</p>
            </div>
            <div class="container">
                <div class="gaff middle-form" id="gaff">
                    <input id="brokerName" type="hidden" value="brokenName">
                    <form action="http://ap.valaffiliates.com/Forms/ProcForm" id="caffForm" method="post" name="caffForm">
                        <input name="sub" type="hidden" value="222">
                        <input name="rd" type="hidden" value="3">
                        <input name="token" type="hidden" value="14893170%%2cxxmiyylu"> <input name="wl" type="hidden" value="90">
                        <input name="lg" type="hidden" value="'en'"> <input name="so" type="hidden" value="">
                        <input id="phone" name="phone" type="hidden" value=""> <input id="prefix" name="prefix" type="hidden" value="248">
                        <div class="row">
                            <div class="col-md-4 hidden-xs hidden-sm mem-first-arrow-left">
                                <img src="images/arrowleft1.png">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">First Name</label>
                                <input class="form-control email-reg-name email-Reg0" name="firstname" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" placeholder="First Name" required="" title="Please enter 3-15 characters (alphabets only)"
                                       type="text" value="">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">Last Name</label>
                                <input class="form-control email-reg-name email-Reg0 email-Reg2"
                                       name="lastname" pattern=
                                       "^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$"
                                       placeholder="Last Name" required="" title=
                                       "Please enter 3-15 characters (alphabets only)"
                                       type="text" value="">
                            </div>
                            <div class= "col-md-4 hidden-xs hidden-sm">
                                <img class="mem-first-arrow-right" src="images/arrowleft1.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class=
                                 "col-md-4 mem-second-arrow-left hidden-xs hidden-sm">
                                <img src="images/arrowLittleGreen.png">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">Country</label>
                                <select class=
                                        "form-control bfh-countries select-register email-reg-name email-Reg0 email-Reg3" data-country="UA" id="countryData_gaff2"
                                        name="countryabbr" required="">
                                    <option value="AF">
                                        Afghanistan
                                    </option>
                                    <option value="AL">
                                        Albania
                                    </option>
                                    <option value="DZ">
                                        Algeria
                                    </option>
                                    <option value="AS">
                                        American Samoa
                                    </option>
                                    <option value="AD">
                                        Andorra
                                    </option>
                                    <option value="AO">
                                        Angola
                                    </option>
                                    <option value="AI">
                                        Anguilla
                                    </option>
                                    <option value="AQ">
                                        Antarctica
                                    </option>
                                    <option value="AG">
                                        Antigua and Barbuda
                                    </option>
                                    <option value="AR">
                                        Argentina
                                    </option>
                                    <option value="AM">
                                        Armenia
                                    </option>
                                    <option value="AW">
                                        Aruba
                                    </option>
                                    <option value="AU">
                                        Australia
                                    </option>
                                    <option value="AT">
                                        Austria
                                    </option>
                                    <option value="AZ">
                                        Azerbaijan
                                    </option>
                                    <option value="BH">
                                        Bahrain
                                    </option>
                                    <option value="BD">
                                        Bangladesh
                                    </option>
                                    <option value="BB">
                                        Barbados
                                    </option>
                                    <option value="BY">
                                        Belarus
                                    </option>
                                    <option value="BE">
                                        Belgium
                                    </option>
                                    <option value="BZ">
                                        Belize
                                    </option>
                                    <option value="BJ">
                                        Benin
                                    </option>
                                    <option value="BM">
                                        Bermuda
                                    </option>
                                    <option value="BT">
                                        Bhutan
                                    </option>
                                    <option value="BO">
                                        Bolivia
                                    </option>
                                    <option value="BA">
                                        Bosnia and Herzegovina
                                    </option>
                                    <option value="BW">
                                        Botswana
                                    </option>
                                    <option value="BV">
                                        Bouvet Island
                                    </option>
                                    <option value="BR">
                                        Brazil
                                    </option>
                                    <option value="IO">
                                        British Indian Ocean Territory
                                    </option>
                                    <option value="VG">
                                        British Virgin Islands
                                    </option>
                                    <option value="BN">
                                        Brunei
                                    </option>
                                    <option value="BG">
                                        Bulgaria
                                    </option>
                                    <option value="BF">
                                        Burkina Faso
                                    </option>
                                    <option value="BI">
                                        Burundi
                                    </option>
                                    <option value="CI">
                                        Côte d'Ivoire
                                    </option>
                                    <option value="KH">
                                        Cambodia
                                    </option>
                                    <option value="CM">
                                        Cameroon
                                    </option>
                                    <option value="CA">
                                        Canada
                                    </option>
                                    <option value="CV">
                                        Cape Verde
                                    </option>
                                    <option value="KY">
                                        Cayman Islands
                                    </option>
                                    <option value="CF">
                                        Central African Republic
                                    </option>
                                    <option value="TD">
                                        Chadddd
                                    </option>
                                    <option value="CL">
                                        Chile
                                    </option>
                                    <option value="CN">
                                        China
                                    </option>
                                    <option value="CX">
                                        Christmas Island
                                    </option>
                                    <option value="CC">
                                        Cocos (Keeling) Islands
                                    </option>
                                    <option value="CO">
                                        Colombia
                                    </option>
                                    <option value="KM">
                                        Comoros
                                    </option>
                                    <option value="CG">
                                        Congo
                                    </option>
                                    <option value="CK">
                                        Cook Islands
                                    </option>
                                    <option value="CR">
                                        Costa Rica
                                    </option>
                                    <option value="HR">
                                        Croatia
                                    </option>
                                    <option value="CU">
                                        Cuba
                                    </option>
                                    <option value="CY">
                                        Cyprus
                                    </option>
                                    <option value="CZ">
                                        Czech Republic
                                    </option>
                                    <option value="CD">
                                        Democratic Republic of the Congo
                                    </option>
                                    <option value="DK">
                                        Denmark
                                    </option>
                                    <option value="DJ">
                                        Djibouti
                                    </option>
                                    <option value="DM">
                                        Dominica
                                    </option>
                                    <option value="DO">
                                        Dominican Republic
                                    </option>
                                    <option value="TP">
                                        East Timor
                                    </option>
                                    <option value="EC">
                                        Ecuador
                                    </option>
                                    <option value="EG">
                                        Egypt
                                    </option>
                                    <option value="SV">
                                        El Salvador
                                    </option>
                                    <option value="GQ">
                                        Equatorial Guinea
                                    </option>
                                    <option value="ER">
                                        Eritrea
                                    </option>
                                    <option value="EE">
                                        Estonia
                                    </option>
                                    <option value="ET">
                                        Ethiopia
                                    </option>
                                    <option value="FO">
                                        Faeroe Islands
                                    </option>
                                    <option value="FK">
                                        Falkland Islands
                                    </option>
                                    <option value="FJ">
                                        Fiji
                                    </option>
                                    <option value="FI">
                                        Finland
                                    </option>
                                    <option value="MK">
                                        Former Yugoslav Republic of
                                        Macedonia
                                    </option>
                                    <option value="FR">
                                        France
                                    </option>
                                    <option value="FX">
                                        France, Metropolitan
                                    </option>
                                    <option value="GF">
                                        French Guiana
                                    </option>
                                    <option value="PF">
                                        French Polynesia
                                    </option>
                                    <option value="TF">
                                        French Southern Territories
                                    </option>
                                    <option value="GA">
                                        Gabon
                                    </option>
                                    <option value="GE">
                                        Georgia
                                    </option>
                                    <option value="DE">
                                        Germany
                                    </option>
                                    <option value="GH">
                                        Ghana
                                    </option>
                                    <option value="GI">
                                        Gibraltar
                                    </option>
                                    <option value="GR">
                                        Greece
                                    </option>
                                    <option value="GL">
                                        Greenland
                                    </option>
                                    <option value="GD">
                                        Grenada
                                    </option>
                                    <option value="GP">
                                        Guadeloupe
                                    </option>
                                    <option value="GU">
                                        Guam
                                    </option>
                                    <option value="GT">
                                        Guatemala
                                    </option>
                                    <option value="GN">
                                        Guinea
                                    </option>
                                    <option value="GW">
                                        Guinea-Bissau
                                    </option>
                                    <option value="GY">
                                        Guyana
                                    </option>
                                    <option value="HT">
                                        Haiti
                                    </option>
                                    <option value="HM">
                                        Heard and Mc Donald Islands
                                    </option>
                                    <option value="HN">
                                        Honduras
                                    </option>
                                    <option value="HK">
                                        Hong Kong
                                    </option>
                                    <option value="HU">
                                        Hungary
                                    </option>
                                    <option value="IS">
                                        Iceland
                                    </option>
                                    <option value="IN">
                                        India
                                    </option>
                                    <option value="ID">
                                        Indonesia
                                    </option>
                                    <option value="IR">
                                        Iran
                                    </option>
                                    <option value="IQ">
                                        Iraq
                                    </option>
                                    <option value="IE">
                                        Ireland
                                    </option>
                                    <option value="IL">
                                        Israel
                                    </option>
                                    <option value="IT">
                                        Italy
                                    </option>
                                    <option value="JM">
                                        Jamaica
                                    </option>
                                    <option value="JP">
                                        Japan
                                    </option>
                                    <option value="JO">
                                        Jordan
                                    </option>
                                    <option value="KZ">
                                        Kazakhstan
                                    </option>
                                    <option value="KE">
                                        Kenya
                                    </option>
                                    <option value="KI">
                                        Kiribati
                                    </option>
                                    <option value="KW">
                                        Kuwait
                                    </option>
                                    <option value="KG">
                                        Kyrgyzstan
                                    </option>
                                    <option value="LA">
                                        Laos
                                    </option>
                                    <option value="LV">
                                        Latvia
                                    </option>
                                    <option value="LB">
                                        Lebanon
                                    </option>
                                    <option value="LS">
                                        Lesotho
                                    </option>
                                    <option value="LR">
                                        Liberia
                                    </option>
                                    <option value="LY">
                                        Libya
                                    </option>
                                    <option value="LI">
                                        Liechtenstein
                                    </option>
                                    <option value="LT">
                                        Lithuania
                                    </option>
                                    <option value="LU">
                                        Luxembourg
                                    </option>
                                    <option value="MO">
                                        Macau
                                    </option>
                                    <option value="MG">
                                        Madagascar
                                    </option>
                                    <option value="MW">
                                        Malawi
                                    </option>
                                    <option value="MY">
                                        Malaysia
                                    </option>
                                    <option value="MV">
                                        Maldives
                                    </option>
                                    <option value="ML">
                                        Mali
                                    </option>
                                    <option value="MT">
                                        Malta
                                    </option>
                                    <option value="MH">
                                        Marshall Islands
                                    </option>
                                    <option value="MQ">
                                        Martinique
                                    </option>
                                    <option value="MR">
                                        Mauritania
                                    </option>
                                    <option value="MU">
                                        Mauritius
                                    </option>
                                    <option value="YT">
                                        Mayotte
                                    </option>
                                    <option value="MX">
                                        Mexico
                                    </option>
                                    <option value="FM">
                                        Micronesia
                                    </option>
                                    <option value="MD">
                                        Moldova
                                    </option>
                                    <option value="MC">
                                        Monaco
                                    </option>
                                    <option value="MN">
                                        Mongolia
                                    </option>
                                    <option value="ME">
                                        Montenegro
                                    </option>
                                    <option value="MS">
                                        Montserrat
                                    </option>
                                    <option value="MA">
                                        Morocco
                                    </option>
                                    <option value="MZ">
                                        Mozambique
                                    </option>
                                    <option value="MM">
                                        Myanmar
                                    </option>
                                    <option value="NA">
                                        Namibia
                                    </option>
                                    <option value="NR">
                                        Nauru
                                    </option>
                                    <option value="NP">
                                        Nepal
                                    </option>
                                    <option value="NL">
                                        Netherlands
                                    </option>
                                    <option value="AN">
                                        Netherlands Antilles
                                    </option>
                                    <option value="NC">
                                        New Caledonia
                                    </option>
                                    <option value="NZ">
                                        New Zealand
                                    </option>
                                    <option value="NI">
                                        Nicaragua
                                    </option>
                                    <option value="NE">
                                        Niger
                                    </option>
                                    <option value="NG">
                                        Nigeria
                                    </option>
                                    <option value="NU">
                                        Niue
                                    </option>
                                    <option value="NF">
                                        Norfolk Island
                                    </option>
                                    <option value="KP">
                                        North Korea
                                    </option>
                                    <option value="MP">
                                        Northern Marianas
                                    </option>
                                    <option value="NO">
                                        Norway
                                    </option>
                                    <option value="OM">
                                        Oman
                                    </option>
                                    <option value="PK">
                                        Pakistan
                                    </option>
                                    <option value="PW">
                                        Palau
                                    </option>
                                    <option value="PS">
                                        Palestine
                                    </option>
                                    <option value="PA">
                                        Panama
                                    </option>
                                    <option value="PG">
                                        Papua New Guinea
                                    </option>
                                    <option value="PY">
                                        Paraguay
                                    </option>
                                    <option value="PE">
                                        Peru
                                    </option>
                                    <option value="PH">
                                        Philippines
                                    </option>
                                    <option value="PN">
                                        Pitcairn Islands
                                    </option>
                                    <option value="PL">
                                        Poland
                                    </option>
                                    <option value="PT">
                                        Portugal
                                    </option>
                                    <option value="PR">
                                        Puerto Rico
                                    </option>
                                    <option value="QA">
                                        Qatar
                                    </option>
                                    <option value="RE">
                                        Reunion
                                    </option>
                                    <option value="RO">
                                        Romania
                                    </option>
                                    <option value="RU">
                                        Russia
                                    </option>
                                    <option value="RW">
                                        Rwanda
                                    </option>
                                    <option value="ST">
                                        Sao Tome and Principe
                                    </option>
                                    <option value="SH">
                                        Saint Helena
                                    </option>
                                    <option value="PM">
                                        St. Pierre and Miquelon
                                    </option>
                                    <option value="KN">
                                        Saint Kitts and Nevis
                                    </option>
                                    <option value="LC">
                                        Saint Lucia
                                    </option>
                                    <option value="VC">
                                        Saint Vincent and the Grenadines
                                    </option>
                                    <option value="WS">
                                        Samoa
                                    </option>
                                    <option value="SM">
                                        San Marino
                                    </option>
                                    <option value="SA">
                                        Saudi Arabia
                                    </option>
                                    <option value="SN">
                                        Senegal
                                    </option>
                                    <option value="RS">
                                        Serbia
                                    </option>
                                    <option value="SC">
                                        Seychelles
                                    </option>
                                    <option value="SL">
                                        Sierra Leone
                                    </option>
                                    <option value="SG">
                                        Singapore
                                    </option>
                                    <option value="SK">
                                        Slovakia
                                    </option>
                                    <option value="SI">
                                        Slovenia
                                    </option>
                                    <option value="SB">
                                        Solomon Islands
                                    </option>
                                    <option value="SO">
                                        Somalia
                                    </option>
                                    <option value="ZA">
                                        South Africa
                                    </option>
                                    <option value="GS">
                                        South Georgia and the South
                                        Sandwich Islands
                                    </option>
                                    <option value="KR">
                                        South Korea
                                    </option>
                                    <option value="ES">
                                        Spain
                                    </option>
                                    <option value="LK">
                                        Sri Lanka
                                    </option>
                                    <option value="SD">
                                        Sudan
                                    </option>
                                    <option value="SR">
                                        Suriname
                                    </option>
                                    <option value="SJ">
                                        Svalbard and Jan Mayen Islands
                                    </option>
                                    <option value="SZ">
                                        Swaziland
                                    </option>
                                    <option value="SE">
                                        Sweden
                                    </option>
                                    <option value="CH">
                                        Switzerland
                                    </option>
                                    <option value="SY">
                                        Syria
                                    </option>
                                    <option value="TW">
                                        Taiwan
                                    </option>
                                    <option value="TJ">
                                        Tajikistan
                                    </option>
                                    <option value="TZ">
                                        Tanzania
                                    </option>
                                    <option value="TH">
                                        Thailand
                                    </option>
                                    <option value="BS">
                                        The Bahamas
                                    </option>
                                    <option value="GM">
                                        The Gambia
                                    </option>
                                    <option value="TG">
                                        Togo
                                    </option>
                                    <option value="TK">
                                        Tokelau
                                    </option>
                                    <option value="TO">
                                        Tonga
                                    </option>
                                    <option value="TT">
                                        Trinidad and Tobago
                                    </option>
                                    <option value="TN">
                                        Tunisia
                                    </option>
                                    <option value="TR">
                                        Turkey
                                    </option>
                                    <option value="TM">
                                        Turkmenistan
                                    </option>
                                    <option value="TC">
                                        Turks and Caicos Islands
                                    </option>
                                    <option value="TV">
                                        Tuvalu
                                    </option>
                                    <option value="VI">
                                        US Virgin Islands
                                    </option>
                                    <option value="UG">
                                        Uganda
                                    </option>
                                    <option value="UA">
                                        Ukraine
                                    </option>
                                    <option value="AE">
                                        United Arab Emirates
                                    </option>
                                    <option value="GB">
                                        United Kingdom
                                    </option>
                                    <option value="US">
                                        United States
                                    </option>
                                    <option value="UM">
                                        United States Minor Outlying
                                        Islands
                                    </option>
                                    <option value="UY">
                                        Uruguay
                                    </option>
                                    <option value="UZ">
                                        Uzbekistan
                                    </option>
                                    <option value="VU">
                                        Vanuatu
                                    </option>
                                    <option value="VA">
                                        Vatican City
                                    </option>
                                    <option value="VE">
                                        Venezuela
                                    </option>
                                    <option value="VN">
                                        Vietnam
                                    </option>
                                    <option value="WF">
                                        Wallis and Futuna Islands
                                    </option>
                                    <option value="EH">
                                        Western Sahara
                                    </option>
                                    <option value="YE">
                                        Yemen
                                    </option>
                                    <option value="ZM">
                                        Zambia
                                    </option>
                                    <option value="ZW">
                                        Zimbabwe
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">Phone</label>
                                <input class= "form-control bfh-phone email-reg-name email-Reg0 email-Reg4" data-content=
                                "You have to use a VALID number in order to continue."
                                       data-country="countryData_gaff2"
                                       data-placement="top" data-toggle="popover"
                                       data-trigger="focus" id="phoneOrig_gaff2"
                                       pattern=".{9,20}" required="" type="text">
                            </div>
                            <div class="col-md-4 mem-second-arrow-right hidden-xs hidden-sm">
                                <img class="arrow-reversed" src="images/arrowLittleGreen.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class= "col-md-4 mem-third-arrow-left hidden-xs hidden-sm ">
                                <img src="images/arrowleft1.png">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">Email</label>
                                <input class="form-control email-Reg0 email-Reg5 email-reg-bestem"
                                       data-error=
                                       "Bruh, that email address is invalid" name=
                                       "email" placeholder="Your Best Email"
                                       required="" type="email" value="">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="register-label">Password</label>
                                <input class=
                                       "col-xs-12 form-control email-Reg0 email-Reg6 email-reg-name"
                                       name="password" pattern=".{6,12}"
                                       placeholder="Password" required="" title=
                                       "Please enter 6-12 characters" type=
                                       "password" value="">
                            </div>
                            <div class="col-md-4 mem-third-arrow-right hidden-xs hidden-sm">
                                <img src="images/arrowleft1.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <button type="submit">
                                    <div class="row">
                                        <div class="arrow"><img src=
                                                                "images/Layer18.png"></div>
                                        <div class="col-md-12 col-xs-9">
                                            UNLOCK MY PERSONAL ACCOUNT NOW
                                        </div>
                                    </div></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class= "col-md-12 col-xs-12 membership-block-text">
                        <img class="blockImg" src="images/block.png">Guaranteed Secure Access Ensured by Trusted Companies
                    </div>
                </div>
                <div class="row icons-block text-center">
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="m" src=
                            "images/mcafee.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="t" src=
                            "images/truste.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="v" src=
                            "images/red.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="n" src=
                            "images/norton.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="membership-footer">
    <div class="container">
        <div class="hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-5">
                    <h3>FAQ</h3>
                    <ul class="info">
                        <li class="active" data-class="item-1"><a>What is ClickMoney?</a></li>
                        <li data-class="item-2"><a>How much does it cost?</a></li>
                        <li data-class="item-3"><a>What if I already have account?</a></li>
                        <li data-class="item-4"><a>What is the success rate fo ClickMoney?</a></li>
                        <li data-class="item-5"><a>How much money can I earn per day?</a></li>
                        <li data-class="item-6"><a>How many people have found success so far?</a></li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="item-1 active">
                            <h3>What is ClickMoney?</h3>
                            <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                global market and leverages it to make millions for its users.</p>
                        </div>
                        <div class="item-2">
                            <h3></h3>
                            <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                software.</p>
                        </div>
                        <div class="item-3">
                            <h3></h3>
                            <p>ClickMoney software needs to validate your account and its done automatically after
                                you’ve funded your trading account with one of the recommended brokers.</p>
                        </div>
                        <div class="item-4">
                            <h3></h3>
                            <p>The average success rate for ClickMoney members is 99%.</p>
                        </div>
                        <div class="item-5">
                            <h3></h3>
                            <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                The longer the software is on and running, the more money you can make! The best part is
                                ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                average, $10,000 a day.
                                Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                        </div>
                        <div class="item-6">
                            <h3></h3>
                            <p>Millions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-lg hidden-md">
            <div class="hidden-lg hidden-md">
                <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseOne">What is ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                    global market and leverages it to make millions for its users.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseTwo">How much does it cost?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                    software.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseThree">What if I already have account?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>ClickMoney software needs to validate your account and its done automatically after
                                    you’ve funded your trading account with one of the recommended brokers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFour">What is the success rate fo ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The average success rate for ClickMoney members is 99%.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFive">How much money can I earn per day?</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                    The longer the software is on and running, the more money you can make! The best part is
                                    ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                    average, $10,000 a day.
                                    Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseSix">How many people have found success so far?</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Millions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container footer">
        <div class="col-md-4 col-xs-6 copyright">
            <p><?= date('Y'); ?> Clickmoney. All Rights Reserved</p>
        </div>
        <div class="col-md-8 col-xs-6 copyright vcenter menu">
            <ul>
                <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy</a></li>
                <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms</a></li>
                <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy</a></li>
                <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
            </ul>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="myVideo" class="modal fade video-popup" tabindex="-1" role="dialog" aria-labelledby="my-modal-box-l" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5>JOAN KOWALOWSKY</h5>
            <p>TESTIMONIAL</p>
            <a href="" class="pull-right login-close" data-dismiss="modal" aria-label="Close"><img src="images/close-video.png"></a>
            <div class="embed-responsive embed-responsive-16by9">
                <img class="img-responsive" src="images/girl-popup.png">
                <img class="img-responsive play-button" src="images/stop.png">
            </div>
        </div>
    </div>
</div>





























<!--
<div id="gaff" class="gaff"></div>

<div class="row membship1">
    <div class ="membship0">
        <div class="container header">
            <div class="row ">
                <div class="welcHead col-lg-12">WELCOME</div>
            </div>
            <div class="row">
                <div class="welcHead1 col-lg-12"><h2>This is the CLICKMONEY Biz Members Area</h2></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-12 logo1">
                    <img src="/images/ClickMoneyLogo/Logo-yellow.svg">
                </div>
                <div class="col-md-8 col-xs-12">
                    Please Watch The <span class="text-dashed">Video Below</span> For Further Instructions
                </div>
                <div class="col-md-2 col-xs-12 boxIcon">
                    <div class="row">
                        <div class="col-md-2 elOne0">
                            <img src="/images/elipsOne.png">
                        </div>
                        <div class="col-md-10 row">
                            <div class="col-lg-12 textHeadMemb0">LICENCE LEFT</div>
                            <div class="col-lg-12 textHeadMemb1">UPDATED SEP 20 2016</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container content">
            <div class="row">
                <div class="col-md-7 left_block">
                    <!--<iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="images/imagineForVideo.png"></iframe>-->
<!--                    <div class="embed-responsive-item video_through">
                        <img class="play-button" src="/images/play.png">
                    </div>
                    <div class="text-for-video">
                        <span>Watch the Video Now! Expires in: 00h:03m:27s</span>
                    </div>
                    <div class="arrow-for-video">
                        <img src="/images/yellowArrow1.png">
                    </div>
                </div>
                <div class="col-md-5 right_block">
                    <h2 class="register_text">Please <b class="stripped_underline">register</b> your Clickmoney biz below</h2>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">
                                <div class="left_item col-md-6">
                                    <span>First Name</span>
                                </div>
                                <div class="right_item col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="<!?= $fname; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">

                                <div class="left_item_not_stripped col-md-6">
                                    <button class="col-xs-12 dropdown-toggle email-reg-coundtry " type="button" data-toggle="dropdown">Bulgaria <i class="caret"></i><br>
                                    </button>
                                </div>



                                <div class="right_item col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="+359 878 542611">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">
                                <div class="left_item col-md-6">
                                    <span>Your Best Email</span>
                                </div>
                                <div class="right_item validation_failded col-md-6">
                                    <div class="form-group">
                                        <input class="email_text" type="text" value="<!?= $email; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="button1 button_left_align col-md-12 col-xs-6">
                            <div class="row">
                                <div class="col-md-1 col-xs-1">
                                    <img src="/images/memb/Layer18.png">
                                </div>
                                <div class="col-md-11 col-xs-11 proceed">
                                    <span>unlock my personal account now</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="row">
                        <div class="row blockMob">
                            <div class="col-md-10 col-md-offset-1 licence">
                                <div><img class="blockImg" src="/images/block.png">Guaranteed Secure Access Ensured by Trusted Companies</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 col-md-offset-1 col-xs-12 blockIconsMob">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/mcafee.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/truste.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/red.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/norton.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship2">
    <div class="memebership_content">
        <p><span class="green">3</span> Quick and Easy Steps</p>
        <p class="text">TO START YOUR BUSINESS</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-5">
                    <img class="first-arrow" src="/images/arrowGreen.png">
                    <img class="first-arrow-add" src="/images/memb/Ellipse3green.png">
                    <div class="first-num">1</div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey">YOU'RE HERE!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="green">Register</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="green register-label">Sign up to the system, choose a username and a password</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-1 arrow hidden-xs hidden-sm">
            <img src="/images/arrowLittleGreen.png">
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4">
                    <img class="second-arrow" src="/images/memb/arrGrey.png">
                    <img class="second-arrow-add" src="/images/memb/Ellipse3copy.png">
                    <div class="second-num">2</div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="steps-title">Deposit</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey-small-text">Find your trading account with minimum investment of $250</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 arrow hidden-xs hidden-sm">
            <img src="/images/arrowLittleGreen.png">
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4">
                    <img class="third-arrow" class="third-arrow arrow-transform-right" src="/images/memb/arrGrey.png">
                    <img class="third-arrow-add" src="/images/memb/Ellipse3copy.png">
                    <div class="third-num">3</div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="steps-title">Profit!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey-small-text">Open a bottle of champagne and watch the money rain!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship3">
    <div class="membership-text col-md-12">
        <div class="text-center text-days">180 DAYS</div>
        <div class="text-center text-lower">SEE WHAT CLICKMONEY CAN DO IN JUST</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="has-background">
    <div class="row membship2">
        <div class="text-center">
            <p class="grey">THIS OFFER CLOSES IN<span class="count-down">3m</span><span class="count-down">35s</span></p>
            <p class="register-text"><span class="green">Last chance,</span> Register your</p>
            <p class="register-text">ClickMoney Biz Right Now</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 mem-first-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                        <div class="left_item col-md-3 col-xs-6">
                            <span>First Name</span>
                        </div>
                        <div class="right_item col-md-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" value="<!?= $fname; ?>">
                            </div>
                        </div>
                        <div class="col-md-3 hidden-xs hidden-sm hidden-md">
                            <img class="mem-first-arrow-right" src="/images/arrowleft1.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 mem-second-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowLittleGreen.png">
                        </div>
                        <div class="left_item_not_stripped col-md-3 col-xs-6">
                            <button class="col-xs-12 dropdown-toggle email-reg-coundtry " type="button" data-toggle="dropdown">Bulgaria <i class="caret"></i><br>
                            </button>
                        </div>
                        <div class="right_item col-md-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" value="+359 878 542611">
                            </div>
                        </div>
                        <div class="col-md-3 mem-second-arrow-right hidden-xs hidden-sm hidden-md">
                            <img class="arrow-reversed" src="/images/arrowLittleGreen.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 mem-third-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                        <div class="left_item col-md-3 col-xs-6">
                            <span>Your Best Email</span>
                        </div>
                        <div class="right_item validation_failded col-md-3 col-xs-6">
                            <div class="form-group">
                                <input class="email_text" type="text" value="<!?= $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mem-third-arrow-right hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <a href="#">
                        <div class="button1 lowest-btn">
                            <div class="row">
                                <div class="col-xs-2">
                                    <img src="/images/memb/Layer18.png">
                                </div>
                                <div class="col-xs-10">
                                    <span>unlock my personal account now</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="blockMob">
                            <div class="col-md-6 col-md-offset-3 licence">
                                <div><img class="blockImg" src="/images/block.png">Guaranteed Secure Access Ensured by Trusted Companies</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/mcafee.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/truste.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/red.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/norton.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship5">
    <div class="container">
        <div class="hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-5">
                    <h3>FAQ</h3>
                    <ul>
                        <li class="active" data-class="item-1">What is ClickMoney?</li>
                        <li data-class="item-2">How much does it cost?</li>
                        <li data-class="item-3">What if I already have account?</li>
                        <li data-class="item-4">What is the success rate fo ClickMoney?</li>
                        <li data-class="item-5">How much money can I earn per day?</li>
                        <li data-class="item-6">How many people have found success so far?</li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="item-1 active">
                            <h3>What is ClickMoney?</h3>
                            <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                global market and leverages it to make millions for its users.</p>
                        </div>
                        <div class="item-2">
                            <h3></h3>
                            <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                software.</p>
                        </div>
                        <div class="item-3">
                            <h3></h3>
                            <p>ClickMoney software needs to validate your account and its done automatically after
                                you’ve funded your trading account with one of the recommended brokers.</p>
                        </div>
                        <div class="item-4">
                            <h3></h3>
                            <p>The average success rate for ClickMoney members is 99%.</p>
                        </div>
                        <div class="item-5">
                            <h3></h3>
                            <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                The longer the software is on and running, the more money you can make! The best part is
                                ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                average, $10,000 a day.
                                Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                        </div>
                        <div class="item-6">
                            <h3></h3>
                            <p>Millions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-lg hidden-md">
            <div class="hidden-lg hidden-md">
                <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseOne">What is ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                    global market and leverages it to make millions for its users.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseTwo">How much does it cost?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                    software.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseThree">What if I already have account?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>ClickMoney software needs to validate your account and its done automatically after
                                    you’ve funded your trading account with one of the recommended brokers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFour">What is the success rate fo ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The average success rate for ClickMoney members is 99%.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFive">How much money can I earn per day?</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                    The longer the software is on and running, the more money you can make! The best part is
                                    ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                    average, $10,000 a day.
                                    Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseSix">How many people have found success so far?</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Millions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer">
        <div class="col-md-3 col-lg-offset-1 col-xs-6 copyright">
            <p>2016 Clickmoney. All Rights Reserved</p>
        </div>
        <div class="col-md-6 col-md-offset-2 col-xs-6 copyright">
            <span>Government Disclamer</span>
            <span> | </span>
            <span>Privacy Policy</span>
            <span> | </span>
            <span>Terms</span>
            <span> | </span>
            <span>Earnings Disclaimer</span>
            <span> | </span>
            <span>Spam policy</span>
            <span> | </span>
            <span>Support</span>
        </div>
    </div>
</div>
-->