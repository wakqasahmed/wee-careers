<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    /*
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
*/
$().ready(function() {
	// validate the comment form when it is submitted
/*
        $("#formApply").validate({
			errorElement: "span",
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("div").next("span") );
			},
			success: function(label) {
				label.text("ok!").addClass("success");
			}            
            
        });*/
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