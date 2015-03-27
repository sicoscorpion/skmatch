<?php

class Session {

	private static $_sessionStarted = false;

	public static function init(){

		if(self::$_sessionStarted == false){
			session_start();
			self::$_sessionStarted = true;
		}

	}

	public static function set($key,$value){
		$_SESSION[SESSION_PREFIX.$key] = $value;
	}

	public static function get($key,$secondkey = false){

		if($secondkey == true){

			if(isset($_SESSION[SESSION_PREFIX.$key][$secondkey])){
				return $_SESSION[SESSION_PREFIX.$key][$secondkey];
			}

		} else {

			if(isset($_SESSION[SESSION_PREFIX.$key])){
				return $_SESSION[SESSION_PREFIX.$key];
			}

		}

		return false;

	}
	/**
     * gets/returns the value of a specific key of the session
     *
     * @param mixed $key Usually a string, right ?
     * @return mixed the key's value or nothing
     */
    // public static function get($key)
    // {
    //     if (isset($_SESSION[$key])) {
    //         return $_SESSION[$key];
    //     }
    // }

    /**
     * adds a value as a new array element to the key.
     * useful for collecting error messages etc
     *
     * @param mixed $key
     * @param mixed $value
     */
    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }


	public static function display(){
		return $_SESSION;
	}

	public static function destroy(){

		if(self::$_sessionStarted == true){
			session_unset();
			session_destroy();
		}

	}
	public static function userIsLoggedIn()
    {
        return (Session::get('logedIn') ? true : false);
    }

}