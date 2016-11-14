<?php

class Error
{

// --------------------------------------  ERROR CONSTS  -----------------------------------------------------

	
	// GENERAL
	const OK = 0;
	
	// DB 1001 - 2000
	const DB_CANT_CONNECT_SERVER = 1001;
	const DB_CANT_OPEN_DATABASE = 1002;
	const DB_CANT_CLOSE_CONNECTION = 1003;
	const DB_SQL_QUERY_FAILED = 1004;
	const DB_INVALID_QUERY_ID = 1005;
	const DB_CANT_FREE_RESULT = 1006;
	
	
	// USER 2001 - 3000
	const USER_CANT_CREATE_USER_CLASS = 2001;	
	const USER_CANT_LOGIN_WRONG_USERNAME_PASSWORD = 2002;
	const USER_CANT_LOGIN = 2003;
	const USER_CANT_REDIRECT_AFTER_LOGOUT = 2004;
	const USER_NOT_LOADED = 2005;
	const USER_ERROR_CHECKING_USER_ACTIVE = 2006;
	const USER_ALREADY_ACTIVATED = 2007;
	const USER_CANT_ACTIVATE_ACCOUNT = 2008;
	const USER_CANT_INSERT_USER_WRONG_DATA_FORMAT = 2009;
	const USER_CANT_INSERT_USER_EMAIL_ALREADY_IN_USE = 2010;
	const USER_CANT_INSERT_USER_USERNAME_ALREADY_IN_USE = 2011;
	const USER_CANT_INSERT_USER = 2012;
	const USER_ERROR_CHECKING_USER_EMAIL = 2013;
	const USER_ERROR_CHECKING_USER_USERNAME = 2014;
	const USER_CANT_LOAD_USER = 2015;
	const USER_NOT_FOUND = 2016;
	const USER_CANT_ADD_LOGIN_LOG = 2017;
	const USER_CANT_CREATE_ACTIVATION_KEY = 2018;
	const USER_CANT_DELETE_ACTIVATION_KEY = 2019;
	const USER_ACTIVATION_KEY_NOT_FOUND = 2020;
	const USER_ACTIVATION_KEY_EXPIRED = 2021;
	const USER_NOT_ACTIVATED = 2022;
	const USER_CANT_DELETE_USER = 2023;
	const USER_CANT_UPDATE_USER = 2024;
	const USER_UNKNOWN_FIELD = 2025;
	const USER_NOT_LOGGED_IN = 2026;
	
	
	// Mail 3001 - 4000
	const EMAIL_ERROR_SENDING_EMAIL = 3001;
	
	// Language 4001 - 5000
	const LANGUAGE_CANT_FIND_TEXT = 4001;
	const LANGUAGE_FILE_DOES_NOT_EXIST = 4002;
	
	
	
	// Login 9001 - 10000
	const LOGIN_CANT_CREATE_LOGIN_CLASS = 9001;
	const LOGIN_CANT_LOGIN_WRONG_USERNAME_PASSWORD = 9002;
	const LOGIN_CANT_LOGIN = 9003;
	const LOGIN_CANT_REDIRECT_AFTER_LOGOUT = 9004;
	const LOGIN_USER_NOT_ACTIVATED = 9005;
	const LOGIN_CANT_REDIRECT_AFTER_LOGIN = 9006; 
	const LOGIN_CANT_ADD_LOGIN_LOG = 9007;
		
	// UploadFile 50001 - 51000
	const UPLOADFILE_CANT_UPLOAD_FILE = 50001;
	const UPLOADFILE_FILE_SIZE_IS_ZERO = 50002;
	const UPLOADFILE_FILES_OBJECT_IS_EMPTY = 50003; 
// --------------------------------------  PUBLIC  PROPERTIES  -----------------------------------------------------

    
// --------------------------------------  PRIVATE PROPERTIES  -----------------------------------------------------


	private static $m_error_messages = array();
	




// --------------------------------------  PUBLIC  METHODES  -----------------------------------------------------

	
	
    public static function getErrorMessage($code=0)
    {
    	if(count(self::$m_error_messages) == 0)
    		self::loadErrorMessages();
		return self::$m_error_messages[$code];    	
    }
    
    
    public static function getErrorCodeName($code=0)
    {
		$error_class = new ReflectionClass('Error');
        $constants = $error_class->getConstants();
        $constants = array_flip($constants);
        return $constants[$code];
    	
    
    }
    
// --------------------------------------  PRIVATE  METHODES  -----------------------------------------------------
	

