@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novy</h1>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-between">
            <form action="{{route($modelname.'.store')}}" method="post">
                @method('post')
                @csrf
                @include('article._form')
                <button type="submit">Odeslat</button>
            </form>

        </div>
    </div>
@endsection
