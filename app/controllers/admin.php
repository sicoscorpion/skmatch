<?php

class Admin extends Controller {

	public function __construct(){
		parent::__construct();
	}	
	public function manage(){

		if(Session::get('admin') == false){
			url::redirect('user');
		}

		$people = $this->loadModel('people_model');
		$projects = $this->loadModel('projects_model');
		$data['user'] = true;

		$data['projectsForAdmin'] = $projects->viewProjectsForAdmin();

		if(isset($_POST['approveProject'])){
			$currentProject = [];
			$currentProject['id'] = $_POST['id'];
			$currentProject['email'] = $_POST['email'];
			$currentProject['title'] = $_POST['title'];

			$result = $projects->updateProjectByAdmin($currentProject);
			
			if ($result) {
				Session::add('feedback_positive', "PROJECT APPROVED");
				url::redirect('user/admin');
			}	
		}

		if(isset($_POST['deleteProject'])){
			$currentProject = [];
			$currentProject['id'] = $_POST['id'];

			$result = $projects->deleteProjectById($currentProject);
			
			if ($result) {
				Session::add('feedback_positive', "PROJECT DELETED");
				url::redirect('user/admin');
			}	
		}

		$data['peopleForAdmin'] = $people->viewPeopleForAdmin();

		if(isset($_POST['approvePerson'])){
			$currentPerson = [];
			$currentPerson['id'] = $_POST['id'];
			$currentPerson['email'] = $_POST['email'];
			$currentPerson['headline'] = $_POST['headline'];

			$result = $people->updatePeopleByAdmin($currentPerson);
			
			if ($result) {
				Session::add('feedback_positive', "PERSON APPROVED");
				url::redirect('user/admin');
			}	
		}

		if(isset($_POST['deletePerson'])){
			$currentPerson = [];
			$currentPerson['id'] = $_POST['id'];

			$result = $people->deletePeopleById($currentPerson);
			
			if ($result) {
				Session::add('feedback_positive', "PROJECT DELETED");
				url::redirect('user/admin');
			}	
		}


		$this->view->rendertemplate('header',$data);
		$this->view->render('user/admin',$data);
		$this->view->rendertemplate('footer',$data);
	}
}
