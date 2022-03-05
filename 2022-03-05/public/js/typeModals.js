
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

  function createTypeRow(typeId, typeTitle, typeDescription) {
    $(".type_table_row_template tr").addClass("type"+typeId);
    $(".type_table_row_template .delete-type").attr('data-typeid', typeId );
    $(".type_table_row_template .show-type").attr('data-typeid', typeId );
    $(".type_table_row_template .edit-type").attr('data-ctypeid', typeId );
    $(".type_table_row_template .col-type-id").html(typeId );
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

    console.log(type_title + " " + type_description);

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
    let typeid;
    typeid = $(this).attr('data-typeid');
    console.log(typeid);

    $.ajax({
        type: 'POST',// formoje method POST GET
        url: '/types/deleteAjax/' + typeid  ,// formoje action
        success: function(data) {
           console.log(data);

           $('.type'+typeid).remove();
            $("#alert").removeClass("d-none");
            $("#alert").html(data.successMessage);
            
            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);
        }
    });

});


$(document).on('click', '.edit-type', function() {
    let typeid;
    let type_edit_link;
    typeid = $(this).attr('data-typeid');
    type_edit_link = $("#type_edit_link").val();
      console.log(type_edit_link);

      $.ajax({
          type: 'GET',
          url: type_edit_link,
          success: function(data) {
            $('#edit_type_id').val(data.typeid);
             $('#edit_type_title').val(data.typeTitle);
             $('#edit_type_description').val(data.typeDescription);
          }
      });

  });


$(document).on('click', '.update-type', function() {
    let typeid;
    let type_title;
    let type_description;
    let type_update_link;

    typeid = $('#edit_type_id').val();
    type_title = $('#edit_type_title').val();
    type_description = $('#edit_type_description').val();
    type_update_link = $("#type_update_link");

    $.ajax({
          type: 'POST',
          url: type_update_link +'/'+ typeid,
          data: {type_title: type_title, type_description: type_description},
          success: function(data) {
                      
            $(".type"+typeid+ " " + ".col-type-title").html(data.typeTitle)
            $(".type"+typeid+ " " + ".col-type-title").html(data.typeDescription)
            $( "#editTypeModalClose" ).click(); 
            $("#alert").removeClass("d-none");
            $("#alert").html(data.successMessage);       

            
          }
      });
  })