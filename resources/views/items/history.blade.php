@extends('layout')

@section('content')
<ul>
    @foreach($item->revisionHistory as $history)
        @if($history->key == 'created_at' && !$history->old_value)
            <li>Someone <b>created</b> this item at {{$history->newValue()}}</li>
        @else
            <li>Someone changed <b>{{$history->fieldName()}}</b> from "{{$history->oldValue()}}" to "{{$history->newValue()}}" at {{$history->created_at->format('d/m/y')}}</li>
        @endif
    @endforeach
</ul>
@endsection