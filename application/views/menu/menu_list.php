
    <!-- Main content -->
    <section class='content'>
    <div class='row'>
    <div class='col-xs-12'>
    <div class='box box-default'>
    
    <!-- div alert messages -->
    <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>
                
    <div class='box-header with-border'>
        <div class="col-xs-12" style="padding:0">
            <div class="col-xs-2" style="padding:0">
            <?php echo anchor('menu/create/','<strong><i class="fa fa-plus"></i></strong> Create',array('class'=>'btn btn-primary')); ?>

            </div>
        <div class="col-xs-10 text-right" style="padding:0;">        </div>
                </div>
                </div><!-- /.box-header -->
        
        <div class='box-body'>
        
        <table class="table table-bordered table-striped responsive" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
					<th class="text-center">Name</th>
					<th class="text-center">Url</th>
					<th class="text-center">Icon</th>
					<th class="text-center">Active</th>
					<th class="text-center">Parent</th>
				    <th class="text-center">Action</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu){?>
                <tr>
				    <td><?php echo ++$start ?></td><td><?php echo $menu->name ?></td><td><?php echo $menu->url ?></td><td><?php echo $menu->icon ?></td><td><?php echo $menu->active ?></td><td><?php echo $menu->parent_name ?></td>
				    <td style="text-align:center" width="140px">
				    <?php 
				    echo anchor(site_url('menu/read/'.$menu->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('menu/update/'.$menu->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('menu/delete/'.$menu->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				    ?>
				    </td>
			    </tr>
        	<?php } ?>
        	</tbody>
        </table>

        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
        </div><!-- /.row -->
        </section><!-- /.content -->