
<script type="text/javascript" src="{{ URL::to('assets/js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte-2.3.0/js/app.min.js') }}"></script>

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
