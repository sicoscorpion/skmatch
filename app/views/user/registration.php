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
	        <input type='text' name='firstName' placeholder="First" required/>
	      </label>
	    </div>
	    <div class="large-6 columns">
	      <label>
	        <input type='text' name='lastName' placeholder="Last" required/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='email' name='email' placeholder="Email" required/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='text' name='phone' placeholder="Phone" required/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='password' name='password' placeholder="Password" required/>
	      </label>
	    </div>
	  </div>
	  <div class="row">
	    <div class="large-12 columns">
	      <label>
	        <input type='password' name='verifyPassword' placeholder="Verify Password" required/>
	      </label>
	    </div>
	  </div>
	  <div style="display: none">
            If you can read this, don't touch the following text field.<br>
            <input type="text" name="Country" value="banana"><br>
          </div>

	  <div class="row">
	  	<div class="large-4 columns">
	  		<input class="button" type='submit' name='submit' value='Register'>
	  	</div>
	  </div>

		</form>
	</div>
</div>
