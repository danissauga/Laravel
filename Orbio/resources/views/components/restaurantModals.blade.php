<!-- Edit Modal -->
<div class="modal fade" id="editRestaurant" tabindex="-1" aria-labelledby="editRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRestaurantlLabel">Edit Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="restaurantAjaxForm">
            <div class="form-group">
                <label for="edit_restaurant_title">Restaurant title</label>
                <input id="edit_restaurant_title" class="form-control" type="text" required name="edit_restaurant_title" />
                <span class="invalid-feedback input_edit_restaurant_title">
            </div>
            <div class="form-group">
                <label for="edit_restaurant_tables_count">Restaurant tables count</label>
                <input id="edit_restaurant_tables_count" class="form-control" type="text" required name="edit_restaurant_tables_count" />
                <span class="invalid-feedback input_edit_restaurant_tables_count">
            </div>
            <div class="form-group">
                <label for="edit_restaurant_work_time_from">Restaurant work from</label>
                <input id="edit_restaurant_work_time_from" class="form-control" type="time" required name="edit_restaurant_work_time_from" />
                <span class="invalid-feedback input_edit_restaurant_work_time_from">
            </div>
            <div class="form-group">
                <label for="edit_restaurant_work_time_till">Restaurant work till</label>
                <input id="edit_restaurant_work_time_till" class="form-control" type="time" required name="edit_restaurant_work_time_till" />
                <span class="invalid-feedback input_edit_restaurant_work_time_till">
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <input hidden id="edit_restaurant_id" name="edit_restaurant_id" />
        <input hidden id="restaurant_edit_link" type="text" value="/restaurants/showAjax/"/>
         <input hidden id="restaurant_update_link" type="text" value="/restaurants/updateAjax/"/>
          <button type="button" id="editRestaurantModalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="updateRestaurantContent" type="button" class="btn btn-primary updateRestaurantContent">Update</button>
        </div>
      </div>
    </div>
  </div>
<!-- Show Restaurant Modal -->
<div class="modal fade" id="showRestaurant" tabindex="-1" aria-labelledby="showRestaurantLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showRestaurantLabel">Show Restaurant details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="show-restaurant-id">
            </div>
            <div class="show-restaurant-title">
            </div>
            <div class="show-restaurant-tables-count">
            </div>
            <div class="show-restaurant-work-time">
            </div>
        </div>
        <div class="modal-footer">
        <input hidden id="restaurant_show_link" type="text" value="restaurants/showAjax/"/>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>