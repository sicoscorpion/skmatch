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

		$res = $this->_db->update("people", $postArray, $where);

		$mail_to      = $data['email'];  
    $mail_subject = 'Profile ' . $data['headline'] . ' Approved';  
    $mail_body = "Hello, 
      <br><br> 
      Your Profile, headlined: ". $data['headline']. ", has been approved.<br> 
      You can see it in action at http://skilzmatch.acadiau.ca/people/index.<br><br>
      Best regards, 
      <br><br> 
      skilzmatch.acadiau.ca";
    $mail = new Mail;
		$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "People-Skillzmatch", $mail_subject, $mail_body);

		if ($mail_sent == 1) {
			return true;
		} else {
			Session::add('feedback_negative', "Mail not sent" . $data );
			return false;
		}
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
		// Session::add('feedback_positive', $data['listed']);
		$postArray = array(
			'description' => $data['description'],
			'headline' => $data['headline'],
			'listed' => $data['listed'],
			'approved' => false,
			'people_creation_timestamp' => time()
			);
		$where = array('id' => $data['id']);
		$res = $this->_db->update("people", $postArray, $where);

		if($data['listed']) {
			$mail_to      = "skilzmatch@acadiau.ca";  
	    $mail_subject = 'Person listing ' . $data['id'] . ' Updated';  
	    $mail_body = "Hello, 
	      <br><br> 
	      Someone updated their listing at http://skilzmatch.acadiau.ca/user/admin. 
	      <br><br> 
	      Headline: " . $data['headline'] . "
	      <br><br> 
	      Description: " . $data['description'] . "
	      <br><br>
	      Best regards, 
	      <br><br> 
	      skilzmatch.acadiau.ca";
	    $mail = new Mail;
			$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "People-Skillzmatch", $mail_subject, $mail_body);

			if ($mail_sent == 1) {
				return true;
			} else {
				Session::add('feedback_negative', "Mail not sent" . $mail->getError() );
				return false;
			}
		}

		
		return true;
	}
}