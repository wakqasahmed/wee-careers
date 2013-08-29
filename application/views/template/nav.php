<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
<a class="brand" href="http://www.wakqasahmed.com">Wee Careers</a>
<div class="nav-collapse collapse" id="main-menu">
 <ul class="nav" id="main-menu-left">
 <li class="<?php 
 if (uri_string() != "")
     echo isActive(uri_string(),"careers");
 else
     echo isActive($pageName,"careers");
         ?>"><a href="<?php echo base_url()?>">Home</a></li>
 <li class="<?php echo isActive(uri_string(),"careers/hiring"); ?>"><a href="<?php echo base_url()?>careers/hiring">Vacancy Explorer</a></li>
 <li class="<?php echo isActive(uri_string(),"careers/apply"); ?>"><a href="<?php echo base_url()?>careers/apply">Apply Now</a></li>
 <li class="<?php echo isActive(uri_string(),"careers/post_job"); ?>"><a href="<?php echo base_url()?>careers/post_job">Post New Job (Admin)</a></li>
 <li class="<?php echo isActive(uri_string(),"careers/job_applications"); ?>"><a href="<?php echo base_url()?>careers/job_applications">Applicants List (Admin)</a></li>
<!--
 <ul class="nav pull-right" id="main-menu-right">
   <li><a rel="tooltip" target="_blank" href="http://wakqasahmed.com/" title="Wakqas Ahmed" data-original-title="Wakqas Ahmed">Author Website <i class="icon-share-alt"></i></a></li>
   <li><a rel="tooltip" target="_blank" href="https://wakqasahmed.github.io" title="Wakqas Ahmed at GitHub" data-original-title="Wakqas Ahmed at GitHub">View on GitHub <i class="icon-share-alt"></i></a></li>
 </ul>
-->
</div>