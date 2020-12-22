@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Seznam clanku</h1>
        <div class="row justify-content-between">




            <form action="{{route('article.store')}}" method="post">
                @method('post')
                @csrf
                @include('article._form')
                <button type="submit">Odeslat</button>
            </form>

        </div>
    </div>
@endsection
