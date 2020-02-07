
  <!-- Main content -->
  <section class="content">
  <div class="row">
  <div class="col-sm-12 col-md-6">
  <div class="box box-default">

  <!-- div alert messages -->
  <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>

  <div class='box-header with-border'>
    <div class="col-sm-4 col-md-4">
      <h4><i class="fa fa-users"></i><b> <?php echo @$judul?> </b></h4>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <div class="box-body">
  <form class="form-horizontal">
	    
    <div class="form-group">
    	<label class="col-sm-3 control-label"><?php echo lang('edit_group_name_label', 'group_name');?></label>
    	<div class="col-sm-8">
    	  <?php echo form_input($group_name);?>
    	</div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_group_desc_label', 'description');?></label>
        <div class="col-sm-8">
        <?php echo form_input($description);?>
        </div>
    </div>

  </form>
  </div><!-- /.box-body -->
  
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <a href="<?php echo base_url('auth/group_list'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
      <div class="col-sm-12 col-md-6 text-right">
        <h6>Powered by <i><b>Ion Auth</b></i></h6> 
      </div>
    </div>
  </div>
    
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
  </section><!-- /.content -->
  