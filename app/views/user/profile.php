
  <?php $this->renderFeedbackMessages(); ?>

<div class="row" id="content-divider-large" > </div>
<div class="row">
	<div class="small-4 columns" id="content-block">
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
	<div class="small-7 columns" id="content-block-glass">
		<div class="row">

	<div class="small-12 small-centered columns" id="content-block">
		<form action="" method="post">
		<div class="row">
	    <div class="large-12 columns">
			<h4 id="title">People looking for projects</h4>
			<p><b>List Yourself</b></p>
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
	</div>
</div>

