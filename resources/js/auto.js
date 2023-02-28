var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
 
     $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
           // Fetch data
           $.ajax({
             url:"{{route('nombre')}}",
             type: 'post',
             dataType: "json",
             data: {
                _token: CSRF_TOKEN,
                search: request.term
             },
             success: function( data ) {
                response( data );
             }
           });
        },
        select: function (event, ui) {
          // Set selection
          $('#Nombre').val(ui.item.label); // display the selected text
          return false;
        }
     });
 
   });