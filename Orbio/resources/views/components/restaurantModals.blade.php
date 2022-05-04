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