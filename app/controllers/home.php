<?php

class Home extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($request = null){

		$data['title'] = 'Welcome';
		// $hs = Password::make("user@example.com", PASSWORD_BCRYPT, array("cost" => 10));
		// $data['hash'] = $hs;
		

		$this->view->rendertemplate('header',$data);
		$this->view->render('home/home',$data);
		$this->view->rendertemplate('footer',$data);
	}
	public function contact(){

		$data['title'] = 'Welcome';
		// $hs = Password::make("user@example.com", PASSWORD_BCRYPT, array("cost" => 10));
		// $data['hash'] = $hs;
		

		$this->view->rendertemplate('header',$data);
		$this->view->render('/home/contact',$data);
		$this->view->rendertemplate('footer',$data);
	}
}