	private static function loadErrorMessages()
	{
		// General Errors
		self::$m_error_messages[self::OK] = "OK";
		
		// DB Errors
		self::$m_error_messages[self::DB_CANT_CONNECT_SERVER] = "Could not connect to server";
		self::$m_error_messages[self::DB_CANT_OPEN_DATABASE] = "Could not open database";
		self::$m_error_messages[self::DB_CANT_CLOSE_CONNECTION] = "Failed to close databse connection";
		self::$m_error_messages[self::DB_SQL_QUERY_FAILED] = "Failed to execute sql query";
		self::$m_error_messages[self::DB_INVALID_QUERY_ID] = "Invalid query_id";
		self::$m_error_messages[self::DB_CANT_FREE_RESULT] = "Can't free result";
		
		// USER Errors
		self::$m_error_messages[self::USER_CANT_CREATE_USER_CLASS] = "Can't create user class";
		self::$m_error_messages[self::USER_CANT_LOGIN_WRONG_USERNAME_PASSWORD] = "Can't login, wrong user name or password";
		self::$m_error_messages[self::USER_CANT_LOGIN] = "Can't login";
		self::$m_error_messages[self::USER_CANT_REDIRECT_AFTER_LOGOUT] = "Can't redirect after logout";
		self::$m_error_messages[self::USER_NOT_LOADED] = "User not loaded";
		self::$m_error_messages[self::USER_ERROR_CHECKING_USER_ACTIVE] = "User not loaded";
		self::$m_error_messages[self::USER_ALREADY_ACTIVATED] = "User account already activated";
		self::$m_error_messages[self::USER_CANT_ACTIVATE_ACCOUNT] = "Can't activate user account";
		self::$m_error_messages[self::USER_CANT_INSERT_USER_WRONG_DATA_FORMAT] = "Can't insert user, wrong data format";
		self::$m_error_messages[self::USER_CANT_INSERT_USER_EMAIL_ALREADY_IN_USE] = "Can't insert user,email already in use";
		self::$m_error_messages[self::USER_CANT_INSERT_USER_USERNAME_ALREADY_IN_USE] = "Can't insert user,username already in use";
		self::$m_error_messages[self::USER_CANT_INSERT_USER] = "Can't insert user";
		self::$m_error_messages[self::USER_ERROR_CHECKING_USER_EMAIL] = "Error while cheking if user's email exists";
		self::$m_error_messages[self::USER_ERROR_CHECKING_USER_USERNAME] = "Error while cheking if user's username exists";
		self::$m_error_messages[self::USER_CANT_LOAD_USER] = "Can't load user";
		self::$m_error_messages[self::USER_NOT_FOUND] = "User not found in database";
		self::$m_error_messages[self::USER_CANT_ADD_LOGIN_LOG] = "Can't add login log to database";
		self::$m_error_messages[self::USER_CANT_CREATE_ACTIVATION_KEY] = "Can't create activation key";
		self::$m_error_messages[self::USER_CANT_DELETE_ACTIVATION_KEY] = "Can't delete activation key";
		self::$m_error_messages[self::USER_ACTIVATION_KEY_NOT_FOUND] = "Activation key not found";
		self::$m_error_messages[self::USER_ACTIVATION_KEY_EXPIRED] = "Activation key expired";
		self::$m_error_messages[self::USER_NOT_ACTIVATED] = "User was not activated";
		self::$m_error_messages[self::USER_CANT_DELETE_USER] = "Can't delete user";
		self::$m_error_messages[self::USER_CANT_UPDATE_USER] = "Can't update user";
		self::$m_error_messages[self::USER_UNKNOWN_FIELD] = "Unknown user field";
		self::$m_error_messages[self::USER_NOT_LOGGED_IN] = "User not logged in";
		
		// Email Errors
		self::$m_error_messages[self::EMAIL_ERROR_SENDING_EMAIL] = "There was an error sending email";
		
		// Language Errors
		self::$m_error_messages[self::LANGUAGE_CANT_FIND_TEXT] = "Cant find text";
		self::$m_error_messages[self::LANGUAGE_FILE_DOES_NOT_EXIST] = "Language file does not exist";
		
		
		
        // Login
        self::$m_error_messages[self::LOGIN_CANT_CREATE_LOGIN_CLASS] = "Can't create login class"; 
        self::$m_error_messages[self::LOGIN_CANT_LOGIN_WRONG_USERNAME_PASSWORD] = "Can't login, wrong user name or password";
		self::$m_error_messages[self::LOGIN_CANT_LOGIN] = "Can't login";
		self::$m_error_messages[self::LOGIN_CANT_REDIRECT_AFTER_LOGOUT] = "Can't redirect after logout";
		self::$m_error_messages[self::LOGIN_USER_NOT_ACTIVATED] = "User is not activated";
		self::$m_error_messages[self::LOGIN_CANT_REDIRECT_AFTER_LOGIN] = "Can't redirect after login";
		self::$m_error_messages[self::LOGIN_CANT_ADD_LOGIN_LOG] = "Can't add login log info";
		
        
		// UploadFile
		self::$m_error_messages[self::UPLOADFILE_CANT_UPLOAD_FILE] = "Can't upload file";
		self::$m_error_messages[self::UPLOADFILE_FILE_SIZE_IS_ZERO] = "file size is zero";
		self::$m_error_messages[self::UPLOADFILE_FILES_OBJECT_IS_EMPTY] = "_FILES object is empty";
        
	}
	

}//CLASS Error

?>