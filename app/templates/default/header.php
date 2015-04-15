<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
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
    },5000);
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
      <li class="active"><a href="/main/index">PROJECTS AND PEOPLE</a></li>
    </ul>

  </section>
</nav>
</div>
<div id='wrapper'>
