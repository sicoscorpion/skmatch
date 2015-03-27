<?php

class View {

	public function alertMsg($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	public function render($path,$data = false, $error = false){
		require "app/views/$path.php";
	}

	public function rendertemplate($path,$data = false){
		require "app/templates/".Session::get('template')."/$path.php";
	}

	public function renderFeedbackMessages()
    {
        // echo out the feedback messages (errors and success messages etc.),
        // they are in $_SESSION["feedback_positive"] and $_SESSION["feedback_negative"]
        // require Config::get('PATH_VIEW') . '_templates/feedback.php';
		$feedback_positive = Session::get('feedback_positive');
		$feedback_negative = Session::get('feedback_negative');

		// echo out positive messages
		if (isset($feedback_positive) && count($feedback_positive) > 1) {
		    foreach ($feedback_positive as $feedback) {
		        echo '<div data-alert class="alert-box success " class="feedback success">'.$feedback.' <a href="#" class="close">&times;</a></div>';
		    }
		} else {
			if (($feedback_positive) != "")
				echo '<div data-alert class="alert-box success " class="feedback success">'.$feedback_positive[0].'<a href="#" class="close">&times;</a></div>';
		}

		// echo out negative messages
		if (isset($feedback_negative) && count($feedback_negative) > 1) {
		    foreach ($feedback_negative as $feedback) {
		        echo '<div data-alert class="alert-box alert " class="feedback error">'.$feedback.'<a href="#" class="close">&times;</a></div>';
		    }
		} else {
			if (($feedback_negative) != "")
				echo '<div data-alert class="alert-box alert " class="feedback error">'.$feedback_negative[0].'<a href="#" class="close">&times;</a></div>';
		}
        // delete these messages (as they are not needed anymore and we want to avoid to show them twice
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);

    }
	
}