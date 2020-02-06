
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
        <h4><i class="fa fa-user-plus"></i><b> <?php echo @$judul?> </b></h4>
      </div>
      <div class="col-sm-8 text-right">
        <h6 class="text-right">Powered by <i><b>Ion Auth</b></i></h6>
      </div>
    </div>
  </div><!-- /.box-header -->

  <?php echo form_open(uri_string(), 'class="form-horizontal"');?>

  <div class="box-body">

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_fname_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_fn = array('id'=>'first_name','name'=>'first_name','class'=>'form-control','type'=>'text','placeholder'=>'First Name'); 
            echo form_input($data_fn);
            ?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_lname_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_ln = array('id'=>'last_name','name'=>'last_name','class'=>'form-control','type'=>'text','placeholder'=>'Last Name'); 
            echo form_input($data_ln);
            ?>
          </div>
      </div>

      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_company_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_company = array('id'=>'company','name'=>'company','class'=>'form-control','type'=>'text','placeholder'=>'Company'); 
            echo form_input($data_company);
            ?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_email_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_email = array('id'=>'email','name'=>'email','class'=>'form-control','type'=>'email','placeholder'=>'Email'); 
            echo form_input($data_email);
            ?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_phone_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_phone = array('id'=>'phone','name'=>'phone','class'=>'form-control','type'=>'text','placeholder'=>'Phone'); 
            echo form_input($data_phone);
            ?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_password_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_pass = array('id'=>'password','name'=>'password','class'=>'form-control','type'=>'password','placeholder'=>'Password'); 
            echo form_input($data_pass);
            ?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('create_user_password_confirm_label'); ?></label>
          <div class="col-sm-8">
            <?php 
            $data_pass_conf = array('id'=>'password','name'=>'password_confirm','class'=>'form-control','type'=>'password','placeholder'=>'Confirm Password'); 
            echo form_input($data_pass_conf);
            ?>
          </div>
      </div>

      <!-- <p><?php // echo form_submit('submit', lang('create_user_submit_btn'));?></p> -->

  </div><!-- /.box-body -->
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <button type="submit" name="create_user_submit_btn" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
      </div>
      <div class="col-sm-12 col-md-8 text-right">
        <a href="<?php echo base_url('auth'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
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