@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Seznam clanku</h1>
        <div class="row justify-content-between">
            <ul>
                @foreach($list as $item)
                    <li><a href="{{route('article.edit', [$item])}}"> <i> #{{$item->id}}</i> | {{$item->title}}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection


