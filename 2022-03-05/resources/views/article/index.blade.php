@extends('layouts.app')
@section('content')

<div class="container">
<h3>Article`s list</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleCreate">
  Add new Type
</button>
<div id="alert" class="alert alert-success d-none">
</div>
<table id="article-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th style="width: 20px;"><input type="checkbox" id="select_all_articles"/></th>
            <th>Type</th>
            <th>Title</th>
            <th>Description</th>
            <th style="width: 250px;">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr class="article{{$article->id}}">
            <td class="col-article-id">{{$article->id}}</td>
            <td class="col-article-select"><input type="checkbox" class="select-article" id="article_select_{{$article->id}}"/></td>
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
    </table>
</div>
<!-- Table add content template -->
<table class="article_table_row_template d-none">
        <tr class="article{{$article->id}}">
          <td class="col-article-id"></td>
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