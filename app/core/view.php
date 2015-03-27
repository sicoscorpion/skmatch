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
		Self::alertMsg(count($feedback_positive));
		// echo out positive messages
		if (isset($feedback_positive) && count($feedback_positive) > 1) {
		    foreach ($feedback_positive as $feedback) {
		        echo '<div class="feedback success">'.$feedback.'</div>';
		    }
		}

		// echo out negative messages
		if (isset($feedback_negative) && count($feedback_negative) > 1) {
		    foreach ($feedback_negative as $feedback) {
		        echo '<div class="feedback error">'.$feedback.'</div>';
		    }
		}
        // delete these messages (as they are not needed anymore and we want to avoid to show them twice
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
    }
	
}