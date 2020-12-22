@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Seznam</h1>
        <div class="row justify-content-between">
            <ul>
                @foreach($list as $item)
                    <li>
                        <a  class="btn btn-info" href="{{route($modelname.'.edit', [$item])}}"> <i> #{{$item->id}}</i> | {{$item->title}}</a>
                        <form action="{{route($modelname.'.destroy', [$item])}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Smazat</button>
                        </form>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection


