@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Owner`s list</h2>

    <a class="btn btn-primary" href="{{route('owner.create')}}">Add new owner</a>   

    <form method="GET" action="{{route('owner.index')}}">
    @csrf

    <select name="paginateSetting">
            @foreach ($paginationSettings as $setting)
            @if ($paginateSetting == $setting->value)
                <option selected value="{{ $setting->value }}">{{ $setting->title }}</option>
            @else
                <option value="{{ $setting->value }}">{{ $setting->title }}</option>
            @endif
            @endforeach
        </select>
    <button type="submit" class="btn btn-secondary">Atrinkti</button>
    <input hidden name="sort" type="text" value="{{ $sort }}"/>
    <input hidden name="direction" type="text" value="{{ $direction }}"/>

</form>


    <table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('name','Name')</td>
            <td>@sortablelink('surename','Surename')</td>
            <td>@sortablelink('email','Email')</td>
            <td>@sortablelink('phone','Phone number')</td>
           <td colspan="3">Tools</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($owners as $owner)
        <tr>
            <td>{{ $owner->id }}</td>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->surename }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ $owner->phone }}</td> 
            <td style="width: 80px;"><a class="btn btn-secondary" href="{{route('owner.edit', [$owner])}}">Edit</a></td>
            <td style="width: 80px;"><a class="btn btn-secondary" href="{{route('owner.show', [$owner])}}">View</a></td>
                <form class="form-control" method="post" action="{{route('owner.destroy', [$owner])}}">
                    <td style="width: 80px;">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                </form>
        </tr>
        @endforeach
    </tbody>
    </table>
    
       @if ($paginateSetting != 1)
        {!! $owners->appends(Request::except('page'))->render() !!}
    @endif

</div>
@endsection
