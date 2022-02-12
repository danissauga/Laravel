@extends('layouts.app')
@section('content')

<div class="container">
<h1> Clients list </h1>
<a class="btn btn-primary" href="{{route('client.create') }}">Add Client</a> 

@if (count($clients) == 0)
            <p>There is no products</p>
        @endif

        @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                    success_message
                </div>
        @endif
   
<table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surename</td>
            <td>Phone</td>
            <th style="width: 50px;" colspan="2">Action</th>  
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->surename }}</td>
            <td>{{ $client->phone }}</td>
            
            <td>
                <a style="border: none; background-color:transparent;" href="{{route('client.edit', [$client])}}"><i class="fas fa-edit text-gray-300"></i></a>
               
            </td>
        </tr>
        @endforeach
    </table>



    {!! $clients->links() !!}

{{-- Modal_template --}}

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>



</div>
@endsection  

