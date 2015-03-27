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

	public function show($request = null){

		// $data['title'] = 'Welcome';

		$this->view->rendertemplate('header',$data);
		$this->view->render('home/show',$data);
		$this->view->rendertemplate('footer',$data);
	}
	
}