@extends('layouts.app')
@section('content')

<div class="container">
<h3>Type`s list</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#typeCreate">
  Add new Type
</button>

<table id="clients-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($types as $type)
        <tr class="type{{$type->id}}">
            <td class="col-type-id">{{$type->id}}</td>
            <td class="col-type-name">{{$type->title}}</td>
            <td class="col-type-description">{{$type->description}}</td>
            <td>           
                <button class="btn btn-danger delete-type" type="submit" data-clientid="{{$type->id}}">DELETE</button>
                <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showClientModal" data-clientid="{{$type->id}}">Show</button>
                <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editClientModal" data-clientid="{{$type->id}}">Edit</button>        
           </td>
        </tr>
        @endforeach
    </table>
</div>
@extends('components.typeModals')

{{-- <script src="{{ asset('js/typeModals.js') }}"></script> --}}
<script>
    $.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
  });
  
$("#storeNewType").on('click',(function() {
    let type_title;
    let type_description;

    type_title = $('#type_title').val();
    type_description = $('#type_description').val();

    console.log(type_title + " " + type_description);

    $.ajax({
         type: 'POST',
         url: '{{route("type.storeAjax")}}',
         data: {type_title: type_title, type_description: type_description  },
         success: function(data) {
          
          console.log(data);
    //       //  let html;
            
    //       // html = createRowFromHtml(data.clientId, data.clientName, data.clientSurname, data.clientDescription);
    //         // $("#clients-table").append(html);

    //         // $("#createClientModal").hide();
    //         // $('body').removeClass('modal-open');
    //         // $('.modal-backdrop').remove();
    //         // $('body').css({overflow:'auto'});

    //         // $("#alert").removeClass("d-none");
    //         // $("#alert").html(data.successMessage +" " + data.clientName +" " +data.clientSurname);

    //         // $('#client_name').val('');
    //         // $('#client_surname').val('');
    //         // $('#client_description').val('');


       }
    });

}));
</script>
@endsection