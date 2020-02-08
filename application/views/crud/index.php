  <?php
error_reporting(0);
require_once 'core/generator.php';
require_once 'core/process.php';
?>

<!-- Main content -->
<section class='content'>

  <div class="row">
  <div class='col-sm-12 col-md-6'>
  <div class='box box-default'>
  <div class='box-header with-border'>
    <h4 class="box-title"><i class="fa fa-bolt"></i> <b>Generate</b></h4>
    <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-headers -->

  <form action="<?php echo base_url('crud'); ?>" method="POST">
  <div class='box-body'>

    <div class="row">
      <div class="col-xs-12">
        <label>Select Table - <a href="<?php echo base_url('crud'); ?>">Refresh</a></label>

        <div class="form-group">
          <select id="table_name" name="table_name" class="form-control" onchange="setname()">
            <option value="">Please Select</option>
              <?php
              $table_list = $hc->table_list();

              $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
              foreach ($table_list as $table) {
              ?>
            <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected==$table['table_name'] ? 'selected="selected"' : ''; ?>>
              <?php echo $table['table_name'] ?>
            </option>
              <?php } ?>
          </select>
        </div>
          
        <div class="form-group">
          <label>Custom Controller Name</label>
          <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
        </div>
            
        <div class="form-group">
          <label>Custom Model Name</label>
          <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
        </div>

        <label>Custom View Page</label>
          <div class="form-group">
            <input type="text" id="judul" name="judul" value="<?php echo isset($_POST['judul']) ? $_POST['judul'] : '' ?>" placeholder="Page Title" class="form-control">
          </div>
          
          <div class="form-group">
            <input type="text" id="deskripsi" name="deskripsi" value="<?php echo isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '' ?>" placeholder="Page Subtitle" class="form-control">
          </div>

        <div class="form-group">
          <div class="checkbox">
            <?php $admin_page = isset($_POST['admin_page']) ? $_POST['admin_page'] : ''; ?>
              <label><input type="checkbox" name="admin_page" value="1" <?php echo $admin_page=='1' ? 'checked' : '' ?>>
                <b>Is Admin </b> <superscript><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="If checked, only admin group can access menu and view page"></i></superscript>
              </label>
          </div>
        </div>

       </div>
    </div>

  </div><!-- /.box-body -->
  
  <div class="box-footer">
    <div class="col-sm-12 text-right">
      <button type="submit" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')">
        <i class="fa fa-code"></i> Generate
      </button>
    </div>  
    <input type="hidden" name="jenis_tabel" value="datatables">
  </div><!-- /box-footer -->

  </form><!-- /form -->
  
  </div><!-- /.box -->
  </div><!-- /.col -->

  <?php 
  if($hasil != null){
  echo 
  '<div class="col-md-6 col-sm-12">
  <div class="box box-default">
  <div class="box-header with-border">
    <div class="col-xs-6">
      <h4 class="box-title"><b>Generate Results</b></h4>
    </div>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <div class="box-body">
  <div class="well">';
  }
    foreach ($hasil as $h) {
    echo '<p>' . $h . '</p>';
    };

  if($hasil != null){  
  echo   
  '</div><!-- /.box-body -->
  <div class="box-footer">
    <div class="col-xs-13 text-right">
      <h6>Powered by <i><b>Harviacode</b></i></h6>
    </div>
  </div><!-- /.box-footer -->
  </div><!-- /.box -->
  </div><!-- /.col -->';
  }
  ?>

  </div><!-- /.row -->

    <script type="text/javascript">
    function capitalize(s) {
      return s && s[0].toUpperCase() + s.slice(1);
    }

    function setname() {
      var table_name = document.getElementById('table_name').value.toLowerCase();
      if (table_name != '') {
        document.getElementById('controller').value = capitalize(table_name);
        document.getElementById('judul').value = capitalize(table_name);
        document.getElementById('model').value = capitalize(table_name) + '_model';
      } else {
        document.getElementById('controller').value = '';
        document.getElementById('model').value = '';
      }
    }

    $('[data-toggle="tooltip"]').tooltip()
    </script>

</section><!-- /.content -->