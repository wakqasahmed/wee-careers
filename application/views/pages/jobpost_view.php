<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="Javascript" src="http://www.codehelper.io/api/ips/?js"></script>
<script language="Javascript">
$(function() {
	$('input[name=ip]').val(codehelper_ip.IP);
	$('input[name=country]').val(codehelper_ip.CountryName);
	$('input[name=city]').val(codehelper_ip.CityName);
});
</script>
<script>
    /*
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
*/
$().ready(function() {
	// validate the comment form when it is submitted
	$("#formJobPost").validate();                
});

</script>

<div class="container">
<h2>Job Post</h2>

       <div id="body">

        <?php echo form_open(base_url() . 'careers/submit_job', 'class="form-horizontal well cmxform", id="formJobPost", novalidate="novalidate"'); ?>
          <fieldset>
           <legend>Post a New Job</legend>
                <?php echo validation_errors(); ?>

           
          <div class="control-group">
            <label class="control-label" for="title">Title:</label>
            <div class="controls">
              <input type="text" title="Please provide Job Title." class="input-xlarge required" required name="txtTitle" id="txtTitle" value="<?php echo set_value('txtTitle'); ?>" placeholder="">
            </div>
          </div>           
        <div class="control-group">
            <label class="control-label" for="department">Department:</label>
            <div class="controls">
              <select id="lstDepartment" name="lstDepartment" class="required" required title="Please mention Job Department.">
                <option></option>
                <?php for($i=0; $i<$this->view_data['departments']->num_rows();$i++) { ?> 
                    <option value="<?php echo $this->view_data['departments']->row($i)->ID; ?>"><?php echo $this->view_data['departments']->row($i)->title; ?></option>
                <?php } ?>   
              </select>
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="status">Status:</label>
            <div class="controls">
                <label for="opened">
                <input type="radio" title="Please mention vacancy status." class="checkbox" required="" style="min-width: 30px" name="optStatus" value="O" <?php echo set_radio('optStatus', 'O'); ?> />Open</label>
                <label for="filled">
                <input type="radio" class="checkbox" style="min-width: 30px" name="optStatus" value="F" <?php echo set_radio('optStatus', 'F'); ?> />Filled</label>                         
            </div>
          </div>                      
        <div class="control-group">
            <label class="control-label" for="job_description">Description:</label>
            <div class="controls">
              <textarea class="input-xlarge required" required title="Please write job description." name="txtDescription" id="txtDescription" rows="6"><?php echo set_value('txtDescription'); ?></textarea>
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="num_positions">Number of Positions:</label>
            <div class="controls">
              <input type="text" title="Please provide Number of Positions." class="input-xlarge required number" required name="txtNumPositions" id="txtNumPositions" value="<?php echo set_value('txtNumPositions'); ?>" placeholder="">
            </div>
          </div>         
        <div class="form-actions">
            <input type="hidden" id="city" name="city" value="" />
            <input type="hidden" id="country" name="country" value="" />
            <input type="hidden" id="ip" name="ip" value="" />          
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
          </fieldset>
        <?php echo form_close(); ?>           
           
	</div></div>