<?php /*
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(function() {
	$("#formLogin").validate();                
});

</script>

<div class="container">
<h2>Login</h2>

<?php echo form_open(base_url() . 'careers/login', 'class="form-horizontal well cmxform", id="formLogin", novalidate="novalidate"'); ?>
  <fieldset>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label" for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge required">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge required" required>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Login</button>
      </div>
    </div>
  </fieldset>
<?php echo form_close(); ?>           
</div>
*/ ?>


<div>
<?php echo form_open(base_url().'index.php/login/')?>
<div>Login to your account</div>
<?php echo validation_errors(); ?>
<span><b><?php echo $login_failed; ?></b></span>
<div>
<div>Username Or Email: </div>
<div>
<input type="text" name="username" value="<?php echo set_value('username'); ?>"/>
</div>
</div>
<div>
<div>Password: </div>
<div>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" /><br/>
</div>
</div>
<div>
<input type="submit" value="Submit" name="submit_login"/>
</div>
<?php echo form_close()?>
</div>