		
	<!-- jQuery 2.1.4 -->
	<!-- <script src="<?php // echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->

	<!-- SlimScroll -->
	<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

	<!-- FastClick -->
	<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>

  <!-- Others -->
  <script src="<?php echo base_url(); ?>assets/plugins/printThis/printThis.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.locale_id.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/fa-iconpicker/fontawesome-iconpicker.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- custom js -->
	<script type="text/javascript">
  window.onload = function() {
    showAll();
  }

  function showAll() {
    $(document).ready(function () {
      $("#mytable").dataTable({
           	"dom": '<"col-xs-2" l>Brft<"col-xs-1" i>p',
           	"responsive": true,
           	"pageLength": 20,      
           	"lengthMenu": [ 
           	  [10, 20, 50, -1], [10, 20, 50, "All"] 
           	],
            "buttons": [
            {
              extend: 'colvis',
              text: '<b><i class="fas fa-bars"></i> Kolom</b>',
              className: 'font-orange',
              // exportOptions:
              // {
              //     columns: [0,1,2,3,4,5]
              // },
            }, 
            {
              extend: 'excelHtml5',
              text: '<b><i class="fas fa-file-excel"></i> Excel</b>',
              className: 'font-green',
              exportOptions:
              {
                  columns: ':visible'
              },
            },
            ],
           	"language":
           	{
           	/*Indonesia*/
           	"search": "",
           	"lengthMenu": "Tampil _MENU_ baris",
           	"searchPlaceholder": "Cari...",
           	"loadingRecords": "&nbsp;",
           	"zeroRecords": "Tidak ada data",
           	"processing": "Memproses...",
           	"infoEmpty": "Tidak ada data ",
           	"info": "<strong>_TOTAL_</strong> Data | baris <strong>_START_</strong> s/d <strong>_END_</strong>",
           	"infoFiltered": "| disaring dari total <strong id='red'>_MAX_</strong> baris",
           	"paginate":
           	  {
           	    "previous": "<i class='fas fa-chevron-left'></i>",
           	    "next": "<i class='fas fa-chevron-right'></i>"
           	  }
           	},
      });

    /* alert messages 1 */
    <?php if($this->session->flashdata('message') != null) { ?>
      $('#alert-message').slideDown(1500);
        $('#alert-message').delay(2500).slideUp(1500);
    <?php } ?>

    /* fontawesome iconpicker */
    $(".iconpicker").iconpicker({
      hideOnSelect: true,
      animation: true,
    });

    /* URL auto fill */
    if( $('#url').val().length === 0){
      $('#url').val('#');
    };
    
    });
  };
  </script>
