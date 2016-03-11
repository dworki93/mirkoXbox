
@extends('master')


@section('content')

    @foreach ($users as $user)
        <div>
            <h2>{{ $user->wykopNick }} {{ $user->xboxNick }}</h2>
            <p>{{ $user->age }} {{ $user->platform }}</p>
        </div>
    @endforeach
@endsection