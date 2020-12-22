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
    </div>
@endsection
