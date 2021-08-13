/*$(document).ready(function() {
    $('#datatable-buttons').DataTable();
} );*/
/* $(document).ready(function(){
 	$('.update-cat').click(function (e) {
 	    e.preventDefault();
 	   
 	    $.ajaxSetup({
 	        headers: {
 	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 	        }
 	    });
 	    var id=$('#cat_id').val();
 	    var cat_name=$('#cat_name').val();
 	    var cat_status=$('#cat_status').val();
 	    $.ajax({
 	        url: '{{route("categories.update")}}',
 	        method: "POST",
 	        
 	        data: {
 	            'id': id,
 	            'cat_name': cat_name,
 	            'cat_status':cat_status,
 	        },
 	        success: function (response) {
 	            $('#succes').html(response);
 	        },
 	        error: function (data) {
 	        $('#error').html(data);
 	    }
 	    });
 	});
 });*/