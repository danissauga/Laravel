@extends('layouts.app')
@section('content')
<style>
th div {
  cursor: pointer;
}
</style>

<div class="container">
<h3>Type`s list</h3>
<!-- Button trigger modal -->
<div class="row">
  <div class="col-md-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#typeCreate">
      Add new Type
    </button>
    <a class="btn btn-primary" href="{{ route('article.index') }}">
      Article list
      </a>
      <button type="button" id="delete-selected" class="btn btn-danger">
      Delete selected
      </button>
  </div>
  <div class="col-md-3">
        <input id="typeSearchBox" class="form-control" minlength="3" name="typeSearchBox" placeholder="Search">  
        <span class="search-feedback alert-danger"></span>
  </div>
  <!-- <div class="col-md-1">
        <button type="button" id="search-type" class="btn btn-secondary">
          Search
        </button> 
  </div>   -->
</div>

<div id="alert" class="alert alert-success d-none">
</div>

<input id="hidden-sort" type="hidden" value="id" />
<input id="hidden-direction" type="hidden" value="asc" />

<table id="type-table" class="table table-striped">
    <thead>
        <tr>
            <th><div class="type-sort" data-sort="id" data-direction="asc">ID</div></th>
            <th style="width: 20px;"><input type="checkbox" id="select_all_types"/></th>
            <th><div class="type-sort" data-sort="title" data-direction="asc">Title</div></th>
            <th><div class="type-sort" data-sort="description" data-direction="asc">Description</div></th>
            <th style="width: 250px;">Action</th>
        </tr>
    </thead>
        <tbody id="type-table-body">
        @foreach ($types as $type)
        <tr class="type{{$type->id}}">
            <td class="col-type-id">{{$type->id}}</td>
            <td class="col-type-select"><input type="checkbox" class="select-type" id="type_select_{{$type->id}}" value="{{$type->id}}"/></td>
            <td class="col-type-title">{{$type->title}}</td>
            <td class="col-type-description">{{$type->description}}</td>
            <td >           
                <button class="btn btn-danger delete-type" type="submit" data-typeId="{{$type->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showType" data-typeId="{{$type->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editType" data-typeId="{{$type->id}}">Edit</button>        
           </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div id="search-alert" class="alert d-none">
    </div>
</div>
<!-- Table add content template -->
<table class="type_table_row_template d-none">
        <tr>
          <td class="col-type-id"></td>
          <td class="col-type-select"></td>
          <td class="col-type-title"></td>
          <td class="col-type-description"></td>
          <td style="width: 250px;">
            <button class="btn btn-danger delete-type" type="submit" data-typeId="">DELETE</button>
            <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showType" data-typeId="">Show</button>
            <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editType" data-typeId="">Edit</button>
          </td>
        </tr>
    </table>  

@endsection