<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="Javascript" src="http://www.codehelper.io/api/ips/?js"></script>
<script language="Javascript">
$(function() {
	$('input[name=ip]').val(codehelper_ip.IP);
	$('input[name=country]').val(codehelper_ip.CountryName);
	$('input[name=city]').val(codehelper_ip.CityName);
});
</script><script>
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
	$("#formApply").validate();                
});

</script>
<div class="container">
<h2><?=lang('careers.apply_now')?></h2>

        <?php echo form_open_multipart(base_url() . 'careers/submit_application', 'class="form-horizontal well cmxform", id="formApply", novalidate="novalidate"'); ?>
    <fieldset>
           <legend><?=lang('careers.apply_online')?></legend>
<?php
    if($this->view_data['show_upload_msg'])
    {
        echo $this->view_data['error_upload']['error'];
    }

?>           
                <?php echo validation_errors(); ?>          
           
          <div class="control-group">
            <label class="control-label" for="firstName"><?=lang('careers.first_name')?>:</label>
            <div class="controls">
              <input type="text" title="Please provide your First Name." class="input-xlarge required" required name="txtFirstName" id="txtFirstName" value="<?php echo set_value('txtFirstName'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="lastName"><?=lang('careers.last_name')?>:</label>
            <div class="controls">
              <input type="text" title="Please provide your Last Name." class="input-xlarge required" required name="txtLastName" id="txtLastName" value="<?php echo set_value('txtLastName'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="email"><?=lang('careers.email')?>:</label>
            <div class="controls">
              <input type="text" title="Please provide a valid Email address." class="input-xlarge required email" required name="txtEmail" id="txtEmail" value="<?php echo set_value('txtEmail'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="gender"><?=lang('careers.gender')?>:</label>
            <div class="controls">
                <label for="male">
                <input type="radio" title="Please mention your gender." class="checkbox" required="" style="min-width: 30px" name="optGender" value="M" <?php echo set_radio('optGender', 'M'); ?> /><?=lang('careers.male')?></label>
                <label for="female">
                <input type="radio" class="checkbox" style="min-width: 30px" name="optGender" value="F" <?php echo set_radio('optGender', 'F'); ?> /><?=lang('careers.female')?></label>                         
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="nationality"><?=lang('careers.nationality')?>:</label>
            <div class="controls">
              <input type="text" title="Please mention, where do you belong to?" class="input-xlarge required" required name="txtNationality" id="txtNationality" value="<?php echo set_value('txtNationality'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="location"><?=lang('careers.current_location')?>:</label>
            <div class="controls">
              <input type="text" title="Please mention your current location." class="input-xlarge required" required name="txtLocation" id="txtLocation" value="<?php echo set_value('txtLocation'); ?>" placeholder="">
            </div>
          </div>                      
<div class="control-group">
            <label class="control-label" for="positions"><?=lang('careers.position_applying_for')?>:</label>
            <div class="controls">
              <select id="lstPositions" name="lstPositions" title="Please mention, which job you are applying for?">
                            <option value="0">--Any--</option>
                            <?php for($i=0; $i<$this->view_data['job_positions']->num_rows();$i++) { ?> 
                                <option value="<?php echo $this->view_data['job_positions']->row($i)->ID; ?>" 
<?php if($this->view_data['job_positions']->row($i)->ID == $this->view_data['selected_position']) 
{
    echo 'selected';
}?>                                        
                                        
                                        ><?php echo $this->view_data['job_positions']->row($i)->title; ?></option>
                            <?php } ?>   
              </select>
            </div>
          </div>           
<div class="control-group">
            <label class="control-label" for="education"><?=lang('careers.education')?>:</label>
            <div class="controls">
              <select id="lstEducation" name="lstEducation" class="required" required title="Please mention your qualification.">
                <option></option>
                <option value="<?=lang('careers.high_school')?>"><?=lang('careers.high_school')?></option>
                <option value="<?=lang('careers.bachlor_degree')?>"><?=lang('careers.bachlor_degree')?></option>
                <option value="<?=lang('careers.master_degree')?>"><?=lang('careers.master_degree')?></option>                    
                <option value="<?=lang('careers.phd')?>"><?=lang('careers.phd')?></option>                                        
              </select>
                <p class="help-inline"><?=lang('careers.select_academic')?></p>
            </div>
          </div>           
<div class="control-group">
            <label class="control-label" for="experience"><?=lang('careers.i_have_got')?>:</label>
            <div class="controls">
              <select id="lstExperience" name="lstExperience" class="required" required title="Please mention your experience.">
                <option></option>                    
                <option value="0-1 Years">0-1 Years</option>
                <option value="1-2 Years">1-2 Years</option>
                <option value="2-5 Years">2-5 Years</option>
                <option value="5-10 Years">5-10 Years</option>
                <option value="10-15 Years">10-15 Years</option>                    
                <option value="15+ Years">15+ Years</option>                                        
              </select>
            </div>
          </div>        
<div class="control-group">
            <label class="control-label" for="contact"><?=lang('careers.contact_no')?>:</label>
            <div class="controls">
              <input type="text" title="Please provide your contact number." class="input-xlarge required number" required name="txtPhone" id="txtPhone" value="<?php echo set_value('txtPhone'); ?>" placeholder="">
            </div>
          </div>
<div class="control-group">
            <label class="control-label" for="resume"><?=lang('careers.attach_cv')?>:</label>
            <div class="controls">
              <input class="input-file required" name="userfile" type="file" title="Please attach your CV/Resume." accept="application/rtf,application/msword,application/pdf">              
              <p class="help-block"><i><?=lang('careers.allowed_file_types')?></i><br>
        			<?=lang('careers.allowed_file_size')?></p>
            </div>

          </div>
<div class="control-group">
            <label class="control-label" for="textarea"><?=lang('careers.cover_note')?>:</label>
            <div class="controls">
              <textarea class="input-xlarge required" required title="Please write a cover note." name="txtCoverNote" id="txtCoverNote" rows="6"><?php echo set_value('txtCoverNote'); ?></textarea>
            </div>
          </div>           
<div class="form-actions">
            <input type="hidden" id="city" name="city" value="" />
            <input type="hidden" id="country" name="country" value="" />
            <input type="hidden" id="ip" name="ip" value="" />
            <button type="submit" class="btn btn-primary"><?=lang('careers.submit')?></button>
            <button type="reset" class="btn"><?=lang('careers.cancel')?></button>
          </div>

          </fieldset>
        <?php form_close(); ?>             

	</div>