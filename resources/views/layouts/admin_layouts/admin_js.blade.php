	<!-- Bootstrap JS -->
	<script src="{{asset('js/admin_js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->

	<script src="{{asset('js/admin_js/jquery.min.js')}}"></script>
	<script src="{{asset('plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{asset('js/admin_js/index.js')}}"></script>
	<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('js/admin_js/app.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>