
  <?php $this->renderFeedbackMessages(); ?>
<script type="text/javascript">
	var checkContents = setInterval(function(){
	  if ($("div.alert-box").length > 0){ 
	  	$("div.alert-box").remove();
	  }
	},5000);
</script>
<div class="row" id="content-divider-large" > </div>
<div class="row">
	<div class="small-4 small-centered columns" id="content-block">
		<form action="" method="post">
		<div class="row">
	    <div class="large-12 columns">
		    <h4 id="title">Hello <?php echo $data['firstName'];?></h4>
			<p><b>Update Personal Information</b></p>
			
			
		</div>
		</div>
		<div class="row">
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='firstName' placeholder="First" value="<?php echo $data['firstName'] ?>"/>
	      </label>
	    </div>
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='lastName' placeholder="Last" value="<?php echo $data['lastName'] ?>"/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='text' name='phone' placeholder="Phone" value="<?php echo $data['phone'] ?>"/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='password' name='password' placeholder="Password" />
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='password' name='verifyPassword' placeholder="Verify Password" />
	      </label>
	    </div>
	  </div>


	  <div class="row">
	  	<div class="large-4 columns">
	  		<input class="button" type='submit' name='updateProfile' value='Update'>
	  	</div>
	  </div>

		</form>
	</div>
</div>


<div class="row" id="content-divider-large" > </div>

<?php 
$this->renderFeedbackMessages();
	$projects = $data['projectsReturned'];
	foreach ($projects as $project) {
		echo '<form action="" method="post"><div class="row">';
		echo '<input name="id" type="hidden" value='.$project->ID.' />';
		echo '<div class="panel callout radius">';
		echo '<h4>'.$project->title.'</h4>';
		echo '<p>'.$project->description.'</p>';
		echo '<p>'.date('l jS \of F Y h:i:s A', $project->project_creation_timestamp);
		$newTime = $project->project_creation_timestamp + 4838400;
		echo '<i style="text-align: right"> Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
		echo '<input class="button" type="submit" name="removeProject" value="Remove Project">';
		echo '</div></div></form>';
	}
?>


<div class="row">

	<div class="small-12 small-centered columns" id="content-block">
		<form action="" method="post">
		<div class="row">
	    <div class="large-12 columns">
			<p><b>Add a Project</b></p>
			<?php $this->renderFeedbackMessages(); ?>
		</div>
	</div>

		<div class="row">
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='projectTitle' placeholder="Project Title" />
	      </label>
	    </div>
    </div>
    <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <textarea rows='10' name='description' placeholder="Add Project Description Here"></textarea>
	      </label>
	    </div>
	  </div>

	  <div class="row">
	  	<div class="large-4 columns">
	  		<input class="button" type='submit' name='addProject' value='Add Project'>
	  	</div>
	  </div>

		</form>
	</div>
</div>