<div>
<div> Join now, please fill in the form below</div>


<?php echo form_open(base_url()."register/")?>
<span><?php echo $captcha_return?><?php echo validation_errors() ?></span>
<div>
<div>Your Name: </div>
<div>
<input type="text" name="name" value="<?php echo set_value('name') ?>" />
</div>
</div>
<div>
<div>Your Username</div>

<div>
<input type="text" name="username" value="<?php echo set_value('username') ?>" />
</div>
</div>

<div>
<div>Your Password</div>
<div>
<input type="password" name="password" value="<?php echo set_value('password') ?>" />
</div>
</div>

<div>
<div>Confirm Your Password</div>
<div>
<input type="password" name="passconf" value="<?php echo set_value('passconf') ?>" />
</div>
</div>
<div>
<div>Your Email</div>
<div>
<input type="text" name="email" value="<?php echo set_value('email') ?>" />
</div>
</div>
<div>
<div>Country</div>

<select name="country">
<option value="">Select Country</option>
<option value="Bangladesh" <?php echo set_select('country', 'Bangladesh'); ?> >Bangladesh</option>
<option value="Bangladesh" <?php echo set_select('country', 'India'); ?> >India</option>
<option value="Bangladesh" <?php echo set_select('country', 'Pakistan'); ?> >Pakistan</option>
<option value="Bangladesh" <?php echo set_select('country', 'Nepal'); ?> >Nepal</option>
<option value="Bangladesh" <?php echo set_select('country', 'Bhutan'); ?> >Bhutan</option>
<option value="Bangladesh" <?php echo set_select('country', 'Srilanka'); ?> >Srilanka</option>

</select>

</div>

<div>
<div>Your Address</div>
<div>
<textarea name="address"><?php echo set_value('address') ?></textarea>
</div>
</div>
<div>
<div>Your Gender</div>

<input type="radio" name="gender" value="Female"  <?php echo set_radio('gender', 'Male'); ?> /> Male &nbsp;&nbsp;   <input type="radio" name="gender" value="Male"  <?php echo set_radio('gender', 'Female'); ?> />   Female

</div>

<div>
Type the Captcha number below:<br /><br />

<?php echo $cap_img; ?>
<input  type="text" name="captcha" value=""/>
</div>
<div >
<input type="checkbox" name="terms" value="1" <?php echo set_checkbox('terms', '1'); ?> />I agree to the w3programmers Terms of Service and Privacy Policy
</div>
<div><input type="submit" value="Submit" name="submit"/></div>

</div>
<?php echo form_close()?>
</body>
</html>