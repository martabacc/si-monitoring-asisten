
<script type="text/javascript" src="{{ URL::to('assets/js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ url('assets/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('assets/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('assets/adminlte/plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/adminlte/dist/js/app.min.js') }}"></script>

<script>
$(function(){
	// datatable initialization. script load dynamically (foot section) from caller pages
    table = $('.datatable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
    });

    table.$('.delete').click(function(){
    	$('#delete-modal #delete-button').attr('href', $(this).data('href'));
    	$('#delete-modal').modal();
    	return false;
    });
});
</script>
