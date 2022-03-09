$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });

  function createArticleRow(articleId, articleTypeId, articleTitle, articleDescription) {
    $(".article_table_row_template tr").addClass("article"+articleId);
    $(".article_table_row_template .delete-article").attr('data-articleid', articleId );
    $(".article_table_row_template .show-article").attr('data-articleid', articleId );
    $(".article_table_row_template .edit-article").attr('data-articleid', articleId );
    $(".article_table_row_template .col-article-id").html(articleId );
    $(".article_table_row_template .col-article-type-id").html(articleTypeId );
    $(".article_table_row_template .col-article-title").html(articleTitle );
    $(".article_table_row_template .col-article-description").html(articleDescription );
    
    return $(".article_table_row_template tbody").html();
  }

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
    
    article_type_id = $('#article_type_id').val();
    article_title = $('#article_title').val();
    article_description = $('#article_description').val();
    article_store_link = $('#article_store_link').val();

   console.log(article_title + " " + article_store_link);

    $.ajax({
         type: 'POST',
         url: article_store_link,
         data: {article_type_id: article_type_id, article_title: article_title, article_description: article_description},
         success: function(data) {
          
          console.log(data);
       let html;
       html = createArticleRow(data.articleId, data.articleTypeId, data.articleTitle, data.articleDescription);

    //   console.log(html);
            $("#article-table").append(html);
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
