@extends('layouts.app')
@section('content')

<div class="container">
<h3>Type`s list</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#typeCreate">
  Add new Type
</button>
<div id="alert" class="alert alert-success d-none">
</div>
<table id="type-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($types as $type)
        <tr class="type{{$type->id}}">
            <td class="col-type-id">{{$type->id}}</td>
            <td class="col-type-title">{{$type->title}}</td>
            <td class="col-type-description">{{$type->description}}</td>
            <td>           
                <button class="btn btn-danger delete-type" type="submit" data-typeid="{{$type->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showClientModal" data-typeid="{{$type->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editType" data-typeid="{{$type->id}}">Edit</button>        
           </td>
        </tr>
        @endforeach
    </table>
</div>
<!-- Table add content template -->
<table class="type_table_row_template d-none">
        <tr>
          <td class="col-type-id"></td>
          <td class="col-type-title"></td>
          <td class="col-type-description"></td>
          <td>
            <button class="btn btn-danger delete-type" type="submit" data-typeid="">DELETE</button>
            <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showClientModal" data-typeid="">Show</button>
            <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editClientModal" data-typeid="">Edit</button>
          </td>
        </tr>
    </table>  

@endsection