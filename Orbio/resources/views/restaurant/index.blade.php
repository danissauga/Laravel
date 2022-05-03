@extends('layouts.app')
@section('content')

<style>
th div {
  cursor: pointer;
}
</style>

<div class="container">
<h3>Restaurant`s list</h3>
<div class="row pb-3">
  <div class="col-md-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restaurantCreate">
      Add new restaurant
    </button>
    <a class="btn btn-primary" href="" >
      Reservations list
    </a>
    <button type="button" id="delete-selected-restaurants" class="btn btn-danger">
      Delete selected
    </button>
  </div>
  <div class="col-md-3">
        <input id="restaurantSearchBox" class="form-control" minlength="3" name="restaurantSearchBox" placeholder="Search">
        <span class="search-feedback alert-danger"></span>
  </div>
    <input id="hidden-sort" type="hidden" value="id" />
    <input id="hidden-direction" type="hidden" value="asc" />
    
    <div id="alert" class="alert alert-success d-none"></div>
</div>

<table id="restaurant-table" class="table table-striped">
  <thead>
        <tr>
            <th><div class="restaurant-sort" data-sort="id" data-direction="asc">ID</div></th>
            <th style="width: 20px;"><input type="checkbox" id="select_all_restaurants"/></th>
            <th><div class="restaurant-sort" data-sort="title" data-direction="asc">Restaurant title</div></th>
            <th><div class="restaurant-sort" data-sort="table_count" data-direction="asc">Table count</div></th>
            <th><div class="restaurant-sort" data-sort="work_time" data-direction="asc">Work time</div></th>
            <th style="width: 250px;">Actions</th>
        </tr>
  </thead>
  <tbody id="restaurant-table-body">
        @foreach ($restaurants as $restaurant)
        <tr class="restaurant{{$restaurant->id}}">
            <td class="col-restaurant-id">{{$restaurant->id}}</td>
            <td class="col-restaurant-select"><input type="checkbox" class="select-restaurant" id="restaurant_select_{{$restaurant->id}}" value="{{$restaurant->id}}"/></td>
            <td class="col-restaurant-title">{{$restaurant->title}}</td>
            <td class="col-restaurant-table-count">{{$restaurant->tables_count}}</td>
            <td class="col-restaurant-work-time">{{$restaurant->work_time_from}} - {{$restaurant->work_time_till}}</td>
            <td>
                <button class="btn btn-danger delete-restaurant" type="submit" data-restaurantId="{{$restaurant->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-restaurant" data-bs-toggle="modal" data-bs-target="#showRestaurant" data-restaurantId="{{$restaurant->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-restaurant" data-bs-toggle="modal" data-bs-target="#editRestaurant" data-restaurantId="{{$restaurant->id}}">Edit</button>
           </td>
        </tr>
        @endforeach
  </tbody>
    </table>
   
        {!! $restaurants->appends(Request::except('page'))->render() !!}
   

</div>

@endsection   