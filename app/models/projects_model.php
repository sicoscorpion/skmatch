<?php

class Projects_model extends Model {

	public function __construct(){
		parent::__construct();
	}

	public function addNewProject($data) {
		$toBePosted	= array(
			'description' => $data['description'],
			'title' => $data['projectTitle'],
			'approved' => false,
			'email' => $data['email'],
			'project_creation_timestamp' => time()
			);

		$result = $this->_db->insert("projects", $toBePosted);

		$mail_to      = "skilzmatch@acadiau.ca";  
    $mail_subject = 'New Project Added';  
    $mail_body = "Hello, 
      <br><br> 
      Someone added a new project at http://skilzmatch.acadiau.ca/user/admin. 
      <br><br> 
      Title: " . $data['projectTitle'] . "
      <br><br> 
      Description: " . $data['description'] . "
      <br><br>
      Best regards, 
      <br><br> 
      skilzmatch.acadiau.ca";
    $mail = new Mail;
		$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "Projects-Skillzmatch", $mail_subject, $mail_body);

		if ($mail_sent == 1) {
			return true;
		} else {
			// Session::add('feedback_negative', "Mail not sent" . $mail->getError() );
			return false;
		}

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
	public function viewProjectsForAdmin() {
		$data = $this->_db->select("SELECT * FROM projects WHERE approved = :approved", array(':approved' => false));
		return $data;
	}

	public function updateProjectByAdmin($project) {
		if ($project['id'] == "") {
			return false;
		}

		$postArray = array(
			'approved' => true,
			'project_creation_timestamp' => time()
			);
		$where = array('id' => $project['id']);

		$data = $this->_db->update("projects", $postArray, $where);
		$mail_to      = $project['email'];  
    $mail_subject = 'Project ' . $project['title'] . ' Approved';  
    $mail_body = "Hello, 
      <br><br> 
      Your project, titled: ". $project['title']. ", has been approved.<br> 
      You can see it in action at http://skilzmatch.acadiau.ca/projects/index.<br><br>
      Best regards, 
      <br><br> 
      skilzmatch.acadiau.ca";
    $mail = new Mail;
		$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "Projects-Skillzmatch", $mail_subject, $mail_body);

		if ($mail_sent == 1) {
			return true;
		} else {
			Session::add('feedback_negative', "Mail not sent" . $project['email'] );
			return false;
		}
		return true;
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
			'approved' => false,
			'project_creation_timestamp' => time()
			);
		$where = array('id' => $project['id']);

		$data = $this->_db->update("projects", $postArray, $where);

		$mail_to      = "skilzmatch@acadiau.ca";  
    $mail_subject = 'Project ' . $project['id'] . ' Updated';  
    $mail_body = "Hello, 
      <br><br> 
      Someone updated their project at http://skilzmatch.acadiau.ca/user/admin. 
      <br><br> 
      Title: " . $data['projectTitle'] . "
      <br><br> 
      Description: " . $data['description'] . "
      <br><br>
      Best regards, 
      <br><br> 
      skilzmatch.acadiau.ca";
    $mail = new Mail;
		$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "Projects-Skillzmatch", $mail_subject, $mail_body);

		if ($mail_sent == 1) {
			return true;
		} else {
			Session::add('feedback_negative', "Mail not sent" . $mail->getError() );
			return false;
		}
		return true;
	}

}