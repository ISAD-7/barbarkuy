
<!-- Main content -->
<section class='content'>

  <div class='row'>
  <div class='col-xs-12'>
  <div class='box box-default'>
  
  <!-- div alert messages -->
  <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>
  
  <div class='box-header with-border'>
  	<div class="col-xs-6" style="padding:0;">
		<?php echo anchor('auth/create_group', '<strong><i class="fa fa-users"></i></strong> Create Group', 'class="btn btn-success"'); ?>
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
		<th class="text-center"><?php echo lang('edit_group_name_label', 'group_name');?></th>
		<th class="text-center"><?php echo lang('edit_group_desc_label', 'description');?></th>
		<th class="text-center" width="140px"><?php echo lang('index_action_th');?></th>
	</tr>
	</thead>
	<tbody>
	<?php 
	$no = 1;
	foreach ($groups as $group):?>
		<tr>
			<td><?php echo $no++ ;?></td>
            <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
			<td class="text-center" width="140px">
			<?php 
			echo anchor("auth/read_group/".$group->id, '<i class="fa fa-eye"></i>', array('title'=>'read','class'=>'btn btn-info btn-sm'));
			echo '&nbsp;'; 
			echo anchor("auth/edit_group/".$group->id, '<i class="fa fa-pencil-square-o"></i>', array('title'=>'update','class'=>'btn btn-warning btn-sm'));
			echo '&nbsp;'; 
			echo anchor("auth/delete_group/".$group->id, '<i class="fa fa-trash"></i>', array('title'=>'delete','class'=>'btn btn-danger btn-sm', 'id'=>$group->id));?></td>
		</tr>
        <script type="text/javascript"> 
        $("#<?php echo $group->id;?>").on("click", function (e) {
            e.preventDefault();
            swal({
              title: "Are you sure?",
              text: "Data <?php echo $group->name;?> will be deleted!",
              icon: "error",
              buttons: true,
              dangerMode: true,
            })
            .then(function(deleteData) {
              if (deleteData) {
                window.location.href = $('#<?php echo $group->id;?>').attr('href');
              } 
            });
        });
        </script>
	<?php endforeach;?>
	</tbody>
</table>

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