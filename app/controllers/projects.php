<?php

class Projects extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {

		$data['title'] = 'Projects';

		if(Session::get('logedIn') == false){
			$projects = $this->loadModel('projects_model');
			$data['user'] = false;
			$data['projects'] = $projects->viewPublicProjects();
		} 
		if(Session::get('logedIn') == true){
			$projects = $this->loadModel('projects_model');
			$data['user'] = true;
			$data['projects'] = $projects->viewPublicProjectsForUsers(Session::get('user_email'));
		}
		

		$this->view->rendertemplate('header',$data);
		$this->view->render('projects/index',$data);
		$this->view->rendertemplate('footer',$data);
	}

	public function manageProjects() {

		if(Session::get('logedIn') == false){
			url::redirect('user/login');
		}

		$projects = $this->loadModel('projects_model');
		$userProjects = $projects->viewOwnProjects(Session::get('user_email'));

		$data['projectsReturned'] = $userProjects;

		if(isset($_POST['addProject'])){ 
			$newProject = [];

			$newProject['projectTitle'] = filter_var($_POST['projectTitle'], FILTER_SANITIZE_STRING);
			$newProject['description'] = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
			$newProject['email'] = Session::get('user_email');

			$projects->addNewProject($newProject);
			if ($projects) {
				Session::add('feedback_positive', "PROJECT ADDED - PENDING APPROVAL");
				url::redirect('projects/manage');
			}
		}
		// View::alertMsg($_POST['id']);
		if(isset($_POST['removeProject'])){
			$toBeDeleted = [];

			$toBeDeleted['id'] = $_POST['id'];
			$result = $projects->deleteProjectById($toBeDeleted);
			if ($result) {
				View::alertMsg("Deleted");
				Session::add('feedback_positive', "PROJECT DELETED");
				url::redirect('projects/manage');
			}
		} 
		// View::alertMsg("Updated");
		if(isset($_POST['editProject'])){
			$currentProject = [];

			$currentProject['id'] = $_POST['id'];	
			$currentProject['title'] = filter_var($_POST['newProjectTitle'], FILTER_SANITIZE_STRING);
			$currentProject['description'] = filter_var($_POST['newDescription'], FILTER_SANITIZE_STRING);

			$result = $projects->updateProjectById($currentProject);
			
			if ($result) {
				View::alertMsg("Updated");
				Session::add('feedback_positive', "PROJECT UPDATED");
				url::redirect('projects/manage');
			}	
		}

		$this->view->rendertemplate('header',$data);
		$this->view->render('projects/manage',$data);
		$this->view->rendertemplate('footer',$data);
	}
}