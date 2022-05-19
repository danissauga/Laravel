$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

function createRestaurantRow(restaurantId, restaurantTitle, restaurantTables, restaurantWorkTimeFrom, restaurantWorkTimeTill) {
    console.log(restaurantWorkTimeFrom );
    $(".restaurant_table_row_template tr").removeAttr("class");
    $(".restaurant_table_row_template tr").addClass("restaurant"+restaurantId);
    $(".restaurant_table_row_template .delete-restaurant").attr('data-restaurantid', restaurantId );
    $(".restaurant_table_row_template .show-restaurant").attr('data-restaurantid', restaurantId );
    $(".restaurant_table_row_template .edit-restaurant").attr('data-restaurantid', restaurantId );
    $(".restaurant_table_row_template .col-restaurant-id").html(restaurantId );
    $(".restaurant_table_row_template .col-restaurant-select").html("<input type='checkbox' class='select-restaurant' id='restaurant_select_"+restaurantId+"' value="+restaurantId+"/>");
    $(".restaurant_table_row_template .col-restaurant-title").html(restaurantTitle );
    $(".restaurant_table_row_template .col-restaurant-tables-count").html(restaurantTables );
   
    $(".restaurant_table_row_template .col-restaurant-work-time").html(restaurantWorkTimeFrom+' - '+restaurantWorkTimeTill );

    return $(".restaurant_table_row_template tbody").html();
}
$(document).on('click', '.show-restaurant', function() {
  let restaurantId;
  let restaurant_show_link;
  restaurantId = $(this).attr('data-restaurantId');
  restaurant_show_link = $("#restaurant_show_link").val();

  $.ajax({
      type: 'GET',
      url: restaurant_show_link + restaurantId,
      success: function(data) {
          $('.show-restaurant-id').html('<b>Restaurant ID:</b> '+data.restaurantId);
          $('.show-restaurant-title').html('<b>Restaurant title:</b> '+data.restaurantTitle);
          $('.show-restaurant-tables-count').html('<b>Tables count:</b> '+data.restaurantTablesCount);
          $('.show-restaurant-work-time').html('<b>Restaurant work time:</b> '+data.restaurantWorkTimeFrom+' - '+data.restaurantWorkTimeTill);
       }
  });

});
$(document).on('click', '.updateRestaurantContent', function() {

  let restaurantId;
  let restaurant_title;
  let restaurant_tables_count;
  let restaurant_work_time_from;
  let restaurant_work_time_till;
  let restaurant_update_link;

  restaurantId = $('#edit_restaurant_id').val();
  restaurant_tables_count = $('#edit_restaurant_tables_count').val();
  restaurant_title = $('#edit_restaurant_title').val();
  restaurant_work_time_from = $('#edit_restaurant_work_time_from').val();
  restaurant_work_time_till = $('#edit_restaurant_work_time_till').val();
  restaurant_update_link = $('#restaurant_update_link').val();
  console.log(restaurant_update_link);
  $.ajax({
        type: 'POST',
        url: restaurant_update_link + restaurantId ,
        data: {restaurant_title: restaurant_title, restaurant_tables_count: restaurant_tables_count, restaurant_work_time_from: restaurant_work_time_from, restaurant_work_time_till: restaurant_work_time_till},
        success: function(data) {
        if($.isEmptyObject(data.errorMessage)) { 
            $(".restaurant"+restaurantId+ " " + ".col-restaurant-tables-count").html(data.restaurantTablesCount)
            $(".restaurant"+restaurantId+ " " + ".col-restaurant-title").html(data.restaurantTitle)
            $(".restaurant"+restaurantId+ " " + ".col-restaurant-work-time").html(data.restaurantWorkTimeFrom+' - '+data.restaurantWorkTimeTill)
            $( "#editRestaurantModalClose" ).click();
            $("#alert").removeClass("d-none");
            $("#alert").removeClass("alert-danger");
            $("#alert").addClass("alert-success");
            $("#alert").html(data.successMessage);
            
            $('.invalid-feedback').html('');
            $('.invalid-feedback').hide();
            
            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);

            } else {
                    $('.invalid-feedback').html('');
                    $('.invalid-feedback').hide();
            
                    $.each(data.errors, function(key, error) {
                      $('.'+key).show();
                      $('.'+key).addClass('is-invalid');
                      $('.'+key).html("<strong>"+error+"</strong>");
                    });

            }
        }
  });
});

