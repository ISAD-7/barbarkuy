
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
          <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-8">
            <?php 
            $array_name = array(
              "type"=>"text",
              "class"=>"form-control",
              "name"=>"name",
              "id"=>"name",
              "placeholder"=>"Name",
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
              "value"=>$icon
              ); 
            echo form_input($array_icon); ?>
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Active</label>
            <div class="col-sm-8">
            <?php 
            $array_active = array(
              "type"=>"text",
              "class"=>"form-control",
              "name"=>"active",
              "id"=>"active",
              "placeholder"=>"Active",
              "value"=>$active
              ); 
            echo form_input($array_active); ?>
          </div>
        </div>
		
        <div class="form-group">
          <label class="col-sm-3 control-label">Parent</label>
            <div class="col-sm-8">
              <select name="parent" class="form-control">
                <option value="0">YES</option>
                <?php
                $menu = $this->db->get('menu');
                foreach ($menu->result() as $m){
                    echo "<option value='$m->id' ";
                    echo $m->id==$parent?'selected':'';
                    echo">".  strtoupper($m->name)."</option>";
                }
                ?>
              </select>
            </div>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	        
    <div class="box-footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <button type="submit" name="<?php echo $button ?>" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> 
      </div>
      <div class="col-sm-12 col-md-8 text-right">
        <a href="<?php echo site_url("menu") ?>" type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a> 
      </div>
    </div>
    </div>
    </form>

    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->