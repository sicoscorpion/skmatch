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
				$msg = "Invalid login";
				View::alertMsg($msg);
				// die('wrong username or password');
			} else {
				Session::set('logedIn',true);
				Url::redirect('user');
			}

		}

		$data['title'] = 'Login';

		$this->view->rendertemplate('header',$data);
		$this->view->render('user/login',$data);
		$this->view->rendertemplate('footer',$data);	
	}

	public function logout(){

		Session::destroy();
		Url::redirect('user');

	}
}
