@extends('layouts.auth')
@section('content')
    @auth
        <form action="{{ route('logOut') }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Выход</button>
        </form>
    @endauth
@endsection
