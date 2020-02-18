<?php 
$string = "";
$string .= "
    <!-- Main content -->
    <section class='content'>
    <div class='row'>
    <div class='col-xs-12'>
    <div class='box box-default'>
    
    <!-- div alert messages -->
    <?php if(\$this->session->flashdata('message')) { echo alert(\$this->session->flashdata('message'), \$this->session->flashdata('type')); } ?>
                
        <div class='box-header with-border'>
            <div class=\"col-xs-2\" style=\"padding:0\">
            <?php echo anchor('".$c_url."/create_".$c_url."/','<strong><i class=\"fa fa-plus\"></i></strong> Create',array('class'=>'btn btn-primary')); ?>
            </div>
            <div class=\"box-tools pull-right\">
            <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        
        <div class='box-body'>
        
        <table class=\"table table-bordered table-striped responsive\" id=\"mytable\" width=\"100%\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
$string .= "\n\t\t\t\t\t<th class=\"text-center\">" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t    <th class=\"text-center\">Action</th>
                </tr>
            </thead>";
$string .= "\n\t\t\t<tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url) { ?>
                <tr>";

$string .= "\n\t\t\t\t    <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t    <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}
$string .= "\n\t\t\t\t    <td style=\"text-align:center\" width=\"140px\">"
        . "\n\t\t\t\t    <?php "
        . "\n\t\t\t\t    echo anchor(site_url('".$c_url."/read_".$c_url."/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); "
        . "\n\t\t\t\t    echo '&nbsp;'; "
        . "\n\t\t\t\t    echo anchor(site_url('".$c_url."/update_".$c_url."/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); "
        . "\n\t\t\t\t    echo '&nbsp;'; "
        . "\n\t\t\t\t    echo anchor(site_url('".$c_url."/delete_".$c_url."/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash-o\"></i>',array('title'=>'delete','class'=>'btn btn-danger btn-sm', 'id'=>\$".$c_url."->".$pk.")); ?> "
        . "\n\t\t\t\t    </td>"

        . "\n\t\t\t    </tr>
        \t\t<script type=\"text/javascript\"> 
                \$(\"#<?php echo \$".$c_url."->".$pk.";?>\").on(\"click\", function (e) {
                    e.preventDefault();
                    swal({
                      title: \"Are you sure?\",
                      text: \"Data with #ID<?php echo \$" . $c_url ."->". $pk . ";?> will be deleted!\",
                      icon: \"error\",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then(function(delete".ucfirst($c_url).") {
                      if (delete".ucfirst($c_url).") {
                        window.location.href = \$('#<?php echo \$".$c_url."->".$pk.";?>').attr('href');
                      } 
                    });
                });
                </script>
                <?php } ?>
        \t</tbody>
        </table>

        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
        </div><!-- /.row -->
        </section><!-- /.content -->";

$hasil_view_list = generate_crud($string, $target ."views/" . $c_url . "/" . $v_list_file);
?>