<div class="row" id="content-divider-large"></div>
<div class="row">
  <div class="large-8 large-centered columns">
	  <h1 style="font-variant: small-caps;">Projects Looking For People</h1>
  </div>
</div>
<div class="row" id="content-block">
	<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</div>
<div class="row" id="content-divider-large"></div>


<div class="row" id="content-block-glass">
	<div class="row" id="content-divider-large"></div>
		<div class="large-12 columns" >
		<?php 
			if (count($data['projects']) == 0) {
				echo '<p>NOTHNG THERE</p>';
			}
		?>
		<ul class="accordion" data-accordion>
	<?php 

		$projects = $data['projects'];
		foreach ($projects as $project) {
			echo '<input name="id" type="hidden" value='.$project->ID.' />';
			echo '<li class="accordion-navigation">';
			echo '<a id="manageBoxTitle" href="#panel'.$project->ID.'">'.$project->title.'</a>';
			echo '<div id="panel'.$project->ID.'" class="content">';
			echo '<p><b>PROJECT DESCRIPTION: </b></p>';
			echo '<p>'.$project->description.'</p>';

			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				echo '<p>Created On: '.date('l jS \of F Y h:i:s A', $project->project_creation_timestamp).'<br />';
			echo '</div>';
			if ($data['user']) {
				echo '<div class="small-4 columns end">';
					echo '<a class="button small" href="mailto:'.$project->email.'">Contact Person</a>';
				echo '</div>';
			} else {
				echo '<div class="small-4 columns end">';
					echo '<a class="button small" href="/user/login">Login to contact</a>';
				echo '</div>';
			}
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				$newTime = $project->project_creation_timestamp + 4838400;
				echo 'Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			echo '</div>';
			
			echo '</div>';
			echo '</div><div class="row" id="content-divider-large"></div></li>';
		}
	?>
	</ul>
	</div>