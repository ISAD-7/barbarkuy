<?php 

$string = "
  <!-- Main content -->
  <section class=\"content\">
  <div class=\"row\">
  <div class=\"col-sm-12 col-md-6\">
  <div class=\"box box-default\">

  <!-- div alert messages -->
  <?php if(\$this->session->flashdata('message')) { echo alert(\$this->session->flashdata('message'), \$this->session->flashdata('type')); } ?>

  <div class=\"box-header with-border\">
    <h4 class=\"box-title\"><b><?php echo @\$judul?></b></h4>
    <div class=\"box-tools pull-right\">
      <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->

  <div class=\"box-body\">
  <form class=\"form-horizontal\">";

foreach ($non_pk as $row) {
    $string .= "\n\t    
    <div class=\"form-group\">
      <label class=\"col-sm-3 control-label\">". label($row["column_name"]) ."</label>
        <div class=\"col-sm-8\">
          <?php 
              \$array_".strtolower(label($row["column_name"]))." = array(
                \"type\"=>\"text\",
                \"class\"=>\"form-control\",
                \"name\"=>\"". $row["column_name"]."\",
                \"id\"=>\"".$row["column_name"]."\",
                \"placeholder\"=>\"".label($row["column_name"])."\",
                \"readonly\"=>\"readonly\",
                \"value\"=>\$".$row["column_name"]."
                ); 
              echo form_input(\$array_".strtolower(label($row["column_name"]))."); ?>
        </div>
    </div>";
}

$string .= "\n\t
  </form>
  </div><!-- /.box-body -->
  
  <div class=\"box-footer\">
    <div class=\"row\">
      <div class=\"col-sm-12 col-md-12\">
        <a href=\"<?php echo base_url('".$c_url."'); ?>\" type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-chevron-left\"></i> Back</a> 
      </div>
    </div>
  </div>
    
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
  </section><!-- /.content -->
  ";

$hasil_view_read = generate_crud($string, $target."views/".$c_url."/" . $v_read_file);

?>