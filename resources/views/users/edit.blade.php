@extends('master')

@section('title')
    profil
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>
                <form>
                    <div class="userForms">
                        <div class="form-group">
                            <label for="age">Wiek:</label>
                            <input type="number" class="form-control" id="age" value="{{ $user->age }}">
                        </div>
                        <button type="submit" class="btn btn-default">Aktualizuj</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Platformy</div>
                <form method="post" action="{{ action('PlatformController@add') }}">
                    <div class="userForms">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="xone"
                                       @if($usingPlatforms['xone']) checked="checked"@endif>
                                Xbox One
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="x360"
                                       @if($usingPlatforms['x360']) checked="checked"@endif>
                                Xbox 360
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ps4"
                                       @if($usingPlatforms['ps4']) checked="checked"@endif>
                                PS 4
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ps3"
                                       @if($usingPlatforms['ps3']) checked="checked"@endif>
                                PS 3
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="steam"
                                       @if($usingPlatforms['steam']) checked="checked"@endif>
                                Steam
                            </label>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-default">Aktualizuj</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Usuń konto</div>
                <div class="userForms">
                    <h5>Usuwa wszystkie dane z bazy i wylogowuje</h5>
                    <form>
                        <div class="userForms">
                            <button type="submit" class="btn btn-default">Potwierdź</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($platforms as $platform)
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $platform['platform'] }}</div>
                <div class="userForms">
                    <form>
                        <div class="form-group">
                            <label for="nick">Nick:</label>
                            <input type="text" class="form-control" id="nick" value="{{ $platform->platformNick }}">
                        </div>
                        <div class="form-group">
                            <label for="games">Gry:</label>
                            <textarea name="games" id="games" class="form-control">{{ $platform->games }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Info:</label>
                            <textarea name="description" id="description" class="form-control">{{ $platform->description }}</textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="active"
                                       @if($platform->description) checked="checked"@endif>
                                Aktywny
                            </label>
                        </div>
                        <div class="userForms">
                            <button type="submit" class="btn btn-default">Aktualizuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection