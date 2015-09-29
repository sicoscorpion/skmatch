
<?php $this->renderFeedbackMessages(); ?>
<div class="row">
  <div class="small-5 small-centered columns">
	  <h1 style="font-variant: small-caps;">Manage projects</h1>
  </div>
</div>


<div class="row">

	<div class="small-12 small-centered columns" id="content-block">
		<form action="" method="post" >
		<div class="row">
	    <div class="large-12 columns">
			<p style="font-size: 24px; font-variant: small-caps; font-weight: bold;">Add a Project</p>
		</div>
	</div>

		<div class="row">
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='projectTitle' placeholder="Project Title" required/>
	      </label>
	    </div>
    </div>
    <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <textarea rows='10' name='description' placeholder="Add Project Description Here" required></textarea>
	      </label>
	    </div>
	  </div>

	  <div class="row">
	  	<div class="large-4 columns">
	  		<input class="button" type='submit' name='addProject' value='Add Project' onclick="return confirm('Are you sure you would like to submit the project? Project will be listed for 8 weeks after approval.');">
	  	</div>
	  </div>

		</form>
	</div>
</div>



<div class="row" id="content-divider-large" > </div>

<?php 

	$projects = $data['projectsReturned'];
	foreach ($projects as $project) {
		echo '<form action="" method="post" ><div class="row">';
		echo '<input name="id" type="hidden" value='.$project->ID.' />';
		echo '<div class="panel callout radius">';
		echo '<p id="manageBoxTitle">'.$project->title.'</p>';
		echo '<p>'.$project->description.'</p>';
		echo '<p>Created On: '.date('l jS \of F Y h:i:s A', $project->project_creation_timestamp).'<br />';
		$newTime = $project->project_creation_timestamp + 4838400;
		echo 'Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
		echo '<input class="button small" type="submit" name="removeProject" value="Remove Project" onclick="return confirm(\'Are you sure?\');"/>';
		echo '<span>   </span><a data-reveal-id="editProjectForm'.$project->ID.'" class="button small" >Edit Projects</a>';
		echo '</div></div></form>';
?>
		<div id='editProjectForm<?php echo "$project->ID" ?>' class="reveal-modal" data-reveal aria-labelledby="EditProject" aria-hidden="true" role="dialog">
		<form action="" method="post">
			<input name="id" type="hidden" value='<?php echo $project->ID ?>' />
			<div class="row">
		    <div class="large-6 columns">
		      <label>
		        <input type='text' name='newProjectTitle' value="<?php echo $project->title; ?>" required/>
		      </label>
		    </div>
	    </div>
	    <div class="row">
		    <div class="large-12 columns">
		      <label>
		        <textarea rows='10' name='newDescription' required><?php echo $project->description; ?></textarea>
		      </label>
		    </div>
	 		</div>
	 		<input class="button small" type="submit" name="editProject" value="Edit Project" onclick="return confirm('Updating your project will remove it from the public page until it is reapproved...  Are you sure?');"/>
		</form>
		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
	
<?php
		
	}
?>

