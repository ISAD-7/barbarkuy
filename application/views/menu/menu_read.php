
  <!-- Main content -->
  <section class="content">
  <div class="row">
  <div class="col-sm-12 col-md-6">
  <div class="box box-default">

  <!-- div alert messages -->
  <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>

  <div class="box-header with-border">
    <h4 class="box-title"><b><?php echo @$judul?></b></h4>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

  <div class="box-body">
  <form class="form-horizontal">
	    
    <div class="form-group">
      <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-8">
          <?php 
              $array_name = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"name",
                "id"=>"name",
                "placeholder"=>"Name",
                "readonly"=>"readonly",
                "value"=>$name
                ); 
              echo form_input($array_name); ?>
        </div>
    </div>
	    
    <div class="form-group">
      <label class="col-sm-3 control-label">Url</label>
        <div class="col-sm-8">
          <?php 
              $array_url = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"url",
                "id"=>"url",
                "placeholder"=>"Url",
                "readonly"=>"readonly",
                "value"=>$url
                ); 
              echo form_input($array_url); ?>
        </div>
    </div>
	    
    <div class="form-group">
      <label class="col-sm-3 control-label">Icon</label>
        <div class="col-sm-8">
          <?php 
              $array_icon = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"icon",
                "id"=>"icon",
                "placeholder"=>"Icon",
                "readonly"=>"readonly",
                "value"=>$icon
                ); 
              echo form_input($array_icon); ?>
        </div>
    </div>
	    
    <div class="form-group">
      <label class="col-sm-3 control-label">Status</label>
        <div class="col-sm-8">
          <?php 
              $array_active = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"active",
                "id"=>"active",
                "placeholder"=>"Active",
                "readonly"=>"readonly",
                "value"=>($active == 1 ? 'Active' : 'Inactive')
                ); 
              echo form_input($array_active); ?>
        </div>
    </div>
	    
    <div class="form-group">
      <label class="col-sm-3 control-label">Parent</label>
        <div class="col-sm-8">
          <?php 
              $array_parent = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"parent",
                "id"=>"parent",
                "placeholder"=>"Parent",
                "readonly"=>"readonly",
                "value"=>$parent_name
                ); 
              echo form_input($array_parent); ?>
        </div>
    </div>
	
  </form>
  </div><!-- /.box-body -->
  
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <a href="<?php echo base_url('menu'); ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
    </div>
  </div>
    
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
  </section><!-- /.content -->
  