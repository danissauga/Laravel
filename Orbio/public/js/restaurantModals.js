$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });
$('#select_all_restaurants').on('click', function () {

    let status = $(this).prop('checked');
      $(".select-restaurant").each( function() {
      $(this).prop("checked",status);
      });
  
});
$('#delete-selected-restaurants').on('click', function () {
    $('#restaurant-table-body input[type=checkbox]:checked').each(function () {
      //  console.log(this.value);
      let restaurantId = this.value;
        $.ajax({
          type: 'POST',
          url: '/restaurants/deleteAjax/' + restaurantId,
          success: function(data) {
            // console.log(data);

             if($.isEmptyObject(data.errorMessage)) {
              //sekmes atveji
              $('#alert').removeClass('alert-danger');
              $('#alert').addClass('alert-success');
              $("#alert").removeClass("d-none");
              $('.restaurant'+restaurantId).remove();
              $("#alert").html(data.successMessage);

          } else {
              //nesekme
              $('#alert').removeClass('alert-success');
              $('#alert').addClass('alert-danger');
              $("#alert").removeClass("d-none");
              $("#alert").html(data.errorMessage);
          }

             
          }
});
$("#select_all_restaurants").prop("checked",false);
      $(".select-restaurant").each( function() {
        $(this).prop("checked",false);
        });
      setTimeout(() => {
        $('#alert').addClass('d-none');
      }, 2000);

    });
  });