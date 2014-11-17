<div class="navbar-header">
	<a class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<a class="navbar-brand" href="http://www.eprosol.com"><?=lang('careers.logo')?></a>
</div>

<div class="navbar-collapse collapse" style="height: 1px;">
	<ul class="nav navbar-nav">

		 <li class="<?php 
		 if (uri_string() != "")
		     echo isActive(uri_string(),"careers");
		 else
		     echo isActive($pageName,"careers");
		         ?>"><a href="<?php echo base_url() . $this->lang->lang(); ?>"><?=lang('careers.home')?></a></li>
		 <li class="<?php echo isActive(uri_string(),"careers/hiring"); ?>"><a href="<?php echo base_url() . $this->lang->lang() . '/' ?>careers/hiring"><?=lang('careers.vacancy_explorer')?></a></li>
		 <li class="<?php echo isActive(uri_string(),"careers/apply"); ?>"><a href="<?php echo base_url() . $this->lang->lang() . '/' ?>careers/apply"><?=lang('careers.apply_now')?></a></li>
		 <li class="<?php echo isActive(uri_string(),"careers/post_job"); ?>"><a href="<?php echo base_url() . $this->lang->lang() . '/' ?>careers/post_job"><?=lang('careers.post_new_job_admin')?></a></li>
		 <li class="<?php echo isActive(uri_string(),"careers/job_applications"); ?>"><a href="<?php echo base_url() . $this->lang->lang() . '/' ?>careers/job_applications"><?=lang('careers.apply_list_admin')?></a></li>
	</ul>

	<div class="col-lg-1 col-md-1">
		<select style="width: 100px" name="bootstrap-theme" id="theme_chooser" ng-options="theme.src as theme.name for theme in themes" ng-model="currentTheme.src">
		</select>
	</div>

	<ul class="nav navbar-nav navbar-right">
		<li class="<?php if($this->lang->lang() == 'en') {echo 'active';} ?>"><a href="<?php echo base_url(); ?>en/careers">EN</a></li> 
		<li class="<?php if($this->lang->lang() == 'ar') {echo 'active';} ?>"><a href="<?php echo base_url(); ?>ar/careers">AR</a></li> 
		<li class="<?php if($this->lang->lang() == 'az') {echo 'active';} ?>"><a href="<?php echo base_url();?>az/careers">AZ</a></li>
		<li class="<?php if($this->lang->lang() == 'tr') {echo 'active';} ?>"><a href="<?php echo base_url(); ?>tr/careers">TR</a></li>
		<li class="<?php if($this->lang->lang() == 'ru') {echo 'active';} ?>"><a href="<?php echo base_url(); ?>ru/careers">RU</a></li>
	</ul>

</div>