
    <!-- Main content -->
    <section class='content'>
    <div class='row'>
    <div class='col-xs-12'>
    <div class='box box-default'>
    
    <!-- div alert messages -->
    <?php if($this->session->flashdata('message')) { echo alert($this->session->flashdata('message'), $this->session->flashdata('type')); } ?>
                
        <div class='box-header with-border'>
            <div class="col-xs-2" style="padding:0">
            <?php echo anchor('catatan/create_catatan/','<strong><i class="fa fa-plus"></i></strong> Create',array('class'=>'btn btn-primary')); ?>
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
					<th class="text-center">Nama</th>
					<th class="text-center">Deskripsi</th>
					<th class="text-center">Catatan</th>
					<th class="text-center">Tanggal</th>
				    <th class="text-center">Action</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $start = 0;
            foreach ($catatan_data as $catatan){?>
                <tr>
				    <td><?php echo ++$start ?></td>
				    <td><?php echo $catatan->nama ?></td>
				    <td><?php echo $catatan->deskripsi ?></td>
				    <td><?php echo $catatan->catatan ?></td>
				    <td><?php echo $catatan->tanggal ?></td>
				    <td style="text-align:center" width="140px">
				    <?php 
				    echo anchor(site_url('catatan/read_catatan/'.$catatan->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('catatan/update_catatan/'.$catatan->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('catatan/delete_catatan/'.$catatan->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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