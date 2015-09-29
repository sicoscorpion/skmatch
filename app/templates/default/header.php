<!DOCTYPE html>

<html class="no-js" lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <?php
    // //set headers to NOT cache a page
    // header("Cache-Control: cache, must-revalidate"); //HTTP 1.1
    // header("Pragma: cache"); //HTTP 1.0
    // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    // //or, if you DO want a file to cache, use:
    // header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

  ?>
	<title><?php echo $data['title'] ?></title>
	<link href="<?php echo url::get_template_path();?>css/app.css" rel="stylesheet">
	<link href="<?php echo url::get_template_path();?>css/foundation.css" rel="stylesheet">
  <link href="<?php echo url::get_template_path();?>images/foundation-icons/foundation-icons.css" rel="stylesheet">
	<script src="<?php echo url::get_template_path();?>javascript/vendor/modernizr.js"></script>
</head>
<body>
  <script type="text/javascript">
    var checkContents = setInterval(function(){
      if ($("div.alert-box").length > 0){ 
        $("div.alert-box").remove();
      }
    },3000);
  </script>

<div class="sticky">
<nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
  <ul class="title-area">
    <li class="name">
      <h1><a href="/">SKILZMATCH</a></h1>
    </li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"> 
        <?php if($_SESSION['LogedIn'] && isset($_SESSION['admin'])) {
          echo '<a href="/user/admin" >ADMIN</a>';
          echo '<li class="divider"></li>';
        } else {
          $status = "";
          $link = "";
        }
        ?>
      
      </li>
      <li class="active"> 
        <?php if($_SESSION['LogedIn']) {
          echo '<a href="/projects/manage" >MANAGE PROJECTS</a>';
          echo '<li class="divider"></li>';
        } else {
          $status = "";
          $link = "";
        }
        ?>
      
      </li>
      <li class="active"> 
      	<?php if($_SESSION['LogedIn']) {
	    		$status = "PROFILE";
	    		$link = "/user/profile";
	    	} else {
	    		$status = "REGISTER";
	    		$link = "/user/registration";
	    	}
	    	?>
    	<a href="<?php echo $link; ?>"><?php echo $status; ?></a>
      </li>

      <li class="divider"></li>

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

    <ul class="left">
      <li class="active"><a href="/projects/index">PROJECTS</a></li>
      <li class="divider"></li>
      <li class="active"><a href="/people/index">PEOPLE</a></li>
      <li class="divider"></li>
      <li class="active"><a href="/contact">CONTACT US</a></li>
    </ul>

  </section>
</nav>
</div>
<div id='wrapper'>
