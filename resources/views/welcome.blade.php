@extends('layout.main')

@section('title', 'CV INTAN')

@section('content')
<div class="container">
        @guest
            @if(Route::has('login'))
                <div class="isi">
                    <h1>Selamat Datang </h1>
                </div>
            @endif
            @else
                <div class="isi">
                    <h1>Selamat Datang {{ Auth::user()->nama }}</h1>
                </div>
        @endguest
</div>
@endsection