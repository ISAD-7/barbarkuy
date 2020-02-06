
<!-- Main content -->
<section class='content'>

  <div class='row'>
  <div class='col-sm-12 col-md-6'>
  <div class='box box-default'>
  <!-- div alert messages -->
  <?php if($message != ''){echo alert($message, $this->session->flashdata('type'));} ?>

  <div class='box-header with-border'>
    <div class="row">
      <div class="col-sm-4">
        <h4><i class="fa fa-users"></i><b> <?php echo @$judul?> </b></h4>
      </div>
      <div class="col-sm-8 text-right">
        <h6 class="text-right">Powered by <i><b>Ion Auth</b></i></h6>
      </div>
    </div>
  </div><!-- /.box-header -->

  <?php echo form_open("auth/create_group", 'class="form-horizontal"');?>
  <div class="box-body">

  	<div class="form-group">
    	<label class="col-sm-3 control-label"><?php echo lang('create_group_name_label', 'group_name');?></label>
    	<div class="col-sm-8">
    	  <?php echo form_input($group_name);?>
    	</div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo lang('create_group_desc_label', 'description');?></label>
        <div class="col-sm-8">
        <?php echo form_input($description);?>
        </div>
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <button type="submit" name="create_group_submit_btn" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
      </div>
      <div class="col-sm-12 col-md-8 text-right">
        <a href="<?php echo base_url('auth/group_list'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
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