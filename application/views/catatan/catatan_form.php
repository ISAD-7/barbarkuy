
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

    <form class="form-horizontal" action="<?php echo $action; ?>" method="<?php echo $method; ?>">
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
            <?php 
            $array_nama = array(
              "type"=>"text",
              "class"=>"form-control",
              "name"=>"nama",
              "id"=>"nama",
              "placeholder"=>"Nama",
              "value"=>$nama
              ); 
            echo form_input($array_nama); ?>
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Deskripsi</label>
            <div class="col-sm-8">
            <?php 
            $array_deskripsi = array(
              "type"=>"text",
              "class"=>"form-control",
              "name"=>"deskripsi",
              "id"=>"deskripsi",
              "placeholder"=>"Deskripsi",
              "value"=>$deskripsi
              ); 
            echo form_input($array_deskripsi); ?>
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Catatan</label>
            <div class="col-sm-8">
            <?php 
            $array_catatan = array(
              "type"=>"text",
              "class"=>"form-control",
              "name"=>"catatan",
              "id"=>"catatan",
              "placeholder"=>"Catatan",
              "value"=>$catatan
              ); 
            echo form_input($array_catatan); ?>
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-8">
            <?php 
            $array_tanggal = array(
              "type"=>"date",
              "class"=>"form-control",
              "name"=>"tanggal",
              "id"=>"tanggal",
              "placeholder"=>"Tanggal",
              "value"=>$tanggal
              ); 
            echo form_input($array_tanggal); ?>
          </div>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	        
    <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <button type="submit" name="<?php echo $button ?>" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
      </div>
      <div class="col-sm-12 col-md-8 text-right">
        <a href="<?php echo site_url("catatan") ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
    </div>
    </div>
    </form>

    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->