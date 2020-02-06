		
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		<b><?php echo ucfirst($this->session->userdata('username'));?></b>
		</div> 
		<b>Version</b> 1.1.0 - <?php echo anchor(site_url(),'<b>Company Name</b>') .' - Copyright &copy;'.date("Y");?>
	</footer>	
