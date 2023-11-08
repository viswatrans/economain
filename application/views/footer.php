
<style>
        

          </style>



<script src="<?php echo base_url(); ?>assets/scripts/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/waves/waves.min.js"></script>
<!-- Sparkline Chart -->
<script src="<?php echo base_url(); ?>assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/chart.sparkline.init.min.js"></script>

<!-- Percent Circle -->
<script src="<?php echo base_url(); ?>assets/plugin/percircle/js/percircle.js"></script>

<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Chartist Chart -->
<script src="<?php echo base_url(); ?>assets/plugin/chart/chartist/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/jquery.chartist.init.min.js"></script>

<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>assets/plugin/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/fullcalendar.init.js"></script>

<script src="<?php echo base_url(); ?>assets/scripts/main.min.js"></script>

<!-- Jquery DataTable Plugin Js -->

<script src="<?= base_url() ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>

<script src="http://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="http://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="http://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>



</body>

</html>
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 'Bfrtip',

			// responsive: true,

			buttons: [

				'copy', 'csv', 'excel', 'pdf'

			]

		});
	});
</script>

