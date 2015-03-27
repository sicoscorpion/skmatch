<?php

class User_model extends Model {

	public function __construct(){
		parent::__construct();
	}	

	public function get_hash($email){
		$data = $this->_db->select("SELECT password FROM users WHERE email = :email", array(':email' => $email));
		return $data[0]->password;
	} 

	public function getUserInfo($email){
		$data = $this->_db->select("SELECT * FROM users WHERE email = :email", array(':email' => $email));
		return $data;
	}

	public function updateUserInfo($data){
		if ($data['password'] != "") {
			$validation_result = self::updateInputValidation($data['password'], $data['verifyPassword']);
			if (!$validation_result) {
				return false;
			}
			$hash = Password::make($data['password'], PASSWORD_BCRYPT, array("cost" => 10));
			$postArray = array( 
				'firstName' => $data['firstName'],
				'lastName' => $data['lastName'],
				'password' => $hash,
				'phone' => $data['phone'],
			);
		} else {
			$postArray = array( 
				'firstName' => $data['firstName'],
				'lastName' => $data['lastName'],
				'phone' => $data['phone'],
			);
		}
		
		$data = $this->_db->update("users", $postArray, array('email' => $data['email']));

		return true;
	}

	public static function updateInputValidation($user_password_new, $user_password_repeat)
	{
        // if username, email and password are all correctly validated
        if (parent::validateUserPassword($user_password_new, $user_password_repeat)) {
            return true;
        }

		// otherwise, return false
		return false;
	}
}