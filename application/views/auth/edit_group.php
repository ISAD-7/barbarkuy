
<!-- Main content -->
<section class='content'>

  <div class='row'>
  <div class='col-sm-12 col-md-6'>
  <div class='box box-default'>
  <!-- div alert messages -->
  <?php if($message != ''){echo alert($message, $this->session->flashdata('type'));} ?>

  <div class='box-header with-border'>
    <div class="col-sm-4 col-md-4">
      <h4 class="box-title"><i class="fa fa-users"></i><b> <?php echo @$judul?> </b></h4>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <?php echo form_open(current_url(), 'class="form-horizontal"');?>
  <div class="box-body">

    <div class="form-group">
    	<label class="col-sm-3 control-label"><?php echo lang('edit_group_name_label', 'group_name');?></label>
    	<div class="col-sm-8">
    	       <?php echo form_input($group_name);?>
    	</div>
    </div>

    <div class="form-group">
    	<label class="col-sm-3 control-label"><?php echo lang('edit_group_desc_label', 'description');?></label>
    	<div class="col-sm-8">
            <?php echo form_input($group_description);?>
    	</div>
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <button type="submit" name="edit_group_submit_btn" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
        <a href="<?php echo base_url('auth/group_list'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
      <div class="col-sm-12 col-md-6 text-right">
        <h6>Powered by <i><b>Ion Auth</b></i></h6>
	    </div> 
    </div>
  </div>

  <?php echo form_close();?>

  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->

</section>

<script type="text/javascript">
  $(document).ready(function () {

    /* alert messages 2 */
      <?php if($message != '') { ?>  
        $('#alert-message').slideDown(1500);
        $('#alert-message').delay(2500).slideUp(1500);
      <?php } ?>

    });
</script>