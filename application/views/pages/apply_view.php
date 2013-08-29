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
<h2>Apply Now</h2>

        <?php echo form_open_multipart(base_url() . 'careers/submit_application', 'class="form-horizontal well cmxform", id="formApply", novalidate="novalidate"'); ?>
    <fieldset>
           <legend>Apply Online</legend>
<?php
    if($this->view_data['show_upload_msg'])
    {
        echo $this->view_data['error_upload']['error'];
    }

?>           
                <?php echo validation_errors(); ?>          
           
          <div class="control-group">
            <label class="control-label" for="firstName">First Name:</label>
            <div class="controls">
              <input type="text" title="Please provide your First Name." class="input-xlarge required" required name="txtFirstName" id="txtFirstName" value="<?php echo set_value('txtFirstName'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="lastName">Last Name:</label>
            <div class="controls">
              <input type="text" title="Please provide your Last Name." class="input-xlarge required" required name="txtLastName" id="txtLastName" value="<?php echo set_value('txtLastName'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="email">Email:</label>
            <div class="controls">
              <input type="text" title="Please provide a valid Email address." class="input-xlarge required email" required name="txtEmail" id="txtEmail" value="<?php echo set_value('txtEmail'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="gender">Gender:</label>
            <div class="controls">
                <label for="male">
                <input type="radio" title="Please mention your gender." class="checkbox" required="" style="min-width: 30px" name="optGender" value="M" <?php echo set_radio('optGender', 'M'); ?> />Male</label>
                <label for="female">
                <input type="radio" class="checkbox" style="min-width: 30px" name="optGender" value="F" <?php echo set_radio('optGender', 'F'); ?> />Female</label>                         
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="nationality">Nationality:</label>
            <div class="controls">
              <input type="text" title="Please mention, where do you belong to?" class="input-xlarge required" required name="txtNationality" id="txtNationality" value="<?php echo set_value('txtNationality'); ?>" placeholder="">
            </div>
          </div>           
          <div class="control-group">
            <label class="control-label" for="location">Current Location:</label>
            <div class="controls">
              <input type="text" title="Please mention your current location." class="input-xlarge required" required name="txtLocation" id="txtLocation" value="<?php echo set_value('txtLocation'); ?>" placeholder="">
            </div>
          </div>                      
<div class="control-group">
            <label class="control-label" for="positions">Position Applying for:</label>
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
            <label class="control-label" for="education">Education:</label>
            <div class="controls">
              <select id="lstEducation" name="lstEducation" class="required" required title="Please mention your qualification.">
                <option></option>
                <option value="High School/Secondary School">High School/Secondary School</option>
                <option value="Bachelors Degree">Bachelors Degree</option>
                <option value="Masters Degree">Masters Degree</option>                    
                <option value="PhD">PhD</option>                                        
              </select>
                <p class="help-inline">Select your highest academic achievement.</p>
            </div>
          </div>           
<div class="control-group">
            <label class="control-label" for="experience">I've got:</label>
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
            <label class="control-label" for="contact">Contact No:</label>
            <div class="controls">
              <input type="text" title="Please provide your contact number." class="input-xlarge required number" required name="txtPhone" id="txtPhone" value="<?php echo set_value('txtPhone'); ?>" placeholder="">
            </div>
          </div>
<div class="control-group">
            <label class="control-label" for="resume">Attach CV:</label>
            <div class="controls">
              <input class="input-file required" name="userfile" type="file" title="Please attach your CV/Resume." accept="application/rtf,application/msword,application/pdf">              
              <p class="help-block"><i>Allowed FileTypes</i> are rtf, doc, docx, pdf<br>
        			<i>Filesize</i> should be less than 2 MB</p>
            </div>

          </div>
<div class="control-group">
            <label class="control-label" for="textarea">Cover Note:</label>
            <div class="controls">
              <textarea class="input-xlarge required" required title="Please write a cover note." name="txtCoverNote" id="txtCoverNote" rows="6"><?php echo set_value('txtCoverNote'); ?></textarea>
            </div>
          </div>           
<div class="form-actions">
            <input type="hidden" id="city" name="city" value="" />
            <input type="hidden" id="country" name="country" value="" />
            <input type="hidden" id="ip" name="ip" value="" />               <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Cancel</button>
          </div>

          </fieldset>
        <?php form_close(); ?>             

	</div>          
          
          <!-- 
          <div class="control-group">
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01">
              <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" value="option1">
                Option one is this and that—be sure to include why it's great
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="select01">Select list</label>
            <div class="controls">
              <select id="select01">
                <option>something</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="multiSelect">Multicon-select</label>
            <div class="controls">
              <select multiple="multiple" id="multiSelect">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fileInput">File input</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Textarea</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">Focused input</label>
            <div class="controls">
              <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Uneditable input</label>
            <div class="controls">
              <span class="input-xlarge uneditable-input">Some value here</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="disabledInput">Disabled input</label>
            <div class="controls">
              <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here…" disabled="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox2" value="option1" disabled="">
                This is a disabled checkbox
              </label>
            </div>
          </div>
          <div class="control-group warning">
            <label class="control-label" for="inputWarning">Input with warning</label>
            <div class="controls">
              <input type="text" id="inputWarning">
              <span class="help-inline">Something may have gone wrong</span>
            </div>
          </div>
          <div class="control-group error">
            <label class="control-label" for="inputError">Input with error</label>
            <div class="controls">
              <input type="text" id="inputError">
              <span class="help-inline">Please correct the error</span>
            </div>
          </div>
          <div class="control-group success">
            <label class="control-label" for="inputSuccess">Input with success</label>
            <div class="controls">
              <input type="text" id="inputSuccess">
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="control-group info">
            <label class="control-label" for="selectError">Select with info</label>
            <div class="controls">
              <select id="selectError">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    
-->