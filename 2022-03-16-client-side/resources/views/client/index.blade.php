<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client Side</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
<div class="container">
            
    <table id="clietnt-table" class="table table-striped">
    <thead>
        <tr>
            <th><div class="clietnt-sort" data-sort="id" data-direction="asc">ID</div></th>
            <th><div class="clietnt-sort" data-sort="name" data-direction="asc">Name</div></th>
            <th><div class="clietnt-sort" data-sort="surname" data-direction="asc">Surname</div></th>
            <th><div class="clietnt-sort" data-sort="company" data-direction="asc">Company</div></th>
            <th><div class="clietnt-sort" data-sort="description" data-direction="asc">Description</div></th>
            
        </tr>
    </thead>
        <tbody id="client-table-body">
       
        </tbody>
    </table>
    <div id="search-alert" class="alert d-none">
    </div>
    
    <!-- Table add content template -->
    <table class="client_table_row_template d-none">
        <tr>
          <td class="col-client-id"></td>
          <td class="col-client-name"></td>
          <td class="col-client-surname"></td>
          <td class="col-client-company"></td>
          <td class="col-client-description"></td>
         
        </tr>
    </table>  

    <div class="button-container">
    </div>

</div>
<script>

function createClientRow(clientId, clientName, clientSurname, clientDescription, clientCompany) {
    $(".client_table_row_template tr").removeAttr("class");
    $(".client_table_row_template tr").addClass("client"+clientId);
    $(".client_table_row_template .delete-client").attr('data-clientid', clientId );
    $(".client_table_row_template .show-client").attr('data-clientid', clientId );
    $(".client_table_row_template .edit-client").attr('data-clientid', clientId );
    $(".client_table_row_template .col-client-id").html(clientId);
    $(".client_table_row_template .col-client-name").html(clientName);
    $(".client_table_row_template .col-client-surname").html(clientSurname );
    $(".client_table_row_template .col-client-surname").html(clientCompany );
    $(".client_table_row_template .col-client-description").html(clientDescription );
    
    return $(".client_table_row_template tbody").html();
  }

$(document).ready(function() {
                console.log('Veikia');
     let scrf='123456789'; //           $('meta[name="csrf-token"]').attr('content');       
//$('#page1').click(function(){
    $(document).on('click', '.button-container button',function() { 
            let page = $(this).attr('data-page');
        
        $.ajax({
         type: 'GET',
         url: page,
        //  data: ['scrf:scrf'], 
         success: function(data) {
         
          $('#client-table-body').html('');
          $('.button-container').html('');

                       $.each(data.data, function(key, client) {

                           let html;
                           html = createClientRow(client.id, client.name, client.surname, client.description, client.company_title);
                           $('#client-table-body').append(html);
                       });
                       $.each(data.links, function(key, link) {

                       let button;
                       if (link.url != null) {
                           if (link.active == true) {
                                button = "<button class='btn btn-primary active' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                                $('.button-container').append(button);
                           } else {
                                button = "<button class='btn btn-primary' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                                $('.button-container').append(button);
                       }
                    }});
                    

         }

        });
    });

         $.ajax({
         type: 'GET',
         url: 'http://127.0.0.1:8000/api/clients',
         //data: {type_title: type_title, type_description: type_description  },
         success: function(data) {
          
          $.each(data.data, function(key, client) {

        let html;
        html = createClientRow(client.id, client.name, client.surname, client.description);
        $('#client-table-body').append(html);
        });

        $.each(data.links, function(key, link) {
            let button;
            if (link.url != null) {
                if (link.url.active == true) {
                    button = "<button class='btn btn-primary active' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                    $('.button-container').append(button);
                } else {
                    button = "<button class='btn btn-primary' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                    $('.button-container').append(button);
        }
    } 
});
           
       }
    });

    // let client_name ='Test name';
    // let client_surname ='Test surname';
    // let client_description ='description';

    // $.ajax({
        
    //      type: 'POST',
    //      url: 'http://127.0.0.1:8000/api/clients',
    //      data: {clint_name: client_name,clint_surname:client_surname, clinet_description:client_description  },
    //      success: function(data) {
    //         onsole.log(data);
    //      }
    //     });


});


        </script>
    </body>

    


</html>
