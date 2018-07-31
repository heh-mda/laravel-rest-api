@extends('layout')

@section('content')
<form action="{{action('ItemController@store')}}" method="post">
    <div class="row">
        <div class="col-md-5 mx-auto">
                @csrf
                <div class="form-group form-group-sm">
                    <label for="item-name" class="control-label">Name</label>
                    <input class="form-control" name="name" type="text" id="item-name">
                </div>
                
                <div class="form-group form-group-sm">
                    <label for="item-key" class="control-label">Key</label>
                    <input class="form-control" name="key" type="text" id="item-key">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Submit</button>         
        </div>
    </div>
</form>
@endsection