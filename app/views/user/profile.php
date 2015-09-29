
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
	        <input type='text' name='firstName' placeholder="First" value="<?php echo $data['firstName'] ?>" required/>
	      </label>
	    </div>
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='lastName' placeholder="Last" value="<?php echo $data['lastName'] ?>" required/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='text' name='phone' placeholder="Phone" value="<?php echo $data['phone'] ?>" required/>
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
	        <input type='text' name='headline' placeholder="Your Headline" value="<?php echo $data['headline'] ?>" required/>
	      </label>
	    </div>
	    <div class="large-6 columns">
	      <input id="listYourself" name="listYourself" type="checkbox" value="selected" <?php if($data['listed']) echo "checked";?> ><label id="listYourself" for="listYourself">List yourself</label>
	    </div>
    </div>
    <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <textarea rows='10' name='description' placeholder="Description about your skillz" required><?php echo $data['description']; ?></textarea>
	      </label>
	    </div>
	  </div>

	  <div class="row">
	  	<div class="large-4 columns">
	  		<input class="button" type='submit' name='updatePeople' value='Update' onclick="return confirm('Updating your information will remove your approved listing until it gets reapproved... Are you sure?');">
	  	</div>
	  </div>

		</form>
	</div>
</div>
	</div>
</div>

