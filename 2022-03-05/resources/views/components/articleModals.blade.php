<!-- Create Modal -->
<div class="modal fade" id="articleCreate" tabindex="-1" aria-labelledby="articleCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articleCreateModalLabel">Add new  article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="articleAjaxForm">
            <div class="form-group">
                <label for="article_title">Article title</label>
                <input id="article_title" class="form-control" type="text" name="article_title" />
            </div>
            <div class="form-group">
                <label for="article_description">Article Description</label>
                <input id="article_description" class="form-control" type="text" name="article_description" />
            </div>
            <div class="form-group">
            <label for="article_type_id">Article Type ID</label>
                <select class='form-select' id="article_type_id" name="article_type_id">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->title}} </option>
                @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="modal-footer">
         <input hidden id="article_store_link" type="text" value="{{ route('article.storeAjax')}}"/>
         <button type="button" id="storeNewArticleClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button id="storeNewArticle" type="button" class="btn btn-primary">Add article</button>
        </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editArticle" tabindex="-1" aria-labelledby="editArticleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editArticlelLabel">Edit Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="articleAjaxForm">
            <div class="form-group">
                <label for="edit_article_title">Article title</label>
                <input id="edit_article_title" class="form-control" type="text" name="edit_article_title" />
            </div>
            <div class="form-group">
                <label for="edit_article_description">Article Description</label>
                <input id="edit_article_description" class="form-control" type="text" name="edit_article_description" />
            </div>
            <div class="form-group">
            <label for="edit_article_type_id">Article Type ID</label>
                <select class='form-select' id="edit_article_type_id" name="edit_article_type_id">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->title}} </option>
                @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <input type="hidden" id="edit_article_id" name="edit_type_id" />
        <input hidden id="article_edit_link" type="text" value="/articles/showAjax/"/>
         <input hidden id="article_update_link" type="text" value="/articles/updateAjax/"/>
          <button type="button" id="editArticleModalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="updateArticleContent" type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

<!-- Show Article Modal -->
<div class="modal fade" id="showArticle" tabindex="-1" aria-labelledby="showArticleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showArticleLabel">Show Type details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="show-article-id">
            </div>
            <div class="show-article-type-title">
            </div>
            <div class="show-article-title">
            </div>
            <div class="show-article-description">
            </div>
        </div>
        <div class="modal-footer">
        <input hidden id="article_show_link" type="text" value="articles/showAjax/"/>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<script src="{{ asset('js/articleModals.js') }}"></script>  