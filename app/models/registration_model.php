<?php

class Registration_model extends Model {
	public function __construct(){
		parent::__construct();
	}

	public function registerNewUser($firstName, $lastName, $email, 
		$password, $verifyPassword, $phone, $admin) {

		if(count(Self::getUserByEmail($email)) != 0 ) {
			Session::add('feedback_negative', "Email Exists .. choose another email");
			return false;
		}
		$validation_result = self::registrationInputValidation($email, $password, $verifyPassword);
		if (!$validation_result) {
			return false;
		}
		
		$hash = Password::make($password, PASSWORD_BCRYPT, array("cost" => 10));

		$data = $this->_db->insert("users", array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'email' => $email,
			'password' => $hash,
			'phone' => $phone,
			'admin' => $admin));
		return true;
	}
	
	public function getUserByEmail($email) {
		$data = $this->_db->select("SELECT email FROM users WHERE email = :email", array(':email' => $email));
		return $data[0]->email;
	}

	public static function registrationInputValidation($email, $user_password_new, $user_password_repeat)
	{
        // if username, email and password are all correctly validated
        if (self::validateUserEmail($email) AND self::validateUserPassword($user_password_new, $user_password_repeat)) {
            return true;
        }

		// otherwise, return false
		return false;
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
            Session::add('feedback_negative', "Password too short");
            return false;
        }

        return true;
    }
}