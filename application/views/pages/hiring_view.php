<div class="container">
<h2>We are hiring</h2>
       <div id="body">
           
<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Job Title</th>
        <th>Department</th>
        <th>Status</th>
        <th>Description</th>                        
        <th>No. of Positions</th>
        <th>Posted On</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
            <?php 
             for($i=0; $i<$this->view_data['positions']->num_rows();$i++) { ?>        
      <tr>
                    <td><?php echo $this->view_data['positions']->row($i)->title; ?></td>                    
                    <td><?php echo $this->view_data['positions']->row($i)->dept_title; ?></td>
                    <td><?php 
                    if($this->view_data['positions']->row($i)->status == 'O')
                        {echo 'Open';} 
                    else {echo 'Filled';}; ?></td>
                    <td style="max-width: 300px;"><?php echo $this->view_data['positions']->row($i)->description; ?></td>
                    <td><?php echo $this->view_data['positions']->row($i)->num_of_positions; ?></td>
                    <td><?php echo $this->view_data['positions']->row($i)->posted_date; ?></td>            
                    <td>
                        <button class="btn btn-primary"
                            <?php if($this->view_data['positions']->row($i)->status == 'F') { echo 'disabled'; }?>
                            onclick="window.location='apply/<?php echo $this->view_data['positions']->row($i)->ID; ?>';">
                               Apply Now
                        </button>                        
                    </td>
		</tr>
                <?php } ?>
    </tbody>
  </table>           

	</div></div>