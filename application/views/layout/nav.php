
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <i class="fas fa-bars"></i>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
  
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?></span>
      </a>
      
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
        <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <p>
          <?php echo ucfirst($this->session->userdata('username')); ?>
            <small>Last Login : <?php echo date("d/m/Y - h:i:s", $this->session->userdata('last_login')); ?></small>
          </p>
        </li>
      
        <!-- Menu Body -->
        <li class="user-body">
        <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
        </div>
        </li>
      
        <!-- Menu Footer-->
        <li class="user-footer">
        <div class="pull-left">
          <a href="#" class="btn btn-default btn-flat">Profile</a>
        </div>
        <div class="pull-right">
        <?php echo anchor('auth/logout','Sign out',array('class'=>'btn btn-default btn-flat'));?>      
        </div>
        </li>
      
      </ul>
        </li>
    
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  </header> <!-- /header -->
  