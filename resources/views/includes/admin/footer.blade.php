

            <!-- begin::Footer -->
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		<!-- end::Quick Sidebar -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<script>
			$('.carousel').carousel({
				pause: "false"
			});
        </script>
        <script>
        $("document").ready(function(){
            setTimeout(function(){
            $("div.alert").remove();
            }, 3000 );
        });
    </script>

		<script>
			$(document).ready(function() {
				$('#table').DataTable({
					responsive: true,

					dom:
					"<'row'<'col-sm-6'B><'col-sm-6'f>>" +
					"<'row'<'col-sm-12'tr>>" +
					"<'row'<'col-sm-5'i><'col-sm-7'p>>",

					buttons: [
						'csv', 'excel', 'pdf' ,'print'
					],
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$('#view').DataTable({
					responsive: true,

					dom:
					"<'row'<'col-sm-6'B><'col-sm-6'f>>" +
					"<'row'<'col-sm-12'tr>>" +
					"<'row'<'col-sm-5'i><'col-sm-7'p>>",
				});
			});
        </script>

		<script>
			$(document).ready(function (){
				var table = $('#example').DataTable({
					'responsive': true
				});

				// Handle click on "Expand All" button
				$('#btn-show-all-children').on('click', function(){
					// Expand row details
					table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
				});

				// Handle click on "Collapse All" button
				$('#btn-hide-all-children').on('click', function(){
					// Collapse row details
					table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
				});
			});
        </script>


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../admin/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
        <script src="../admin/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
		<script src="../admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/input-mask.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
        <script src="../admin/assets/demo/default/custom/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>
        <script src="../admin/assets/js/demo1/pages/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>
		<script src="../admin/assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
		<!--begin::Page Scripts -->
        <script src="../admin/assets/app/js/bootstrap-datepicker.init.js" type="text/javascript"></script>
        <script src="../admin/assets/app/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="../admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>

	</body>
	<!-- end::Body -->
</html>
