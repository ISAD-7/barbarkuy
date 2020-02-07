
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1><?php echo @$judul; ?>
		  <small><?php echo @$deskripsi; ?></small>
		</h1>
		<ol class="breadcrumb">
		  <?php
		  	for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
		  		if ($i == 0) { ?>
				<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i>Home</a></li>
		  		<?php } 
		  		elseif ($i == (count($this->session->flashdata('segment'))-1)) { ?>
				<li class="active"> <?php echo "#".ucwords(str_replace("_"," ",$this->session->flashdata('segment')[$i])); ?> </li>
		  		<?php }
		  		else { ?>
				<li> <?php echo ucwords(str_replace("_"," ",$this->session->flashdata('segment')[$i])); ?> </li>
		  		<?php } 
		  		if ($i == 0 && $i == (count($this->session->flashdata('segment'))-1)) { ?>
				<li class="active"><a href="<?php site_url( $this->session->flashdata('segment') ); ?>"><?php echo @$judul; ?></a></li>
		  		<?php 
		  		}
		  	} 
		  ?>
		</ol>
	</section>
		