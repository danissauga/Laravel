$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

$("#storeNewType").on('click',(function() {
    let type_title;
    let type_description;

    type_title = $('#type_title').val();
    type_description = $('#type_description').val();

    console.log(type_title + " " + type_description);

    $.ajax({
         type: 'POST',
         url: '{{route("type.storeAjax")}}',
         data: {type_title: type_title, type_description: type_description  },
         success: function(data) {
          
          console.log(data);
    //       //  let html;
            
    //       // html = createRowFromHtml(data.clientId, data.clientName, data.clientSurname, data.clientDescription);
    //         // $("#clients-table").append(html);

    //         // $("#createClientModal").hide();
    //         // $('body').removeClass('modal-open');
    //         // $('.modal-backdrop').remove();
    //         // $('body').css({overflow:'auto'});

    //         // $("#alert").removeClass("d-none");
    //         // $("#alert").html(data.successMessage +" " + data.clientName +" " +data.clientSurname);

    //         // $('#client_name').val('');
    //         // $('#client_surname').val('');
    //         // $('#client_description').val('');


       }
    });

}));