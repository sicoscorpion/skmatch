<?php

class Registration extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function register(){

		$data['title'] = 'Registration';
		// View::alertMsg("Submit register");
		if(isset($_POST['submit'])) {
			$registration = $this->loadModel('registration_model');

			$registration_success = $registration->registerNewUser(
				$_POST['firstName'],
				$_POST['lastName'],
				$_POST['email'],
				$_POST['password'],
				$_POST['verifyPassword'],
				$_POST['phone'],
				false);

			if($registration_success) {
				url::redirect('user/login');
			} else {
				// url::redirect('user/registration');
			}
		}

		$this->view->rendertemplate('header',$data);
		$this->view->render('user/registration',$data);
		$this->view->rendertemplate('footer',$data);
	}
	
}