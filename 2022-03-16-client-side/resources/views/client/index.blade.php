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
            <th><div class="clietnt-sort" data-sort="description" data-direction="asc">Description</div></th>
            
        </tr>
    </thead>
        <tbody id="client-table-body">
       
        </tbody>
    </table>
    <div id="search-alert" class="alert d-none">
    </div>
</div>
<!-- Table add content template -->
<table class="client_table_row_template d-none">
        <tr>
          <td class="col-client-id"></td>
          <td class="col-client-name"></td>
          <td class="col-client-surename"></td>
          <td class="col-client-description"></td>
         
        </tr>
    </table>  

<button id="page1" data-page="4">Got o page 4</button>




            </div>
            <script>

function createTypeRow(clientId, clientName, clientSurname, typeDescription) {
    $(".client_table_row_template tr").removeAttr("class");
    $(".client_table_row_template tr").addClass("client"+clientId);
    $(".client_table_row_template .delete-client").attr('data-clientid', clientId );
    $(".client_table_row_template .show-client").attr('data-clientid', clientId );
    $(".client_table_row_template .edit-client").attr('data-clientid', clientId );
    $(".client_table_row_template .col-client-id").html(clientId);
    $(".client_table_row_template .col-client-select").html("<input client='checkbox' class='select-client' id='client_select_"+clientId+"' value="+clientId+"/>");
    $(".client_table_row_template .col-client-title").html(clientTitle );
    $(".client_table_row_template .col-client-description").html(clientDescription );
    
    return $(".client_table_row_template tbody").html();
  }

$(document).ready(function() {
                console.log('Veikia');
        
$('#page1').click(function(){
            let page = $(this).attr('data-page');
        
        $.ajax({
         type: 'GET',
         url: 'http://127.0.0.1:8000/api/clients?page='+page,
         success: function(data) {
          console.log(data);
         }

        });
    });

         $.ajax({
         type: 'GET',
         url: 'http://127.0.0.1:8000/api/clients',
         //data: {type_title: type_title, type_description: type_description  },
         success: function(data) {
          
          console.log(data);
                 
       }
    });
});


        </script>
    </body>

    


</html>
