<?php

class Registration extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function register(){

		$data['title'] = 'Registration';
		// View::alertMsg("Submit register");
		if(isset($_POST['submit']) && $_POST['Country'] == "banana" ) {
			$registration = $this->loadModel('registration_model');

			$registration_success = $registration->registerNewUser(
				filter_var($_POST['firstName'], FILTER_SANITIZE_STRING),
				filter_var($_POST['lastName'], FILTER_SANITIZE_STRING),
				$_POST['email'],
				$_POST['password'],
				$_POST['verifyPassword'],
				preg_replace('/[^0-9]/', '', $_POST['phone']),
				false);

			if($registration_success) {
				$user = $this->loadModel('user_model');
				Session::init();
				Session::set('logedIn',true);
				Session::set('user_email', $_POST['email']);
				if(count($user->checkAdmin($_POST['email'])) == 1) {
					// Session::add('feedback_positive', "IAM A KINGSSSSSSSSSSSSSSS");
					Session::set('admin', true);
				}
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