<?php

class People extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$data['title'] = 'People';

		$this->view->rendertemplate('header',$data);
		$this->view->render('people/index',$data);
		$this->view->rendertemplate('footer',$data);
	}
}