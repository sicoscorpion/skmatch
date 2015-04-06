<?php

class People extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$data['title'] = 'People';
		if(Session::get('logedIn') == false){
			$people = $this->loadModel('people_model');
			$data['user'] = false;
			$data['people'] = $people->viewPublicPeople();
		} 
		if(Session::get('logedIn') == true){
			$people = $this->loadModel('people_model');
			$data['user'] = true;
			$data['people'] = $people->viewPublicPeopleForUsers(Session::get('user_email'));
		}

		$this->view->rendertemplate('header',$data);
		$this->view->render('people/index',$data);
		$this->view->rendertemplate('footer',$data);
	}
	
}