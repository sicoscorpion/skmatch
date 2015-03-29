<div class="row" id="content-divider-large" > </div>
<div class="row">
	<div class="small-4 small-centered columns" id="content-block">
		<form action="" method="post">
		<div class="row">
	    <div class="large-12 columns">
				<p id="manageBoxTitle">Register</p>
				<?php $this->renderFeedbackMessages(); ?>
			</div>
		</div>
		<div class="row">
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='firstName' placeholder="First" />
	      </label>
	    </div>
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='lastName' placeholder="Last" />
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='email' name='email' placeholder="Email" />
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='text' name='phone' placeholder="Phone" />
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
	  		<input class="button" type='submit' name='submit' value='Register'>
	  	</div>
	  </div>

		</form>
	</div>
</div>
