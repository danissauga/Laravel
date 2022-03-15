@extends('layouts.app')
@section('content')

<style>
th div {
  cursor: pointer;
}
</style>

<div class="container">
<h3>Article`s list</h3>
<!-- Button trigger modal -->
<div class="row">
  <div class="col-md-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleCreate">
      Add new Type
    </button>
    <a class="btn btn-primary" href="{{ route('type.index') }}" >
      Type list
    </a>
    <button type="button" id="delete-selected-articles" class="btn btn-danger">
      Delete selected
    </button>
  </div>
  <div class="col-md-3">
       <select class="form-select" name="article_type" id="article_type">
          <option selected value="all">Visi įrašai</option>
          @foreach ($types as $type)
             <option value="{{ $type->id }}">{{ $type->title }}</option>
          @endforeach
       </select>
  </div>
  <div class="col-md-3">
        <input id="articleSearchBox" class="form-control" minlength="3" name="articleSearchBox" placeholder="Search">  
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
<table id="article-table" class="table table-striped">
  <thead>
        <tr>
            <th><div class="article-sort" data-sort="id" data-direction="asc">ID</div></th>
            <th style="width: 20px;"><input type="checkbox" id="select_all_articles"/></th>
            <th><div class="article-sort" data-sort="type_id" data-direction="asc">Type</div></th>
            <th><div class="article-sort" data-sort="title" data-direction="asc">Title</div></th>
            <th><div class="article-sort" data-sort="description" data-direction="asc">Description</div></th>
            <th style="width: 250px;">Action</th>
        </tr>
  </thead>
  <tbody id="article-table-body">
        @foreach ($articles as $article)
        <tr class="article{{$article->id}}">
            <td class="col-article-id">{{$article->id}}</td>
            <td class="col-article-select"><input type="checkbox" class="select-article" id="article_select_{{$article->id}}" value="{{$article->id}}"/></td>
            <td class="col-article-type-id">{{$article->articleHasType->title}}</td>
            <td class="col-article-title">{{$article->title}}</td>
            <td class="col-article-description">{{$article->description}}</td>
            <td>           
                <button class="btn btn-danger delete-article" type="submit" data-articleId="{{$article->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-article" data-bs-toggle="modal" data-bs-target="#showArticle" data-articleId="{{$article->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-article" data-bs-toggle="modal" data-bs-target="#editArticle" data-articleId="{{$article->id}}">Edit</button>        
           </td>
        </tr>
        @endforeach
  </tbody>
    </table>
    <div id="search-alert" class="alert d-none">
    </div>
</div>
<!-- Table add content template -->
<table class="article_table_row_template d-none">

        <tr class="article{{$article->id}}">
          <td class="col-article-id"></td>
          <td class="col-article-select"></td>
          <td class="col-article-type-id"></td>
          <td class="col-article-title"></td>
          <td class="col-article-description"></td>
          <td>
            <button class="btn btn-danger delete-article" type="submit" data-articleId="">DELETE</button>
            <button type="button" class="btn btn-primary show-article" data-bs-toggle="modal" data-bs-target="#showArticle" data-articleId="">Show</button>
            <button type="button" class="btn btn-secondary edit-article" data-bs-toggle="modal" data-bs-target="#editArticle" data-articleId="">Edit</button>
          </td>
        </tr>
    </table>  

@endsection