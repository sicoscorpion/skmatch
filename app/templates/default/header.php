<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'] ?></title>
	<link href="<?php echo url::get_template_path();?>css/app.css" rel="stylesheet">
	<link href="<?php echo url::get_template_path();?>css/foundation.css" rel="stylesheet">
	<script src="<?php echo url::get_template_path();?>javascript/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
    <h1><a href="/">SKILZMATCH</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"> 
      	<?php if($_SESSION['LogedIn']) {
	    		$status = "";
	    		$link = "";
	    	} else {
	    		$status = "REGISTER";
	    		$link = "/user/registration";
	    	}
	    	?>
    	<a href="<?php echo $link; ?>"><?php echo $status; ?></a>
    </li>
    <li class="divider"></li>
    <ul class="right">
      <li class="active"> 
      	<?php if($_SESSION['LogedIn']) {
	    		$status = "LOGOUT";
	    		$link = "/user/logout";
	    	} else {
	    		$status = "LOGIN";
	    		$link = "/user/login";
	    	}
	    	?>
    	<a href="<?php echo $link; ?>"><?php echo $status; ?></a>
    </li>
      
    </ul>

    <!-- Left Nav Section -->
   <!--  <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>
<!-- <div id='wrapper'> -->
