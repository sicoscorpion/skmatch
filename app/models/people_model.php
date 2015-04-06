<?php

class People_model extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function addNewPeople($data) {
		View::alertMsg($peopleListing);
		$toBePosted	= array(
			'description' => $data['description'],
			'headline' => $data['headline'],
			'approved' => true,
			'email' => $data['email'],
			'people_creation_timestamp' => time()
			);

		$result = $this->_db->insert("people", $toBePosted);

		return true;
	}

	public function viewOwnPeople($email) {
		$data = $this->_db->select("SELECT * FROM people WHERE email = :email", array(':email' => $email));
		return $data;
	}

	public function viewPublicPeople() {
		$data = $this->_db->select("SELECT ID, description, headline, people_creation_timestamp FROM people WHERE approved = :approved", array(':approved' => true));
		return $data;
	}

	public function viewPublicPeopleForUsers() {
		$data = $this->_db->select("SELECT * FROM people WHERE approved = :approved", array(':approved' => true));
		return $data;
	}

	public function updatePeopleById($data) {
		if ($data['id'] == "") {
			return false;
		}

		$postArray = array(
			'description' => $data['description'],
			'headline' => $data['headline'],
			'approved' => $data['approved'],
			'people_creation_timestamp' => time()
			);
		$where = array('id' => $data['id']);

		$data = $this->_db->update("people", $postArray, $where);
		return true;
	}
}