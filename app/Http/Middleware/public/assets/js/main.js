$(document).ready(function() {
    $('#name_state').on('change', function() {
        var getStId = $(this).val();
        if(getStId) {
            $.ajax({
                url: '/searchYourCity/'+getStId,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data) {
                    //console.log(data);
                  if(data){
                    $('#name_city').empty();
                    $('#name_city').focus;
                   // $('#name_city').append('<option value="">-- Select Shipping fee --</option>'); 
                    $.each(data, function(key, value){
                    $('select[name="name_city"]').append('<option value="'+ key +'">#' + value.rates+ '</option>');
                });
              }else{
                $('#name_city').empty();
              }
              }
            });
        }else{
          $('#name_city').empty();
        }
    });
});