<?php

class Projects_model extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function addNewProject($data) {
		$toBePosted	= array(
			'description' => $data['description'],
			'title' => $data['projectTitle'],
			'approved' => true,
			'email' => $data['email'],
			'project_creation_timestamp' => time()
			);

		$result = $this->_db->insert("projects", $toBePosted);

		return true;
	}

	public function viewOwnProjects($email) {
		$data = $this->_db->select("SELECT * FROM projects WHERE email = :email", array(':email' => $email));
		return $data;
	}

	public function deleteProjectById($project) {
		$data = $this->_db->delete("projects", $project);
		return true;
	}

}