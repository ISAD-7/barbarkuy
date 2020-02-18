
    <!-- Main content -->
    <section class='content'>
    <div class='row'>
    <div class='col-xs-12'>
    <div class='box box-default'>
    
    <!-- div alert messages -->
    <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>
                
        <div class='box-header with-border'>
            <div class="col-xs-2" style="padding:0">
            <?php echo anchor('menu/create_menu/','<strong><i class="fa fa-plus"></i></strong> Create',array('class'=>'btn btn-primary')); ?>
            </div>
            <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        
        <div class='box-body'>
        
        <table class="table table-bordered table-striped responsive" id="mytable" width="100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
					<th class="text-center">Name</th>
					<th class="text-center">URL</th>
					<th class="text-center">Icon</th>
					<th class="text-center">Status</th>
					<th class="text-center">Parent</th>
				    <th class="text-center">Action</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu){?>
                <tr>
				    <td><?php echo ++$start ?></td>
				    <td><?php echo $menu->name ?></td>
				    <td><?php echo $menu->url ?></td>
				    <td><?php echo $menu->icon ?></td>
                    <td class="text-center">
                    <?php echo ($menu->active == 1 ? '<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> active</button>' : '<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> inactive</button>') ?>
                    </td>
				    <td><?php echo $menu->parent_name ?></td>
				    <td class="text-center" width="140px">
				    <?php 
				    echo anchor(site_url('menu/read_menu/'.$menu->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('menu/update_menu/'.$menu->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
                    echo '&nbsp;';
				    echo anchor(site_url('menu/delete_menu/'.$menu->id),'<i class="fa fa-trash-o"></i>',array('title'=>'delete','class'=>'btn btn-danger btn-sm', 'id'=>$menu->id));?></td>
                </tr>
                <script type="text/javascript"> 
                $("#<?php echo $menu->id;?>").on("click", function (e) {
                    e.preventDefault();
                    swal({
                      title: "Are you sure?",
                      text: "Data <?php echo $menu->name;?> will be deleted!",
                      icon: "error",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then(function(deleteData) {
                      if (deleteData) {
                        window.location.href = $('#<?php echo $menu->id;?>').attr('href');
                      } 
                    });
                });
                </script>
            <?php } ?> 
            </tbody>
        </table>

        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
        </div><!-- /.row -->
        </section><!-- /.content -->
