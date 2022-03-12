
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

  function createTypeRow(typeId, typeTitle, typeDescription) {
    $(".type_table_row_template tr").addClass("type"+typeId);
    $(".type_table_row_template .delete-type").attr('data-typeid', typeId );
    $(".type_table_row_template .show-type").attr('data-typeid', typeId );
    $(".type_table_row_template .edit-type").attr('data-typeid', typeId );
    $(".type_table_row_template .col-type-id").html(typeId);
    $(".type_table_row_template .col-type-select").html("<input type='checkbox' class='select-type' id='type_select_"+typeId+"' value="+typeId+"/>");
    $(".type_table_row_template .col-type-title").html(typeTitle );
    $(".type_table_row_template .col-type-description").html(typeDescription );
    
    return $(".type_table_row_template tbody").html();
  }

$("#storeNewType").on('click',(function() {
    let type_title;
    let type_description;
    let type_store_link;

    type_title = $('#type_title').val();
    type_description = $('#type_description').val();
    type_store_link = $('#type_store_link').val();

    ///console.log(type_store_link + " " + type_description);

    $.ajax({
         type: 'POST',
         url: type_store_link,
         data: {type_title: type_title, type_description: type_description  },
         success: function(data) {
          
          console.log(data);
       let html;
       html = createTypeRow(data.typeId, data.typeTitle, data.typeDescription);

    //   console.log(html);
            $("#type-table").append(html);
            $( "#storeNewTypeClose" ).click();        

            $("#alert").removeClass("d-none");
            $("#alert").html(data.successMessage +" " + data.clientName +" " +data.clientSurname);
            $('#type_title').val('');
            $('#type_description').val('');
            
            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);
              
       }
    });

}));

$(document).on('click', '.delete-type', function() {
    let typeId;
    typeId = $(this).attr('data-typeid');
     $.ajax({
        type: 'POST',
        url: '/types/deleteAjax/' + typeId,
        success: function(data) {
           console.log(data);

           if($.isEmptyObject(data.errorMessage)) {
            //sekmes atveji
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $("#alert").removeClass("d-none");
            $('.type'+typeId).remove();
            $("#alert").html(data.successMessage);

        } else {
            //nesekme
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

});


$(document).on('click', '.edit-type', function() {
    let typeId;
    let type_edit_link;
    typeId = $(this).attr('data-typeid');
    type_edit_link = $("#type_edit_link").val();
    
      $.ajax({
          type: 'GET',
          url: type_edit_link + typeId,
          success: function(data) {
            $('#edit_type_id').val(data.typeId);
             $('#edit_type_title').val(data.typeTitle);
             $('#edit_type_description').val(data.typeDescription);
          }
      });

  });


  $("#updateTypeContent").on('click', function() {
    
    let typeId;
    let type_title;
    let type_description;
    let type_update_link;

    typeId = $('#edit_type_id').val();
    type_title = $('#edit_type_title').val();
    type_description = $('#edit_type_description').val();
    type_update_link = $("#type_update_link").val();

    console.log(type_update_link);
    $.ajax({
          type: 'POST',
          url: type_update_link + typeId ,
          data: {type_title: type_title, type_description: type_description},
          success: function(data) {
                      
            $(".type"+typeId+ " " + ".col-type-title").html(data.typeTitle)
            $(".type"+typeId+ " " + ".col-type-description").html(data.typeDescription)
            $( "#editTypeModalClose" ).click(); 
            $("#alert").removeClass("d-none");
            $("#alert").removeClass("alert-danger");
            $("#alert").addClass("alert-success");
            $("#alert").html(data.successMessage);       

            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);

          }
      });
  });

  $(document).on('click', '.show-type', function() {
    let typeId;
    let type_show_link;
    typeId = $(this).attr('data-typeId');
    type_show_link = $("#type_show_link").val();
    console.log(typeId);

    $.ajax({
        type: 'GET',
        url: type_show_link + typeId,
        success: function(data) {
            $('.show-type-id').html(data.typeId);
            $('.show-type-title').html(data.typeTitle);
            $('.show-type-description').html(data.typeDescription);
         }
    });

});


$('#select_all_types').on('click', function () {
  
  let status = $(this).prop('checked'); 
    $(".select-type").each( function() {  
    $(this).prop("checked",status);
    });

});

$('#delete-selected').on('click', function () {
  $('#type-table-body input[type=checkbox]:checked').each(function () {
      console.log(this.value);
    let typeId = this.value;
      $.ajax({
        type: 'POST',
        url: '/types/deleteAjax/' + typeId,
        success: function(data) {
          // console.log(data);

           if($.isEmptyObject(data.errorMessage)) {
            //sekmes atveji
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $("#alert").removeClass("d-none");
            $('.type'+typeId).remove();
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
    $("#select_all_types").prop("checked",false);
    $(".select-type").each( function() {  
      $(this).prop("checked",false);
      });
    setTimeout(() => {
      $('#alert').addClass('d-none');
    }, 2000);

  });
});
//search functions
function search_type(searchValue) {

 let searchFieldCount= searchValue.length;
   if (searchFieldCount >= 1 && searchFieldCount < 3 ) {

    $(".search-feedback").css('display', 'block');
    $(".search-feedback").html("Min 3");
   
  } 
  else {
    $(".search-feedback").css('display', 'none');

  $.ajax({
        type: 'GET',
        url: 'types/searchAjax',
        data: {searchValue: searchValue},
        success: function(data) {
           //   console.log(data);

           if($.isEmptyObject(data.errorMessage)) {
            //sekmes atvejis
            $("#type-table tbody").show();
            $("#search-alert").addClass("d-none");
            $("#type-table tbody").html('');
             $.each(data.types, function(key, type) {
                  let html;
                  html = createTypeRow(type.id, type.title,type.description);
                  $("#type-table tbody").append(html);
             });
           } 
          else {
            //sesekmes atveju
                $("#type-table tbody").hide();
                $('#search-alert').addClass('alert-danger');
                $("#search-alert").removeClass("d-none");
                $("#search-alert").html(data.errorMessage);
          }
      }
    });
   }
  } 

// $('#search-type').click(function() {
//   let searchContent = $('#typeSearchBox').val();
//   search(searchContent);    
// });
$(document).on('input', '#typeSearchBox', function() { 
  let searchContent = $('#typeSearchBox').val();
  search_type(searchContent);     
});

$('.type-sort').click(function() {
  let sort;
  let direction;

  sort = $(this).attr('data-sort');
  direction = $(this).attr('data-direction');

  $("#hidden-sort").val(sort);
  $("#hidden-direction").val(direction);

  if(direction == 'asc') {
    $(this).attr('data-direction', 'desc');
  } else {
    $(this).attr('data-direction', 'asc');
  }

  console.log(direction);

  $.ajax({
        type: 'GET',
        url: 'types/indexAjax',
        data: {sort: sort, direction: direction },
        success: function(data) {

            $("#type-table tbody").html('');
             $.each(data.types, function(key, type) {
                  let html;
                  html = createTypeRow(type.id, type.title, type.description);
                  $("#type-table tbody").append(html);
             });
        }
    });
});