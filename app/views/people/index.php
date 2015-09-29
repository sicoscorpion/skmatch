<div class="row" id="content-divider-large"></div>
<div class="row">
  <div class="large-8 large-centered columns">
	  <h1 style="font-variant: small-caps;">People Looking For Projects</h1>
  </div>
</div>
<div class="row" id="content-block">
	<p>
	If your are a person looking for engagement in a project either for Income or Fun then please provide the following information:
Persons name, Desired Position Title, Interests, Knowledge and Experience, Reward: Income or Fun, Start date (YY-M-DD). 
All contact via SkilzMatch is via the registered email address, all no other contact information will be removed.
Your submission must be read and approved by our moderator before being posted for others to see. 
Submissions that are rejected will be returned to the user with an indication of the problem.  
	</p>
</div>
<div class="row" id="content-divider-large"></div>

<div class="row" id="content-block-glass">
	<div class="row" id="content-divider-large"></div>
		<div class="large-14 columns" >
		<?php 
			if (count($data['people']) == 0) {
				echo '<p style="color: white;">NOTHNG THERE</p>';
			}
		?>
		<ul class="accordion" data-accordion>
	<?php 

		$people = $data['people'];
		foreach ($people as $person) {
			echo '<input name="id" type="hidden" value='.$person->ID.' />';
			echo '<li class="accordion-navigation" style="font-size: 8px;">';
			echo '<a id="manageBoxTitle" href="#panel'.$person->ID.'">'.$person->headline.'<br/>';
			echo '<em style="font-size: 12px;"><b>Created On: </b>'.date('l jS \of F Y h:i:s A', $person->people_creation_timestamp).' ';
			$newTime = $person->people_creation_timestamp + 4838400;
			echo '<b>Expires on: </b></i>'.date('l jS \of F Y h:i:s A', $newTime).'</em></a>';
			echo '<div id="panel'.$person->ID.'" class="content">';
			echo '<p style="margin-bottom:0 !important"><b>PEOPLE DESCRIPTION: </b><br />';
			echo '<span style="font-size:14px;">'.$person->description.'</span><br/>';
			if ($data['user']) {
					echo '<a class="button tiny" style="font-size:14px;" href="mailto:'.$person->email.'">Contact Person</a>';
			} else {
					echo '<a class="button tiny" style="font-size:14px;" href="/user/login">Login to contact</a>';
			}
			// echo '<a class="button tiny" href="mailto:'.$person->email.'">Contact Person</a>';
			// echo '<div class="row">';
			// echo '<div class="small-8 columns" id="dateBox">';
			// 	echo '<p style="font-size: 12px;"><b>Created On: </b>'.date('l jS \of F Y h:i:s A', $person->people_creation_timestamp).'';
			// 	$newTime = $person->people_creation_timestamp + 4838400;
			// 	echo '<b>Expires on: </b></i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			// echo '</div>';
			// if ($data['user']) {
			// 	echo '<div class="small-4 columns end">';
			// 		echo '<a class="button small" href="mailto:'.$person->email.'">Contact Person</a>';
			// 	echo '</div>';
			// } else {
			// 	echo '<div class="small-4 columns end">';
			// 		echo '<a class="button tiny" href="/user/login">Login to contact</a>';
			// 	echo '</div>';
			// }
			// echo '</div>';
			// echo '<div class="row">';
			// echo '<div class="small-8 columns" id="dateBox">';
			// 	$newTime = $person->people_creation_timestamp + 4838400;
			// 	echo '<p>Expires on: </i>'.date('l jS \of F Y h:i:s A', $newTime).'</p>';
			// echo '</div>';
			
			// echo '</div>';
			echo '</p></div><div class="row" style="height:10px;" id="content-divider-large"></div></li>';
		}
	?>
	</ul>
	</div>