

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
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button id="storeNewType" type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>

