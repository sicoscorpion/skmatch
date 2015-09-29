<?php

class Main extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$data['title'] = 'Main';

		$this->view->rendertemplate('header',$data);
		$this->view->render('home/home',$data);
		$this->view->rendertemplate('footer',$data);
	}
}