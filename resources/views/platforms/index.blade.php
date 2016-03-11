@extends('master')

@section('title')
    {{ $name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Gracze {{ $name }} </h2>
            <div class="table-responsive">
                <table class="table" id="gamersTable">
                    <thead>
                    <tr>
                        <th>avatar</th>
                        <th>nick na wykopie</th>
                        <th>wiek</th>
                        <th>nick na {{ $name }}</th>
                        <th>gry</th>
                        <th>info</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($platforms as $platform)
                            <tr>
                                <td><img src="{{$platform->user->avatar}}"></td>
                                <td>
                                    <a href="http://www.wykop.pl/ludzie/{{ $platform->user->wykopNick }}/">
                                        {{ $platform->user->wykopNick }}
                                    </a>
                                </td>
                                <td>{{ $platform->user->age }}</td>
                                <td>{{ $platform->platformNick }}</td>
                                <td>{{ $platform->games }}</td>
                                <td>{{ $platform->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection