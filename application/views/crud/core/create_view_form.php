<?php
$string = "
    <!-- Main content -->
    <section class=\"content\">
    <div class=\"row\">
    <div class=\"col-sm-12 col-md-6\">
    <div class=\"box box-default\">

    <!-- div alert messages -->
    <?php if(\$this->session->flashdata('message')) { echo alert(\$this->session->flashdata('message'), \$this->session->flashdata('type')); } ?>

    <div class=\"box-header with-border\">";
$string .= "
        <div class=\"row\">
        <div class=\"col-sm-4\">
            <h4><b><?php echo @\$judul?></b></h4>
        </div>
        </div>
    </div><!-- /.box-header -->

    <div class=\"box-body\">

    <form class=\"form-horizontal\" action=\"<?php echo \$action; ?>\" method=\"<?php echo \$method; ?>\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text' || $row["data_type"] == 'char' || $row["data_type"] == 'varchar') {
        $string .= "\n\t\t
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
              \"value\"=>\$".$row["column_name"]."
              ); 
            echo form_input(\$array_".strtolower(label($row["column_name"]))."); ?>
          </div>
        </div>";
    } elseif ($row["data_type"] == 'date' || $row["data_type"] == 'datetime') {
        $string .= "\n\t\t
        <div class=\"form-group\">
          <label class=\"col-sm-3 control-label\">". label($row["column_name"]) ."</label>
            <div class=\"col-sm-8\">
            <?php 
            \$array_".strtolower(label($row["column_name"]))." = array(
              \"type\"=>\"date\",
              \"class\"=>\"form-control\",
              \"name\"=>\"". $row["column_name"]."\",
              \"id\"=>\"".$row["column_name"]."\",
              \"placeholder\"=>\"".label($row["column_name"])."\",
              \"value\"=>\$".$row["column_name"]."
              ); 
            echo form_input(\$array_".strtolower(label($row["column_name"]))."); ?>
          </div>
        </div>";
    } else {
        $string .= "\n\t\t
        <div class=\"form-group\">
          <label class=\"col-sm-3 control-label\">". label($row["column_name"]) ."</label>
            <div class=\"col-sm-8\">
            <?php 
            \$array_".$row["column_name"]." = array(
              \"type\"=>\"text\",
              \"class\"=>\"form-control\",
              \"name\"=>\"". $row["column_name"]."\",
              \"id\"=>\"".$row["column_name"]."\",
              \"placeholder\"=>\"".label($row["column_name"])."\",
              \"value\"=>\$".$row["column_name"]."
              ); 
            echo form_input(\$array_".$row["column_name"]."); ?>
          </div>
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t        
    <div class=\"box-footer\">
    <div class=\"row\">
      <div class=\"col-sm-12 col-md-4\">
        <button type=\"submit\" name=\"<?php echo \$button ?>\" class=\"btn btn-primary\"><i class=\"fa fa-check\"></i> Submit</button> 
      </div>
      <div class=\"col-sm-12 col-md-8 text-right\">
        <a href=\"<?php echo site_url(\"" . $c_url . "\") ?>\" type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-chevron-left\"></i> Back</a> 
      </div>
    </div>
    </div>
    </form>

    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->";

$hasil_view_form = generate_crud($string, $target . "views/".$c_url."/" . $v_form_file);
?>