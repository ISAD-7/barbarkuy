  
  <aside class="main-sidebar">
  
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>assets/dist/img/logoStikom.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-info"></i> Online</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">

      <li class="header"><i class="fa fa-bars"></i> &nbsp;MENU</li>
      <!-- Optionally, you can add icons to the links -->
    
      <?php // Menu dinamis tiga layer
      $menu = $this->db->get_where('menu', array('parent' => 0,'active'=>1));

      if ($this->ion_auth->is_admin()) {
        // layer ke satu
        foreach ($menu->result() as $m) {        
          $submenu = $this->db->get_where('menu',array('parent'=>$m->id,'active'=>1));
          // cek ada sub menu
          if($submenu->num_rows()>0){
            // tampilkan submenu
            echo '<li class="treeview">';
            echo anchor($m->url, '<i class="'.$m->icon.'"></i><span>'.ucfirst($m->name).'</span><i class="fa fa-angle-left pull-right"></i>');
            echo '<ul class="treeview-menu">';
              
              if ($this->ion_auth->is_admin()) {
              // layer ke dua
              foreach ($submenu->result() as $s) {
                $sub = $this->db->get_where('menu',array('parent'=>$s->id,'active'=>1));
                // cek ada sub-submenu
                if($sub->num_rows()>0){
                // tampilkan sub-submenu
                echo '<li class="treeview">';
                echo anchor($s->url, '<i class="'.$s->icon.'"></i><span>'.ucfirst($s->name).'</span><i class="fa fa-angle-left pull-right"></i>');
                echo '<ul class="treeview-menu">';

                  if ($this->ion_auth->is_admin()) {  
                    // layer ke tiga
                    foreach ($sub->result() as $c){
                    echo '<li class="treeview">'.anchor($c->url, '<i class="'.$c->icon.'"></i><span> '.ucfirst($c->name).'</span>').'</li>';
                    }
                  }

                echo '</ul>';
                echo '</li>';
                } else {
                echo '<li>'.anchor($s->url, '<i class="'.$s->icon.'"></i><span> '.ucfirst($s->name).'</span>').'</li>';
                }
              }
              }

            echo '</ul>';
            echo '</li>';
            } else {
            echo '<li>'.anchor($m->url, '<i class="'.$m->icon.'"></i><span> '.ucfirst($m->name).'</span>').'</li>';
          }
        }
        
      }
      ?>

      <!-- Menu Administrator -->
      <?php if($this->ion_auth->is_admin()) { ?>                        
      <li class="treeview">
        <a href="#"><i class="fa fa-cog"></i><span> Control Panel</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('menu'); ?>"><i class="fa fa-bars"></i><span> Menu Management</span></a></li>
            <li><a href="<?php echo base_url('auth'); ?>"><i class="fa fa-user"></i><span> User Management</span></a></li>
            <li><a href="<?php echo base_url('auth/group_list'); ?>"><i class="fa fa-users"></i><span> Group Management</span></a></li>
            <li><a href="<?php echo base_url('crud'); ?>"><i class="fa fa-code"></i><span> CRUD Generator</span></a></li>              
          </ul>
      </li>
      <?php } ?>

      <li class="header"><i class="fa fa-sign-out"></i> EXIT</li>

      <li class="treeview">
        <a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i><span> Log Out</span></a>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
  </aside>
