<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
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
    <button class="btn btn-primary" id="show-create-image-modal" data-bs-toggle="modal" data-bs-target="#createImageModal" >Add image</button>    
        <table id="image-table" class="table table-striped">
        <thead>
            <tr>
                <th><div class="image-sort" data-sort="id" data-direction="asc">ID</div></th>
                <th><div class="image-sort" data-sort="title" data-direction="asc">Title</div></th>
                <th><div class="image-sort" data-sort="alt" data-direction="asc">Alt</div></th>
                <th><div class="image-sort" data-sort="image" data-direction="asc">image</div></th>
                <th><div class="image-sort" data-sort="description" data-direction="asc">Description</div></th>
                <th>Tools</th>
            </tr>
        </thead>
            <tbody id="image-table-body">

            </tbody>
        </table>
        <div id="search-alert" class="alert d-none">
        </div>

        <!-- Table add content template -->
        <table class="image_table_row_template d-none">
            <tr>
            <td class="col-image-id"></td>
            <td style="width:200px;" class="col-image-title"></td>
            <td class="col-image-alt"></td>
            <td class="col-image-url"></td>
            <td class="col-image-description"></td>
            <td>
                <button class="btn btn-danger delete-image" type="submit" data-imageid="">DELETE</button>
                <button type="button" class="btn btn-primary show-image" data-bs-toggle="modal"
                       data-bs-target="#showImageModal" data-imageid="">Show</button>
                <button type="button" class="btn btn-secondary edit-image" data-bs-toggle="modal"
                       data-bs-target="#editImageModal" data-imageid="">Edit</button>
            </td>
            </tr>
        </table>

        <div class="button-container">
        </div>

    </div>

    <div class="modal fade" id="createImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add image</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="ajaxForm">
                    <div class="form-group">
                        <label for="image_title">Image title</label>
                        
                        <input id="image_title" class="form-control create-input" type="text" name="image_title" />

                        <span class="invalid-feedback input_image_title">
                        </span>
                      </div>
                    <div class="form-group">
                        <label for="image_alt">Image ALT record</label>
                        <input id="image_alt" class="form-control create-input" type="text" name="image_alt" />
                        <span class="invalid-feedback input_image_alt">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image link</label>
                        <input id="image_url" class="form-control create-input" type="text" name="image_url" />
                        <select id="image_url_select" class="form-select d-none" name="image_url_select">
                            <option val="all">all photos</select>
                        </select>
                        <list>
                            <input type="checkbox" id="url_type"> - select image from list
                        </list>
                        <span class="invalid-feedback input_image_url">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="image_description">Image Description</label>
                        <input id="image_description" class="form-control create-input" type="text" name="image_description" />
                        <span class="invalid-feedback input_image_description">
                        </span>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="close_add" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button id="create-image" type="button" class="btn btn-primary">Add image</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="ajaxForm">
                    <input type="hidden" id="edit_image_id" name="image_id" />
                    <div class="form-group">
                        <label for="image_title">Image Title</label>
                        <input id="edit_image_title" class="form-control" type="text" name="image_title" />
                    </div>
                    <div class="form-group">
                        <label for="image_alt">Image ALT</label>
                        <input id="edit_image_alt" class="form-control" type="text" name="image_alt" />
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input id="edit_image_url" class="form-control" type="text" name="image_url" />
                    </div>
                    <div class="form-group">
                        <label for="image_description">Image Description</label>
                        <input id="edit_image_description" class="form-control" type="text" name="image_description" />
                    </div>
                    
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="close-edit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="update-image" type="button" class="btn btn-primary update-image">Update image</button>
                </div>
              </div>
            </div>
          </div>

<div class="modal fade" id="showImageModal" tabindex="-1" aria-labelledby="showImageLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showImageLabel">Show Image details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="show-image-id">
            </div>
            <div class="show-image-title">
            </div>
            <div class="show-image-alt">
            </div>
            <div class="show-image-url">
            </div>
            <div class="show-image-description">
            </div>
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
function paginateButtons(buttons){
    $.each(buttons, function(key, link) {
        console.log(buttons);
            let button;
            if (link.url != null) {
                if (link.active == true) {
                    button = "<button class='btn btn-primary active' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                    $('.button-container').append(button);
                } else {
                    button = "<button class='btn btn-primary' type='button' data-page='"+link.url +"'>" + link.label+" </button>";
                    $('.button-container').append(button);
        }
    }
});
}

function createImageRow(image) {
    $(".image_table_row_template tr").removeAttr("class");
    $(".image_table_row_template tr").addClass("image"+image.id);
    $(".image_table_row_template .delete-image").attr('data-imageid', image.id );
    $(".image_table_row_template .show-image").attr('data-imageid', image.id );
    $(".image_table_row_template .edit-image").attr('data-imageid', image.id );
    $(".image_table_row_template .col-image-id").html(image.id);
    $(".image_table_row_template .col-image-title").html(image.title);
    $(".image_table_row_template .col-image-alt").html(image.alt );
    $image = "<img style='width:100px;height:100px' src='"+image.url+"'/>";
    $(".image_table_row_template .col-image-url").html($image);
    $(".image_table_row_template .col-image-description").html(image.description );

    return $(".image_table_row_template tbody").html();
  }

function securtyKey() {
    return "test_api_key_123";
}

