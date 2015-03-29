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
	public function viewPublicProjects() {
		$data = $this->_db->select("SELECT ID, title, description, project_creation_timestamp FROM projects WHERE approved = :approved", array(':approved' => true));
		return $data;
	}
	public function viewPublicProjectsForUsers() {
		$data = $this->_db->select("SELECT * FROM projects WHERE approved = :approved", array(':approved' => true));
		return $data;
	}

	public function deleteProjectById($project) {
		$data = $this->_db->delete("projects", $project);
		return true;
	}

	public function updateProjectById($project) {
		if ($project['id'] == "") {
			return false;
		}

		$postArray = array(
			'description' => $project['description'],
			'title' => $project['title'],
			'project_creation_timestamp' => time()
			);
		$where = array('id' => $project['id']);

		$data = $this->_db->update("projects", $postArray, $where);
		return true;
	}

}