$('#select_all_restaurants').on('click', function () {

    let status = $(this).prop('checked');
      $(".select-restaurant").each( function() {
      $(this).prop("checked",status);
      });
  
});

$('#delete-selected-restaurants').on('click', function () { 
  let isExecuted = confirm("Are you sure to delete this record?");
  if (isExecuted) { 
      $('#restaurant-table-body input[type=checkbox]:checked').each(function () 
      {
        let restaurantId = this.value;
          $.ajax({
            type: 'POST',
            url: '/restaurants/deleteAjax/' + restaurantId,
            success: function(data) 
            {
              if($.isEmptyObject(data.errorMessage)) {
              
                $('#alert').removeClass('alert-danger');
                $('#alert').addClass('alert-success');
                $("#alert").removeClass("d-none");
                $('.restaurant'+restaurantId).remove();
                $("#alert").html(data.successMessage);

            } else {
              
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
  }
});
$(document).on('click', '.delete-restaurant', function() {
  let isExecuted = confirm("Are you sure to delete this record?");
  if (isExecuted) {
    let restaurantId;
    restaurantId = $(this).attr('data-restaurantId');
    $.ajax({
        type: 'POST',
        url: '/restaurants/deleteAjax/' + restaurantId,
        success: function(data) {
          if($.isEmptyObject(data.errorMessage)) {
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $("#alert").removeClass("d-none");
            $('.restaurant'+restaurantId).remove();
            $("#alert").html(data.successMessage);

        } else {
            $('#alert').removeClass('alert-success');
            $('#alert').addClass('alert-danger');
            $("#alert").removeClass("d-none");
            $("#alert").html(data.errorMessage);
        }

            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);
        }
    });
  }
});
$(document).on('input', '#restaurantSearchBox', function() {
  let searchContent = $('#restaurantSearchBox').val();
  console.log(searchContent);
  search_restaurant(searchContent);
});

$(document).on('click', '.edit-restaurant', function() {
  let restaurantId;
  let restaurant_edit_link;
  restaurantId = $(this).attr('data-restaurantid');
  restaurant_edit_link = $("#restaurant_edit_link").val();

    $.ajax({
        type: 'GET',
        url: restaurant_edit_link + restaurantId,
        success: function(data) {
         
          if($.isEmptyObject(data.errorMessage)) {

          $('#edit_restaurant_id').val(data.restaurantId);
          $('#edit_restaurant_title').val(data.restaurantTitle);
          $('#edit_restaurant_tables_count').val(data.restaurantTablesCount);
          $('#edit_restaurant_work_time_from').val(data.restaurantWorkTimeFrom);
          $('#edit_restaurant_work_time_till').val(data.restaurantWorkTimeTill);

        } else {

          $('.invalid-feedback').html('');
          $('.invalid-feedback').hide();

          $.each(data.errors, function(key, error) {
            $('.'+key).show();
            $('.'+key).addClass('is-invalid');
            $('.'+key).html("<strong>"+error+"</strong>");
          });
        }

        }
    });

});

function search_restaurant(searchValue) {

  let searchFieldCount= searchValue.length;
   $.ajax({
         type: 'GET',
         url: 'restaurants/searchAjax',
         data: {searchValue: searchValue},
         success: function(data) {
            if($.isEmptyObject(data.errorMessage)) {
             $("#restaurant-table tbody").show();
             $("#search-alert").addClass("d-none");
             $("#restaurant-table tbody").html('');
              $.each(data.restaurants, function(key, restaurant) {
                  let html;
                   html = createRestaurantRow(restaurant.id,restaurant.title,restaurant.tables_count,restaurant.work_time_from, restaurant.work_time_till);
                   $("#restaurant-table tbody").append(html);
              });
            }
           else {
                 $("#restaurant-table tbody").hide();
                 $('#search-alert').addClass('alert-danger');
                 $("#search-alert").removeClass("d-none");
                 $("#search-alert").html(data.errorMessage);
           }
       }
     });
}