<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="Javascript" src="http://www.codehelper.io/api/ips/?js"></script>
<script src="<?php echo base_url(); ?>resources/ng-controllers/create-job-post.js"></script>
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

       <div id="body" ng-controller="CreateCtrl">

        <?php echo form_open(base_url() . 'en/careers/submit_job', 'class="form-horizontal well cmxform", id="formJobPost", novalidate="novalidate", ng-submit="submit()"'); ?>
          <fieldset>
           <legend>Post a New Job</legend>
                <?php echo validation_errors(); ?>

        <div class="add-field">
            <select ng-model="addField.new" ng-options="type.name as type.value for type in addField.types"></select>
            <button type="button" class="btn" ng-click="addNewField()"><i class="icon-plus"></i> Add Form</button>
        </div>
        <hr>
        <p ng-show="form.form_fields.length == 0">No form added yet.</p>
        <accordion close-others="accordion.oneAtATime">
            <accordion-group heading="{{field.field_type}}" ng-repeat="field in form.form_fields">

                <div class="accordion-edit">
                    <button class="btn btn-danger pull-right" type="button" ng-click="deleteField(field.field_id)"><i class="icon-trash icon-white"></i> Delete</button>

										<div class="row">
		                    <div class="control-group">
		                      <label class="control-label" for="title">Title:</label>
		                        <div class="controls">
		                          <input type="text" class="input-xlarge" required ng-model="field.field_title" value="{{field.field_title}}" />
		                        </div>
		                    </div>
										</div>

                    <div class="row">
                        <div class="span2">Department:</div>
                        <div class="span4"><select ng-model="field.field_department" ng-options="department.title for department in addField.departments"></select></div>
                    </div>

                    <div class="row">
                        <div class="span2">Status:</div>
                        <div class="span4">
                            <label>
                                <input type="radio" ng-value="true" ng-selected ng-model="field.field_status" />
                                &nbsp; Open
                            </label>
                            <label>
                                <input type="radio" ng-value="false" ng-model="field.field_status"/>
                                &nbsp; Filled
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="span2">Description:</div>
                        <div class="span4"><textarea rows="6" class="input-xlarge" ng-model="field.field_description">{{field.field_description}}</textarea></div>
                    </div>

										<div class="row">
											<div class="control-group">
												<label class="control-label" for="location">Location:</label>
													<div class="controls">
														<input type="text" class="input-xlarge" required ng-model="field.field_location" value="{{field.field_location}}" />
													</div>
											</div>
										</div>

                    <div class="row">
                        <div class="span2">Number of Positions:</div>
                        <div class="span4"><input type="number" class="input-xlarge" ng-minlength="1" ng-model="field.field_num_positions" value="{{field.field_num_positions}}"></div>
                    </div>
                </div>
            </accordion-group>
        </accordion>

<?php /*
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
          </div> */?>
        <div class="form-actions">
            <input type="hidden" id="city" name="city" value="" />
            <input type="hidden" id="country" name="country" value="" />
            <input type="hidden" id="ip" name="ip" value="" />
            <input type="hidden" id="form_data" name="form_data" value="{{form.form_fields | json}}"/>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
          </fieldset>
        <?php echo form_close(); ?>

	</div></div>
