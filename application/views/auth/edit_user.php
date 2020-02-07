
<!-- Main content -->
<section class='content'>

  <div class='row'>
  <div class='col-sm-12 col-md-6'>
  <div class='box box-default'>
  <!-- div alert messages -->
  <?php if($message != ''){echo alert($message, $this->session->flashdata('type'));} ?>

  <div class='box-header with-border'>
    <div class="col-sm-4 col-md-4">
      <h4><i class="fa fa-user-edit"></i><b> <?php echo @$judul?> </b></h4>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <?php echo form_open(uri_string(), 'class="form-horizontal"');?>
  <div class="box-body">

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
          <label class="col-sm-3 control-label"><?php echo lang('edit_user_username_label', 'username');?></label>
          <div class="col-sm-8">
            <?php echo form_input($username);?>
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
          <label class="col-sm-3 control-label">Password:</label>
          <div class="col-sm-8">
            <?php echo form_input($password);?>
          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label">Confirm Password:</label>
          <div class="col-sm-8">
            <?php echo form_input($password_confirm);?>
          </div>
      </div>

      <?php if ($this->ion_auth->is_admin()): ?>
          <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo lang('edit_user_groups_heading');?></label>
          <div class="col-sm-8">
          <?php foreach ($groups as $group):?>
              <label class="checkbox-inline">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <b><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></b>
              </label>
          <?php endforeach?>
          </div>
          </div>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <button type="submit" name="edit_user_submit_btn" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button> 
        <a href="<?php echo base_url('auth'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
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
