
<?php $this->renderFeedbackMessages(); ?>
<div class="row" id="content-divider-large"></div>
<div class="row">
  <div class="large-8 large-centered columns">
	  <h1 style="font-variant: small-caps;">Projects Needing Approval</h1>
  </div>
</div>
<div class="row" id="content-divider-large"></div>


<div class="row" id="content-block-glass">
	<div class="row" id="content-divider-large"></div>
		<div class="large-12 columns" >
		<?php 
			if (count($data['projectsForAdmin']) == 0) {
				echo '<p>NOTHNG THERE</p>';
			}
		?>
		<ul class="accordion" data-accordion>
	<?php 

		$projects = $data['projectsForAdmin'];
		foreach ($projects as $project) {
			echo '<li class="accordion-navigation">';
			echo '<a id="manageBoxTitle" href="#panelProject'.$project->ID.'">'.$project->title.'</a>';
			echo '<div id="panelProject'.$project->ID.'" class="content">';
			echo '<form action="" method="post" >';
			echo '<input name="id" type="hidden" value='.$project->ID.' />';
			echo '<p><b>PROJECT DESCRIPTION: </b></p>';
			echo '<p>'.$project->description.'</p>';

			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				echo '<p>Created On: '.date('l jS \of F Y h:i:s A', $project->project_creation_timestamp).'<br />';
			echo '</div>';
			echo '<div class="small-4 columns end">';
				echo '<a class="button small" href="mailto:'.$project->email.'">Contact Person</a>';				
			echo '</div>';
			
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				$newTime = $project->project_creation_timestamp + 4838400;
				echo 'Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			echo '</div>';
			echo '<div class="small-2 columns end">';
				echo '<input class="button small" type="submit" name="approveProject" value="Approve" onclick="return confirm(\'Are you sure?\');"/>';							
			echo '</div>';
			echo '<div class="small-2 columns end">';
				echo '<input class="button small" type="submit" name="deleteProject" value="Delete" onclick="return confirm(\'Are you sure?\');"/>';							
			echo '</div>';
			echo '</div>';
			echo '</div><div class="row" id="content-divider-large"></div></li></form>';
		}
	?>
	</ul>
	</div>
</div>

<div class="row" id="content-divider-large"></div>
<div class="row">
  <div class="large-8 large-centered columns">
	  <h1 style="font-variant: small-caps;">People Needing Approval</h1>
  </div>
</div>
<div class="row" id="content-divider-large"></div>


<div class="row" id="content-block-glass">
	<div class="row" id="content-divider-large"></div>
		<div class="large-12 columns" >
		<?php 
			if (count($data['peopleForAdmin']) == 0) {
				echo '<p>NOTHNG THERE</p>';
			}
		?>
		<ul class="accordion" data-accordion>
	<?php 

		$people = $data['peopleForAdmin'];
		foreach ($people as $person) {
			echo '<li class="accordion-navigation">';
			echo '<a id="manageBoxTitle" href="#panelPerson'.$person->ID.'">'.$person->headline.'</a>';
			echo '<div id="panelPerson'.$person->ID.'" class="content">';
			echo '<form action="" method="post" >';
			echo '<input name="id" type="hidden" value='.$person->ID.' />';
			echo '<p><b>PERSON DESCRIPTION: </b></p>';
			echo '<p>'.$person->description.'</p>';

			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				echo '<p>Created On: '.date('l jS \of F Y h:i:s A', $person->person_creation_timestamp).'<br />';
			echo '</div>';
			echo '<div class="small-4 columns end">';
				echo '<a class="button small" href="mailto:'.$person->email.'">Contact Person</a>';				
			echo '</div>';
			
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				$newTime = $person->person_creation_timestamp + 4838400;
				echo 'Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			echo '</div>';
			echo '<div class="small-2 columns end">';
				echo '<input class="button small" type="submit" name="approvePerson" value="Approve" onclick="return confirm(\'Are you sure?\');"/>';							
			echo '</div>';
			echo '<div class="small-2 columns end">';
				echo '<input class="button small" type="submit" name="deletePerson" value="Delete" onclick="return confirm(\'Are you sure?\');"/>';							
			echo '</div>';
			echo '</div>';
			echo '</div><div class="row" id="content-divider-large"></div></li></form>';
		}
	?>
	</ul>
	</div>
</div>