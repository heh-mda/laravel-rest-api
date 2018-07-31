@extends('layout')

@section('content')
<table class="table table-bordered table-striped" id="items">
    <thead class="thead-dark">
        <tr> 
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Key</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">History</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->key}}</td>
        <td>{{$item->created_at->format('d/m/y')}}</td>
        <td>{{$item->updated_at->format('d/m/y')}}</td>
        <td>
            <a href="{{action('ItemController@showHistory', $item->id)}}" class="btn btn-info">History</a>
        </td>
        <td>
            <a href="{{action('ItemController@edit', $item->id)}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <form action="{{action('ItemController@destroy', $item->id)}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<a href="{{action('ItemController@create')}}" class="btn btn-success">Add</a>
@endsection