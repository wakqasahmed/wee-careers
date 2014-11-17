<div class="container">
<h2><?=lang('careers.we_are_hiring')?></h2>
       <div id="body">

<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th><?=lang('careers.job_title')?></th>
        <th><?=lang('careers.department')?></th>
        <th><?=lang('careers.status')?></th>
        <th><?=lang('careers.description')?></th>
        <th><?=lang('careers.location')?></th>
        <th><?=lang('careers.no_of_positions')?></th>
        <th><?=lang('careers.posted_on')?></th>
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
                        {echo lang('careers.open');}
                    else {echo lang('careers.filled');}; ?></td>
                    <td style="max-width: 300px;"><?php echo $this->view_data['positions']->row($i)->description; ?></td>
                    <td><?php echo $this->view_data['positions']->row($i)->location; ?></td>                    
                    <td><?php echo $this->view_data['positions']->row($i)->num_of_positions; ?></td>
                    <td><?php echo $this->view_data['positions']->row($i)->posted_date; ?></td>
                    <td>
                        <button class="btn btn-primary"
                            <?php if($this->view_data['positions']->row($i)->status == 'F') { echo 'disabled'; }?>
                            onclick="window.location='apply/<?php echo $this->view_data['positions']->row($i)->ID; ?>';">
                               <?=lang('careers.apply_now')?>
                        </button>
                    </td>
		</tr>
                <?php } ?>
    </tbody>
  </table>

	</div></div>
