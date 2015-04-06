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

		// Belongs to user model
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
			$toBeupdated['firstName'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
			$toBeupdated['lastName'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
			$toBeupdated['phone'] = preg_replace('/[^0-9]/', '', $_POST['phone']);
			$toBeupdated['email'] = Session::get('user_email');
			$updated = $user->updateUserInfo($toBeupdated);

			if ($updated) {
				Session::add('feedback_positive', "Updated");
				url::redirect('user/profile');
			}
		}
		// end

		// Belongs to people model
		$people = $this->loadModel('people_model');
		$peopleListing = $people->viewOwnPeople(Session::get('user_email'));
		
		$data['headline'] = $peopleListing[0]->headline;
		$data['description'] = $peopleListing[0]->description;
		$data['approved'] = $peopleListing[0]->approved;

		if(isset($_POST['updatePeople'])){
			$newPeople = [];

			$newPeople['headline'] = filter_var($_POST['headline'], FILTER_SANITIZE_STRING);
			$newPeople['description'] = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
			if ($_POST['listYourself'])
				$newPeople['approved'] = true;
			else
				$newPeople['approved'] = false;

			var_dump($_POST['listYourself']);
			if ($peopleListing[0]->email) {
				$newPeople['id'] = $peopleListing[0]->ID;
				$people->updatePeopleById($newPeople);
			} else {
				$newPeople['email'] = Session::get('user_email');
				$people->addNewPeople($newPeople);
			}

			
			if ($people) {
				Session::add('feedback_positive', " - PENDING APPROVAL");
				url::redirect('user/profile');
			}
		}


		//end

		$this->view->rendertemplate('header',$data);
		$this->view->render('user/profile',$data);
		$this->view->rendertemplate('footer',$data);
	}

	public function logout(){

		Session::destroy();
		Url::redirect('user');

	}
}
