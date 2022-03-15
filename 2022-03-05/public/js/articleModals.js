$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

  function createArticleRow(articleId, articleTypeId, articleTitle, articleDescription) {
    $(".article_table_row_template tr").removeAttr("class");
    $(".article_table_row_template tr").addClass("article"+articleId);
    $(".article_table_row_template .delete-article").attr('data-articleid', articleId );
    $(".article_table_row_template .show-article").attr('data-articleid', articleId );
    $(".article_table_row_template .edit-article").attr('data-articleid', articleId );
    $(".article_table_row_template .col-article-id").html(articleId );
    $(".article_table_row_template .col-article-select").html("<input type='checkbox' class='select-article' id='article_select_"+articleId+"' value="+articleId+"/>");
    $(".article_table_row_template .col-article-type-id").html(articleTypeId );
    $(".article_table_row_template .col-article-title").html(articleTitle );
    $(".article_table_row_template .col-article-description").html(articleDescription );
    
    return $(".article_table_row_template tbody").html();
  }

  $(document).on('click', '.delete-article', function() {
    let articleId;
    articleId = $(this).attr('data-articleId');
    console.log(articleId);

    $.ajax({
        type: 'POST',
        url: '/articles/deleteAjax/' + articleId,
        success: function(data) {
           console.log(data);

           if($.isEmptyObject(data.errorMessage)) {
            //sekmes atveji
            $('#alert').removeClass('alert-danger');
            $('#alert').addClass('alert-success');
            $("#alert").removeClass("d-none");
            $('.article'+articleId).remove();
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

$(document).on('click', '.edit-article', function() {
    let articleId;
    let article_edit_link;
    articleId = $(this).attr('data-articleid');
    article_edit_link = $("#article_edit_link").val();
    
      $.ajax({
          type: 'GET',
          url: article_edit_link + articleId,
          success: function(data) {
            //  console.log(data.articleTypeId);
            $('#edit_article_id').val(data.articleId);
            $('#edit_article_title').val(data.articleTitle);
            $('#edit_article_description').val(data.articleDescription);

            $("#edit_article_type_id").find("option").each(function() {            
                if($(this).val() == data.articleTypeId) {  
                    $(this).attr("selected", "selected"); 
                }
            });        
            
          }
      });

});

$("#updateArticleContent").on('click', function() {
    let articleId;
    let article_title;
    let article_type_id;
    let article_description;
    let article_update_link;

    articleId = $('#edit_article_id').val();
    article_type_id = $('#edit_article_type_id').val();
    article_title = $('#edit_article_title').val();
    article_description = $('#edit_article_description').val();
    article_update_link = $('#article_update_link').val();

    

    console.log(article_title);
    $.ajax({
          type: 'POST',
          url: article_update_link + articleId ,
          data: {article_type_id: article_type_id, article_title: article_title, article_description: article_description},
          success: function(data) {
            
            $(".article"+articleId+ " " + ".col-article-type-id").html(data.articleTypeTitle)
            $(".article"+articleId+ " " + ".col-article-title").html(data.articleTitle)
            $(".article"+articleId+ " " + ".col-article-description").html(data.articleDescription)
            $( "#editArticleModalClose" ).click(); 
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


  $("#storeNewArticle").on('click',(function() {
    let article_title;
    let article_type_id;
    let article_description;
    let article_store_link;
    let sort;
    let direction;

    sort = $('#hidden-sort').val();
    direction = $('#hidden-direction').val();
    
    article_type_id = $('#article_type_id').val();
    article_title = $('#article_title').val();
    article_description = $('#article_description').val();
    article_store_link = $('#article_store_link').val();

   console.log(article_title + " " + article_store_link);

    $.ajax({
         type: 'POST',
         url: article_store_link,
         data: {article_type_id: article_type_id, article_title: article_title, article_description: article_description, sort:sort, direction:direction},
         success: function(data) {
          
         //console.log(data);
         $("#article-table tbody").html('');
         $.each(data.articles, function(key, article) {
          let html;
           html = createArticleRow(article.id,article.type_title,article.title,article.description,);
           $("#article-table tbody").append(html);
          });
    
            $( "#storeNewArticleClose" ).click();        

            $("#alert").removeClass("d-none");
            $("#alert").html(data.successMessage +" " + data.articleTitle);
            $('#article_title').val('');
            $('#article_description').val('');
            
            setTimeout(() => {
                $('#alert').addClass('d-none');
              }, 2000);
              
       }
    });

}));

$(document).on('click', '.show-article', function() {
    let articleId; 
    let article_show_link;
    articleId = $(this).attr('data-articleId');
    article_show_link = $("#article_show_link").val();
    console.log(articleId);

    $.ajax({
        type: 'GET',
        url: article_show_link + articleId,
        success: function(data) {
            $('.show-article-id').html(data.articleId);
            $('.show-article-type-title').html(data.articleTypeTitle);
            $('.show-article-title').html(data.articleTitle);
            $('.show-article-description').html(data.articleDescription);
         }
    });

});


$('#select_all_articles').on('click', function () {
  
  let status = $(this).prop('checked'); 
    $(".select-article").each( function() {  
    $(this).prop("checked",status);
    });

});
$('#delete-selected-articles').on('click', function () {
    $('#article-table-body input[type=checkbox]:checked').each(function () {
      //  console.log(this.value);
      let articleId = this.value;
        $.ajax({
          type: 'POST',
          url: '/articles/deleteAjax/' + articleId,
          success: function(data) {
            // console.log(data);
  
             if($.isEmptyObject(data.errorMessage)) {
              //sekmes atveji
              $('#alert').removeClass('alert-danger');
              $('#alert').addClass('alert-success');
              $("#alert").removeClass("d-none");
              $('.article'+articleId).remove();
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
      $("#select_all_articles").prop("checked",false);
      $(".select-article").each( function() {  
        $(this).prop("checked",false);
        });
      setTimeout(() => {
        $('#alert').addClass('d-none');
      }, 2000);
  
    });
  });

function search_article(searchValue) {

    let searchFieldCount= searchValue.length;
      if (searchFieldCount >= 1 && searchFieldCount < 3 ) {
   
       $(".search-feedback").css('display', 'block');
       $(".search-feedback").html("Min 3");
      
     } 
     else {
       $(".search-feedback").css('display', 'none');
   
     $.ajax({
           type: 'GET',
           url: 'articles/searchAjax',
           data: {searchValue: searchValue},
           success: function(data) {
                 console.log(data);
   
              if($.isEmptyObject(data.errorMessage)) {
               //sekmes atvejis
               $("#article-table tbody").show();
               $("#search-alert").addClass("d-none");
               $("#article-table tbody").html('');
                $.each(data.articles, function(key, article) {
                    let html;
                     html = createArticleRow(article.id,article.type_title,article.title,article.description,);
                     $("#article-table tbody").append(html);
                });
              } 
             else {
               //nesekmes atveju
                   $("#article-table tbody").hide();
                   $('#search-alert').addClass('alert-danger');
                   $("#search-alert").removeClass("d-none");
                   $("#search-alert").html(data.errorMessage);
             }
         }
       });
      }
     } 

     function select_article_by_type(article_type) {
                 
       $.ajax({
             type: 'GET',
             url: 'articles/selectByTypeAjax',
             data: {article_type: article_type},
             success: function(data) {
                   console.log(data);
     
                if($.isEmptyObject(data.errorMessage)) {
                 //sekmes atvejis
                 $("#article-table tbody").show();
                 $("#search-alert").addClass("d-none");
                 $("#article-table tbody").html('');
                  $.each(data.articles, function(key, article) {
                      let html;
                       html = createArticleRow(article.id,article.type_title,article.title,article.description,);
                       $("#article-table tbody").append(html);
                  });
                } 
               else {
                 //nesekmes atveju
                     $("#article-table tbody").hide();
                     $('#search-alert').addClass('alert-danger');
                     $("#search-alert").removeClass("d-none");
                     $("#search-alert").html(data.errorMessage);
               }
           }
         });
        } 


$(document).on('input', '#articleSearchBox', function() { 
     let searchContent = $('#articleSearchBox').val();
     search_article(searchContent);     
});

$('.article-sort').click(function() {
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

  $.ajax({
        type: 'GET',
        url: 'articles/indexAjax',
        data: {sort: sort, direction: direction },
        success: function(data) {
          
            $("#article-table tbody").html('');
            $.each(data.articles, function(key, article) {
                   let html;
                   html = createArticleRow(article.id, article.article_has_type.title, article.title, article.description);
                   $("#article-table tbody").append(html);
              });
        }
    });
});

$(document).on('change', '#article_type', function() { 
  let type = $('#article_type').val();
  select_article_by_type(type);     
});