$(document).ready(function() {
            //    console.log('Veikia');
       //    var csrf_key="test_api_key_123";



$(document).on('click', '.button-container button',function() {

var csrf_key = securtyKey();
let page= $(this).attr('data-page');
    
    $.ajax({
        type: 'GET',
        url: page,
        data: {csrf:csrf_key},
        success: function(data) {
        $('#image-table-body').html('');
        $('.button-container').html('');

       $.each(data.data, function(key, image) {

           let html;
           html = createImageRow(image);
           $('#image-table-body').append(html);
       });

    paginateButtons(data.links);
     
    }
});
});
var csrf_key = securtyKey();
$.ajax({
         type: 'GET',
         url: 'http://127.0.0.1:8000/api/images',
         data: {csrf:csrf_key},
         success: function(data) {
           
        $.each(data.data, function(key, image) {
            let html;
            html = createImageRow(image);
            $('#image-table-body').append(html);
            });
        paginateButtons(data.links); 
        }
        
});

$(document).on('click', '#url_type', function() {
    let csrf_key;
    scrf_key = securtyKey();      
    console.log(scrf_key);

   if ($("#url_type").is(':checked') == true) {
      
         $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/api/images',
                data: {scrf: scrf_key},
                success: function(data) {
                console.log(data)
                }
      });

      $('#image_url_select').removeClass('d-none');
      $('#image_url').addClass('d-none'); 

   } else {
      $('#image_url_select').addClass('d-none');
      $('#image_url').removeClass('d-none');  
   }

});

$(document).on('click', '#create-image', function() {
                var csrf_key = securtyKey();
                let image_title = $('#image_title').val();
                let image_alt = $('#image_alt').val();
                let image_scr = $('#image_scr').val();
                let image_url = $('#image_url').val();
                let image_description = $('#image_description').val();
                $.ajax({
                        type: 'POST',
                        url: 'http://127.0.0.1:8000/api/images',
                        data: {scrf:scrf_key, image_title:image_title, image_alt:image_alt, image_url:image_url, image_description:image_description },
                        success: function(data) {
                            console.log(data)
                        }
                });
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/images',
                    data: {csrf:csrf_key},
                    success: function(data) {
                       
                        $('#image-table-body').html('');
                        $('.button-container').html('');
                        $.each(data.data, function(key, image) {

                        let html;
                        html = createImageRow(image);
                        $('#image-table-body').append(html);
                        });

                        paginateButtons(data.links);
                        $('#close_add').click();
                    }            
        });

});

$(document).on('click', '.edit-image',function() {
                
                var csrf_key = securtyKey();
                let imageid = $(this).attr('data-imageid');
                
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/images/'+imageid,
                    data: {csrf:csrf_key},
                    success: function(data) {
                        $('#edit_image_id').val(data.id);
                        $('#edit_image_title').val(data.title);
                        $('#edit_image_alt').val(data.alt);
                        $('#edit_image_url').val(data.url);
                        $('#edit_image_description').val(data.description);
                    }
                });
            });

$(document).on('click', '.show-image',function() {
                
                var csrf_key = securtyKey();
                let imageid = $(this).attr('data-imageid');
                
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/images/'+imageid,
                    data: {csrf:csrf_key},
                    success: function(data) {
                        
                        $(".show-image-id").html(data.id);
                        $(".show-image-title").html(data.title);
                        $(".show-image-alt").html(data.alt);
                        $(".show-image-url").html(data.url);
                        $(".show-image-description").html(data.description);
        
                    }
                });
            });

$(document).on('click', '#update-image',function() {
                
                var csrf_key = securtyKey();
                let imageid = $('#edit_image_id').val();
                let image_title = $('#edit_image_title').val();
                let image_alt = $('#edit_image_alt').val() ;
                let image_url = $('#edit_image_url').val() ;
                let image_description = $('#edit_image_description').val() ;
                $.ajax({
                        type: 'PUT',
                        url: 'http://127.0.0.1:8000/api/images/'+imageid,
                        data: {csrf:csrf_key, image_title:image_title, image_alt:image_alt, image_url:image_url, image_description:image_description },
                        success: function(data) {
                          //  console.log(data)
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/images',
                    data: {csrf:csrf_key},
                    success: function(data) {
                       
                        $('#image-table-body').html('');
                        $('.button-container').html('');
                        $.each(data.data, function(key, image) {

                            let html;
                            html = createImageRow(image);
                            $('#image-table-body').append(html);
                        });
                       
                    paginateButtons(data.links);
                      
                    }            
                 });
                 $('#close-edit').click(); 
                }
                });
        });
        $(document).on('click', '.delete-image',function() {
                var csrf_key = securtyKey();
                let imageid = $(this).attr('data-imageid');
                $.ajax({
                    type: 'DELETE',
                    url: 'http://127.0.0.1:8000/api/images/'+imageid,
                    data: {csrf:csrf_key},
                    success: function(data) {
                      // console.log(data)
                $.ajax({
                        type: 'GET',
                        url: 'http://127.0.0.1:8000/api/images',
                        data: {csrf:csrf_key},
                        success: function(data) {
                       
                        $('#image-table-body').html('');
                        $('.button-container').html('');
                        $.each(data.data, function(key, image) {

                        let html;
                        html = createImageRow(image);
                        $('#image-table-body').append(html);
                });
                       
                    paginateButtons(data.links);

                    }            
                 });
                    }
                });
                

            });
});

</script>
</body>
</html>