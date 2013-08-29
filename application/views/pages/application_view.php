<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> 

  <script>
  $(function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  });
  </script> 

<div class="container">  
  
<h2>Submitted Applications</h2>

<div id="accordion">
            <?php 
             for($i=0; $i<$this->view_data['applications']->num_rows();$i++) { ?>    

  <h3><?php
  $position = '';
  if($this->view_data['applications']->row($i)->position_title != '')
      $position = $this->view_data['applications']->row($i)->position_title;
  else
      $position = 'Any Suitable Job';      
  
  echo $this->view_data['applications']->row($i)->firstname . ' ' . $this->view_data['applications']->row($i)->lastname . ' for ' . $position; ?></h3>
  <div>
    <p>
        <?php echo $this->view_data['applications']->row($i)->firstname; ?><br>
        <?php echo $this->view_data['applications']->row($i)->lastname; ?><br>
        <?php echo $this->view_data['applications']->row($i)->email; ?><br>
        <?php echo $this->view_data['applications']->row($i)->gender; ?><br>
        <?php echo $this->view_data['applications']->row($i)->nationality; ?><br>
        <?php echo $this->view_data['applications']->row($i)->phone; ?><br>
        <?php echo $this->view_data['applications']->row($i)->curr_location; ?><br>
        <?php echo $this->view_data['applications']->row($i)->qualification; ?><br>
        <?php echo $this->view_data['applications']->row($i)->experience; ?><br>
        <?php echo $this->view_data['applications']->row($i)->covernote; ?><br>
        <a href="<?php echo $this->view_data['applications']->row($i)->cv_path; ?>">Detailed CV</a><br><br>        
        <?php echo '<b>Applied from: ' . $this->view_data['applications']->row($i)->ip_address . '</b> having <b>Location: ' . $this->view_data['applications']->row($i)->location . '</b> on <b>' . $this->view_data['applications']->row($i)->applied_date . '</b>'; ?><br>        
    </p>
  </div>    
    
                <?php } ?>

	</div></div>