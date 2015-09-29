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

	public function checkAdmin($email)
	{
		$data = $this->_db->select("SELECT * FROM users WHERE email = :email AND admin = :admin", array(':email' => $email, ':admin' => true));
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

	public function forgotPasswordAction($posted) {
		$count = $this->_db->select("SELECT COUNT(*) FROM sent_emails WHERE email_address = 
			:email_address AND timestamp >= :time", array(':email_address' => $posted['hash'], ':time' => $posted['time_formatted']));
		$exists = self::getUserInfo($posted['email']);

		if (!$exists) {
			Session::add('feedback_negative', "USER DOES NOT EXIST");
			return false;
		}

		if (count($count) < 10) {

			$deactivation_stmt = $this->_db->update("responses", array('active' => 0), array('email_address' => $posted['email']));

      $password_token = Password::rnum(); 
      
      $toBePosted = [];
      $toBePosted['reset_key'] = Password::rnum();
      $toBePosted['secret'] = Password::make($password_token, PASSWORD_BCRYPT, array("cost" => 10));
      $toBePosted['request_timestamp'] = date('Y-m-d H:i:s');
      $toBePosted['request_ip'] = getenv('REMOTE_ADDR');
      $toBePosted['email_address'] = $posted['email'];

      // var_dump($toBePosted);
      $result = $this->_db->insert("responses", $toBePosted);
      $mail_to      = $posted['email'];  
      $mail_subject = 'Forgot password';  
      $mail_body = "Hello, 
        <br><br> 
        you or somebody else requested a password reset for your account at http://skilzmatch.acadiau.ca/. 
        <br><br> 
        To set a new password, please visit this link: 
        <br><br> 
       	http://skilzmatch.acadiau.ca/user/password_reset?reset_key=" . $toBePosted['reset_key'] . "&email=" . $toBePosted['email_address'] . "&password_token=" . $password_token ." 
        <br><br> 
        Do not share this link with anyone, it expires in 30 minutes.  
        <br><br> 
        If the request was not from you, simply ignore this email. Your password will not be changed. 
        <br><br> 
        Do you have further questions? Please contact us at skilzmatch@acadiau.ca. 
        <br><br> 
        Best regards, 
        <br><br> 
        skilzmatch.acadiau.ca";
      $mail = new Mail;
			$mail_sent = $mail->sendMail($mail_to, "www-data@acadiau.ca", "ACCOUNT ", $mail_subject, $mail_body);

			if ($mail_sent == 1) {
				$new_stmt = $this->_db->exec('INSERT INTO sent_emails (email_address, timestamp) VALUES (:email_address, NOW())', array(':email_address' => $posted['hash']) );
				Session::add('feedback_positive', "Mail Sent!");
				return true;
			} else {
				Session::add('feedback_negative', "Mail not sent" . $mail->getError() );
				return false;
			}
			
		}
	}

	public function resetPasswordAction($reset_key, $email_address, $password_token, $password, $user_password_repeat) {
		
		$response = $this->_db->select('SELECT secret, request_timestamp FROM responses 
			WHERE reset_key = :reset_key AND email_address = :email_address 
			AND NOT used AND active', array(':reset_key' => $reset_key, ':email_address' => $email_address));
		
		$validatedPassword = parent::validateUserPassword($password, $user_password_repeat);
		if (!$validatedPassword) {
			Session::add('feedback_negative', "INVALID PASSWORD");
			return false;
		}
		
		if($response){              
			$created = DateTime::createFromFormat('Y-m-d G:i:s', $response[0]->request_timestamp);
			if ( $created >= new DateTime('30 minutes ago') ) { 
				if ( Password::verify($password_token, $response[0]->secret) 
					&& $password == $user_password_repeat) {
					$disable_token = $this->_db->update("responses", array('used' => 1), array('reset_key' => $reset_key));

					$hash = Password::make($password, PASSWORD_BCRYPT, array("cost" => 10));
					$password_change = $this->_db->exec('UPDATE users SET password = :password WHERE email = :email', 
						array(':password' => $hash, ':email' => $email_address));
					return true;
        }
    	}
    } else {
    	Session::add('feedback_negative', "INVALID RESET TOKEN");
			return false;
    }
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