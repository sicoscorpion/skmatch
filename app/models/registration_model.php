<?php

class Registration_model extends Model {
	public function __construct(){
		parent::__construct();
	}

	public function registerNewUser($firstName, $lastName, $email, 
		$password, $phone, $admin) {

		if($this->getUserByEmail($email)) {
			View::alertMsg("DUPLICATE");
			// Session::add('feedback_negative',"Does Exist .. choose another email");
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
		$data = $this->_db->select("SELECT email FROM "."users WHERE email = :email", array(':email' => $email));
		View::alertMsg($data[0]->email);
		return $data[0]->email;
	}
}