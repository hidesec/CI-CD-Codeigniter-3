</div>
    <script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script type="text/javascript">
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
		$('.datepicker').datepicker({
			format: 'mm/dd/yyyy',
			startDate: '-3d'
		});
    </script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>
