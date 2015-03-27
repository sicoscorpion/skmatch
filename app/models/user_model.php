<?php

class User_model extends Model {

	public function __construct(){
		parent::__construct();
	}	

	public function get_hash($email){
		$data = $this->_db->select("SELECT password FROM "."users WHERE email = :email", array(':email' => $email));
		return $data[0]->password;
	} 
}