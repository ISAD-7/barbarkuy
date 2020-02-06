
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
            <?php echo anchor('kategori/create/','<strong><i class="fa fa-plus"></i></strong> Create',array('class'=>'btn btn-primary')); ?>

            </div>
        <div class="col-xs-10 text-right" style="padding:0;">        </div>
                </div>
                </div><!-- /.box-header -->
        
        <div class='box-body'>
        
        <table class="table table-bordered table-striped responsive" id="mytable" width="100%">
            <thead>
                <tr>
                    <th width="80px">No</th>
					<th class="text-center">Nama Kategori</th>
					<th class="text-center">Jenis Kategori</th>
					<th class="text-center">Group Kategori</th>
					<th class="text-center">Status</th>
					<th class="text-center">Created Date</th>
				    <th class="text-center">Action</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $start = 0;
            foreach ($kategori_data as $kategori){?>
                <tr>
				    <td><?php echo ++$start ?></td><td><?php echo $kategori->nama_kategori ?></td><td><?php echo $kategori->jenis_kategori ?></td><td><?php echo $kategori->group_kategori ?></td><td><?php echo $kategori->status ?></td><td><?php echo $kategori->created_date ?></td>
				    <td style="text-align:center" width="140px">
				    <?php 
				    echo anchor(site_url('kategori/read/'.$kategori->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('kategori/update/'.$kategori->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				    echo '&nbsp;'; 
				    echo anchor(site_url('kategori/delete/'.$kategori->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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