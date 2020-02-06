
  <!-- Main content -->
  <section class="content">
  <div class="row">
  <div class="col-sm-12 col-md-6">
  <div class="box box-default">

  <!-- div alert messages -->
  <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>

  <div class='box-header with-border'>
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <h4><i class="fa fa-user-edit"></i><b> <?php echo @$judul?> </b></h4>
      </div>
      <div class="col-sm-8 text-right">
        <h6 class="text-right">Powered by <i><b>Ion Auth</b></i></h6>
      </div>
    </div>
  </div><!-- /.box-header -->

  <div class="box-body">
  <form class="form-horizontal">
	    
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
        <div class="col-sm-8">
          <?php echo form_input($first_name);?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
        <div class="col-sm-8">
          <?php echo form_input($last_name);?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_user_company_label', 'company');?></label>
        <div class="col-sm-8">
          <?php echo form_input($company);?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_user_email_label', 'email');?></label>
        <div class="col-sm-8">
          <?php echo form_input($email);?>
        </div>
      </div>
	
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>
        <div class="col-sm-8">
          <?php echo form_input($phone);?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('edit_group_name_label', 'group_name');?></label>
        <div class="col-sm-8">
          <?php echo form_input($group_name);?>
        </div>
      </div>

  </form>
  </div><!-- /.box-body -->
  
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <a href="<?php echo base_url('auth'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
    </div>
  </div>
    
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
  </section><!-- /.content -->
  