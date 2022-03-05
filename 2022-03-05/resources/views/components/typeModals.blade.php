
<!-- Create Modal -->
<div class="modal fade" id="typeCreate" tabindex="-1" aria-labelledby="typeCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="typeCreateModalLabel">Add new type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="ajaxForm">
            <div class="form-group">
                <label for="type_title">Type title</label>
                <input id="type_title" class="form-control" type="text" name="type_title" />
            </div>
            <div class="form-group">
                <label for="type_description">Type Description</label>
                <input id="type_description" class="form-control" type="text" name="type_description" />
            </div>
        </div>
        </div>
        <div class="modal-footer">
         <input hidden id="type_store_link" type="text" value="{{ route('type.storeAjax')}}"/>
         <button type="button" id="storeNewTypeClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button id="storeNewType" type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editType" tabindex="-1" aria-labelledby="editTypeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTypelLabel">Edit Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="ajaxForm">
            <input type="hidden" id="edit_type_id" name="type_id" />
            <div class="form-group">
                <label for="type_name">Type title</label>
                <input id="edit_type_name" class="form-control" type="text" name="type_name" />
            </div>
            <div class="form-group">
                <label for="type_description">Type Description</label>
                <input id="edit_type_description" class="form-control" type="text" name="type_description" />
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <input hidden id="type_edit_link" type="text" value="{{ route('type.showAjax',['type'=>$type])}}"/>
         <input hidden id="type_update_link" type="text" value="{{ route('type.updateAjax',['type'=>$type])}}"/>
          <button type="button" id="editTypeModalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="update-type" type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
<script src="{{ asset('js/typeModals.js') }}"></script>  