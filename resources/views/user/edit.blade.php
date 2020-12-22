@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editace</h1>
        <div class="row justify-content-between">
            <form action="{{route($modelname.'.update', [$item])}}" method="post">
                @method('put')
                @csrf
                @include($modelname.'._form')
                <button type="submit">Odeslat</button>
            </form>

        </div>
        Moje clanky
        <div class="row justify-content-between">
            <ul>
                @foreach($item->articles as $article)
                    <li>
                        <a  class="btn btn-info" href="{{route($modelname.'.edit', [$article])}}"> <i> #{{$article->id}}</i> | {{$article->title}}</a>
                        <form action="{{route($modelname.'.destroy', [$article])}}" method="post">
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
