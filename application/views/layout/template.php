<!DOCTYPE html>
<html>
  <head>
    <title><?php echo @$judul .' | '. @$deskripsi; ?></title>

    <!-- meta --><?php echo @$meta; ?>

    <!-- css --><?php echo @$css; ?>

    <!-- js --><?php echo @$js; ?>

  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

      <!-- header --><?php echo @$header; ?>
      
      <!-- nav --><?php echo @$nav; ?>
      
      <!-- sidebar --><?php echo @$sidebar; ?>
      
      <!-- Content Wrapper -->
      <div class="content-wrapper">
      
      <!-- content header --><?php echo @$content_header; ?>
      
      <!-- main page content --><?php echo @$contents; ?>
        
      </div> <!-- /content -->

      <!-- footer --><?php echo @$footer; ?>

      <div class="control-sidebar-bg"></div>

    </div> <!-- wrapper -->

    <!-- js plugins --><?php echo @$plugins; ?>

  </body>
</html>