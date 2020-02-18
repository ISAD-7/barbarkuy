
<!-- Main content -->
<section class='content'>

  <div class='row'>
  <div class='col-xs-12'>
  <div class='box box-default'>
  <!-- div alert messages -->
  <?php if($message != ''){echo alert($message, $this->session->flashdata('type'));} ?>
  
  <div class='box-header with-border'>
  	<div class="col-sm-4" style="padding:0;">
		<?php echo anchor('auth/create_user', '<strong><i class="fa fa-user-plus"></i></strong> Create User', 'class="btn btn-success"'); ?>
    </div>
    <div class="box-tools pull-right">
    	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <div class='box-body'>

<table class="table table-bordered table-striped responsive" id="mytable" width="100%">
	<thead>
	<tr>
		<th class="text-center" width="80px">No</th>
		<th class="text-center"><?php echo lang('index_username_th');?></th>
		<th class="text-center"><?php echo lang('index_fname_th');?></th>
		<th class="text-center"><?php echo lang('index_lname_th');?></th>
		<th class="text-center"><?php echo lang('index_email_th');?></th>
		<th class="text-center"><?php echo lang('index_groups_th');?></th>
		<th class="text-center"><?php echo lang('index_status_th');?></th>
		<th class="text-center"><?php echo lang('index_action_th');?></th>
	</tr>
	</thead>
	<tbody>
	<?php 
	$no = 1;
	foreach ($users as $user):?>
		<tr>
			<td><?php echo $no++ ;?></td>
            <td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td class="text-center">
				<?php foreach ($user->groups as $group):?>
					<?php echo '<button class="btn btn-sm btn-primary">'.$group->name.'</button>'; ?>
                <?php endforeach?>
			</td>
			<td class="text-center">
			<?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, '<i class="fa fa-check"></i> Active', array('title'=>'status','class'=>'btn btn-success btn-sm')) : anchor("auth/activate/". $user->id, '<i class="fa fa-times"></i> Deactivate', array('title'=>'status','class'=>'btn btn-danger btn-sm'));?>
			</td>
			<td class="text-center">
			<?php	
			echo anchor("auth/read_user/".$user->id, '<i class="fa fa-eye"></i>', array('title'=>'read','class'=>'btn btn-info btn-sm'));
			echo '&nbsp;';  
			echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-pencil-square-o"></i>', array('title'=>'update','class'=>'btn btn-warning btn-sm'));
			echo '&nbsp;';  
			echo anchor("auth/delete_user/".$user->id, '<i class="fa fa-trash"></i>', array('title'=>'delete','class'=>'btn btn-danger btn-sm', 'id'=>$user->id));?></td>
		</tr>
        <script type="text/javascript"> 
        $("#<?php echo $user->id;?>").on("click", function (e) {
            e.preventDefault();
            swal({
              title: "Are you sure?",
              text: "Data <?php echo $user->username;?> will be deleted!",
              icon: "error",
              buttons: true,
              dangerMode: true,
            })
            .then(function(deleteData) {
              if (deleteData) {
                window.location.href = $('#<?php echo $user->id;?>').attr('href');
              } 
            });
        });
        </script>
	<?php endforeach;?>
	</tbody>
</table>

<!-- <p><?php // echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php // echo anchor('auth/create_group', lang('index_create_group_link'))?></p> -->

</div><!-- /.box-body -->
<div class="box-footer">
	<div class="col-xs-12 text-right">
    	<h6>Powered by <i><b>Ion Auth</b></i></h6>
	</div> 
</div><!-- /.box-footer-->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->

</section>