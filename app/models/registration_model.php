<?php

class Registration_model extends Model {
	public function __construct(){
		parent::__construct();
	}

	public function registerNewUser($firstName, $lastName, $email, 
		$password, $verifyPassword, $phone, $admin) {

		if(count(self::getUserByEmail($email)) != 0 ) {
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
        if (parent::validateUserEmail($email) AND parent::validateUserPassword($user_password_new, $user_password_repeat)) {
            return true;
        }

		// otherwise, return false
		return false;
	}


    
}