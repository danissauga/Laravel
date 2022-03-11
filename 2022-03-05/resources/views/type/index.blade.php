@extends('layouts.app')
@section('content')

<div class="container">
<h3>Type`s list</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#typeCreate">
  Add new Type
</button>
<a class="btn btn-primary" href="{{ route('article.index') }}" >
  Article list
</a>
<div id="alert" class="alert alert-success d-none">
</div>
<table id="type-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th style="width: 20px;"><input type="checkbox" id="select_all_types"/></th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($types as $type)
        <tr class="type{{$type->id}}">
            <td class="col-type-id">{{$type->id}}</td>
            <td class="col-type-select"><input type="checkbox" class="select-type" id="type_select_{{$type->id}}"/></td>
            <td class="col-type-title">{{$type->title}}</td>
            <td class="col-type-description">{{$type->description}}</td>
            <td>           
                <button class="btn btn-danger delete-type" type="submit" data-typeId="{{$type->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showType" data-typeId="{{$type->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editType" data-typeId="{{$type->id}}">Edit</button>        
           </td>
        </tr>
        @endforeach
    </table>
</div>
<!-- Table add content template -->
<table class="type_table_row_template d-none">
        <tr>
          <td class="col-type-id"></td>
          <td class="col-type-select"></td>
          <td class="col-type-title"></td>
          <td class="col-type-description"></td>
          <td>
            <button class="btn btn-danger delete-type" type="submit" data-typeId="">DELETE</button>
            <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showType" data-typeId="">Show</button>
            <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editType" data-typeId="">Edit</button>
          </td>
        </tr>
    </table>  

@endsection