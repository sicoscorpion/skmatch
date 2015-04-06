<div class="row" id="content-divider-large"></div>
<div class="row">
  <div class="large-8 large-centered columns">
	  <h1 style="font-variant: small-caps;">People Looking For Projects</h1>
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
			if (count($data['people']) == 0) {
				echo '<p>NOTHNG THERE</p>';
			}
		?>
		<ul class="accordion" data-accordion>
	<?php 

		$people = $data['people'];
		foreach ($people as $person) {
			echo '<input name="id" type="hidden" value='.$person->ID.' />';
			echo '<li class="accordion-navigation">';
			echo '<a id="manageBoxTitle" href="#panel'.$person->ID.'">'.$person->headline.'</a>';
			echo '<div id="panel'.$person->ID.'" class="content">';
			echo '<p><b>PEOPLE DESCRIPTION: </b></p>';
			echo '<p>'.$person->description.'</p>';

			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				echo '<p>Created On: '.date('l jS \of F Y h:i:s A', $person->people_creation_timestamp).'<br />';
			echo '</div>';
			if ($data['user']) {
				echo '<div class="small-4 columns end">';
					echo '<a class="button small" href="mailto:'.$person->email.'">Contact Person</a>';
				echo '</div>';
			} else {
				echo '<div class="small-4 columns end">';
					echo '<a class="button small" href="/user/login">Login to contact</a>';
				echo '</div>';
			}
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="small-8 columns" id="dateBox">';
				$newTime = $person->people_creation_timestamp + 4838400;
				echo 'Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			echo '</div>';
			
			echo '</div>';
			echo '</div><div class="row" id="content-divider-large"></div></li>';
		}
	?>
	</ul>
	</div>