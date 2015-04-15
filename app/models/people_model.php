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
			'listed' => $data['listed'],
			'approved' => false,
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
		$data = $this->_db->select("SELECT ID, description, headline, people_creation_timestamp FROM people WHERE approved = :approved AND listed = :listed", array(':approved' => true, ':listed' => true));
		return $data;
	}

	public function viewPublicPeopleForUsers() {
		$data = $this->_db->select("SELECT * FROM people WHERE approved = :approved AND listed = :listed", array(':approved' => true, ':listed' => true));
		return $data;
	}

	public function viewPeopleForAdmin() {
		$data = $this->_db->select("SELECT * FROM people WHERE approved = :approved AND listed = :listed", array(':approved' => false, ':listed' => true));
		return $data;
	}
	public function updatePeopleByAdmin($data) {
		if ($data['id'] == "") {
			return false;
		}

		$postArray = array(
			'approved' => true,
			'people_creation_timestamp' => time()
			);
		$where = array('id' => $data['id']);

		$data = $this->_db->update("people", $postArray, $where);
		return true;
	}

	public function deletePeopleById($person) {
		$data = $this->_db->delete("people", $person);
		return true;
	}

	public function updatePeopleById($data) {
		if ($data['id'] == "") {
			return false;
		}

		$postArray = array(
			'description' => $data['description'],
			'headline' => $data['headline'],
			'listed' => $data['listed'],
			'approved' => false,
			'people_creation_timestamp' => time()
			);
		$where = array('id' => $data['id']);

		$data = $this->_db->update("people", $postArray, $where);
		return true;
	}
}