<?php 

class Model {

	protected $_db;
	
	public function __construct(){
		//connect to PDO here.
		$this->_db = new Database();
	}
	/**
     * Validates the email
     *
     * @param $user_email
     * @return bool
     */
    public static function validateUserEmail($email)
    {
        if (empty($email)) {
            Session::add('feedback_negative', "Invalid Email Address");
            return false;
        }

        // validate the email with PHP's internal filter
        // side-fact: Max length seems to be 254 chars
        // @see http://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::add('feedback_negative', "Invalid Email Address");
            return false;
        }

        return true;
    }

    /**
     * Validates the password
     *
     * @param $user_password_new
     * @param $user_password_repeat
     * @return bool
     */
    public static function validateUserPassword($user_password_new, $user_password_repeat)
    {
        if (empty($user_password_new) OR empty($user_password_repeat)) {
            Session::add('feedback_negative', "Empty Password Field");
            return false;
        }

        if ($user_password_new !== $user_password_repeat) {
            Session::add('feedback_negative', "Password and Verification don't match");
            return false;
        }

        if (strlen($user_password_new) < 6) {
            Session::add('feedback_negative', "Password too short - Passwords should be greater than 6 characters");
            return false;
        }

        return true;
    }
}
