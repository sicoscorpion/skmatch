<?php $this->renderFeedbackMessages(); ?>
<div class="row" id="content-divider-large"></div>
<div class="small-12 row" id="content-block-glass">
<div class="row" id="content-divider-large"></div>
    <form action="" method="post"> 
      <div class="small-10 column">
          <input type="password" name="password" value=""  placeholder="New password" class="[tip-bottom] [radius round] has-tip" />      
          <input type="hidden" name="reset_key" value="<?php echo $data['reset_key'] ?>" />  
          <input type="hidden" name="email_address" value="<?php echo $data['email_address'] ?>" />  
          <input type="hidden" name="password_token" value="<?php echo $data['password_token'] ?>" /> 
      </div>
        <div class="small-10 column">
            <input type="password" name="verifyNewPass" placeholder="Verify password" class="[tip-bottom] [radius round] has-tip">
        </div>
        <div class="small-4 column">
            <label><br />
                <input type="submit" name="submit"  class="button [small small small] center" value="Reset" /> 
            </label>
        </div>
    </form>
</div> 