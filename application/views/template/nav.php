<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
<a class="brand" href="http://www.eprosol.com"><?=lang('careers.logo')?></a>
<div class="nav-collapse collapse" id="main-menu">
 <ul class="nav" id="main-menu-left">
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

 <ul class="nav pull-right" id="main-menu-right">
<li><a rel="tooltip" href="<?php echo base_url(); ?>en/careers" class="<?php if($this->lang->lang() == 'en') {echo 'lang-selected';} ?>">EN</a></li> 
<li><a rel="tooltip" href="<?php echo base_url(); ?>ar/careers" class="<?php if($this->lang->lang() == 'ar') {echo 'lang-selected';} ?>">AR</a></li> 
<li><a rel="tooltip" href="<?php echo base_url();?>az/careers" class="<?php if($this->lang->lang() == 'az') {echo 'lang-selected';} ?>">AZ</a></li>
<li><a rel="tooltip" href="<?php echo base_url(); ?>tr/careers" class="<?php if($this->lang->lang() == 'tr') {echo 'lang-selected';} ?>">TR</a></li>
<li><a rel="tooltip" href="<?php echo base_url(); ?>ru/careers" class="<?php if($this->lang->lang() == 'ru') {echo 'lang-selected';} ?>">RU</a></li>
 </ul>
</div>