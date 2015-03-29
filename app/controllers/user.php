<?php

class User extends Controller {

	public function __construct(){
		parent::__construct();
	}	

	public function user() {

		if(Session::get('logedIn') == false){
			url::redirect('user/login');
		}

		$data['title'] = 'Admin';

		$this->view->rendertemplate('header',$data);
		$this->view->render('main/index',$data);
		$this->view->rendertemplate('footer',$data);	
	}

	public function login(){

		if(Session::get('logedIn') == true){
			url::redirect('user');
		}

		if(isset($_POST['submit'])){

			$email = $_POST['email'];
			$password = $_POST['password'];

			$user = $this->loadModel('user_model');

			if(Password::verify($password, $user->get_hash($email)) == false) {
				Session::add('feedback_negative', "Invalid Email or Password");
			} else {
				Session::init();
				Session::set('logedIn',true);
				Session::set('user_email', $email);

				Url::redirect('user');
			}

		}

		$data['title'] = 'Login';

		$this->view->rendertemplate('header',$data);
		$this->view->render('user/login',$data);
		$this->view->rendertemplate('footer',$data);	
	}

	public function profile() {

		if(Session::get('logedIn') == false){
			url::redirect('user/login');
		}

		$data['user_email'] = Session::get('user_email');
		$data['title'] = 'Profile';

		$user = $this->loadModel('user_model');
		$info = $user->getUserInfo(Session::get('user_email'));

		$data['firstName'] = $info[0]->firstName;
		$data['lastName'] = $info[0]->lastName;
		$data['phone'] = $info[0]->phone;

		if(isset($_POST['updateProfile'])){ 
			$toBeupdated = [];

			if ($_POST['password'] != "") {
				$toBeupdated['password'] = $_POST['password'];
				$toBeupdated['verifyPassword'] = $_POST['verifyPassword'];
			}
			$toBeupdated['firstName'] = $_POST['firstName'];
			$toBeupdated['lastName'] = $_POST['lastName'];
			$toBeupdated['phone'] = $_POST['phone'];
			$toBeupdated['email'] = Session::get('user_email');
			$updated = $user->updateUserInfo($toBeupdated);

			if ($updated) {
				Session::add('feedback_positive', "Updated");
				url::redirect('user/profile');
			}
		}

		$this->view->rendertemplate('header',$data);
		$this->view->render('user/profile',$data);
		$this->view->rendertemplate('footer',$data);
	}

	public function logout(){

		Session::destroy();
		Url::redirect('user');

	}
}
