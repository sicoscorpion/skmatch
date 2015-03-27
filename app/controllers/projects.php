<?php

class Projects extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$data['title'] = 'Projects';

		$this->view->rendertemplate('header',$data);
		$this->view->render('projects/index',$data);
		$this->view->rendertemplate('footer',$data);
	}
}