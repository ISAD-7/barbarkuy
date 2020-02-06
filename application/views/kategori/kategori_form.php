
    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-sm-12 col-md-6">
    <div class="box box-default">

    <!-- div alert messages -->
    <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>

    <div class="box-header with-border">
        <div class="row">
        <div class="col-sm-4">
            <h4><b><?php echo @$judul?></b></h4>
        </div>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">

    <form class="form-horizontal" action="<?php echo $action; ?>" method="<?php echo $method; ?>">
		
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Kategori</label>
              <div class="col-sm-8">
              <?php 
              $array_kategori = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"nama_kategori",
                "id"=>"nama_kategori",
                "placeholder"=>"Nama Kategori",
                "value"=>$nama_kategori
                ); 
              echo form_input($array_kategori); ?>
            </div>
          </div>
		
        <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Kategori</label>
              <div class="col-sm-8">
              <?php 
              $array_kategori = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"jenis_kategori",
                "id"=>"jenis_kategori",
                "placeholder"=>"Jenis Kategori",
                "value"=>$jenis_kategori
                ); 
              echo form_input($array_kategori); ?>
            </div>
          </div>
		
        <div class="form-group">
            <label class="col-sm-3 control-label">Group Kategori</label>
              <div class="col-sm-8">
              <?php 
              $array_kategori = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"group_kategori",
                "id"=>"group_kategori",
                "placeholder"=>"Group Kategori",
                "value"=>$group_kategori
                ); 
              echo form_input($array_kategori); ?>
            </div>
          </div>
		
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-8">
              <?php 
              $array_kategori = array(
                "type"=>"text",
                "class"=>"form-control",
                "name"=>"status",
                "id"=>"status",
                "placeholder"=>"Status",
                "value"=>$status
                ); 
              echo form_input($array_kategori); ?>
            </div>
          </div>
		
        <div class="form-group">
            <label class="col-sm-3 control-label">Created Date</label>
              <div class="col-sm-8">
              <?php 
              $array_kategori = array(
                "type"=>"date",
                "class"=>"form-control",
                "name"=>"created_date",
                "id"=>"created_date",
                "placeholder"=>"Created Date",
                "value"=>$created_date
                ); 
              echo form_input($array_kategori); ?>
            </div>
          </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	        
    <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <button type="submit" name="<?php echo $button ?>" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
      </div>
      <div class="col-sm-12 col-md-8 text-right">
        <a href="<?php echo site_url("kategori") ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
    </div>
    </div>
    </form>

    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->