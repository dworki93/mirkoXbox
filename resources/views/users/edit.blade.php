@extends('master')

@section('title')
    profil
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>
                <form method="post" action="{{ action('UserController@editAge') }}">
                    <div class="userForms">
                        <div class="form-group">
                            <label for="age">Wiek:</label>
                            <input type="number" class="form-control" name="age" id="age" value="{{ $user->age }}"
                                   min="0" max="100" required>
                        </div>
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-default">Aktualizuj</button>
                    </div>
                </form>
            </div>
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
        @if(count($platforms) > 0)
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Platformy</div>
                    <ul class="nav nav-tabs">
                        <?php $i = 0; ?>
                        @foreach($platforms as $platform)
                            <li @if($i == 0) class="active" @endif><a data-toggle="tab" href="#{{ $platform->platform }}">{{ $platform->platform }}</a></li>
                            <?php $i++; ?>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        @foreach($platforms as $platform)
                            <div id="{{ $platform->platform }}" class="tab-pane fade @if($i == 0) in active @endif">
                                <div class="userForms">
                                    <form method="post" action="/platform/edit">
                                        <div class="form-group">
                                            <label for="nick">Nick:</label>
                                            <input type="text" class="form-control" id="nick" name="nick" value="{{ $platform->platformNick }}"
                                                   maxlength="100" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="games">Gry:</label>
                                            <textarea id="games" class="form-control" name="games" maxlength="255">{{ $platform->games }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="info">Info:</label>
                                            <textarea id="info" class="form-control" name="info" maxlength="255">{{ $platform->description }}</textarea>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="active"
                                                       @if($platform->description) checked="checked"@endif>
                                                Aktywny
                                            </label>
                                        </div>
                                        {!! csrf_field() !!}
                                        <input name="platform_id" type="hidden" value="{{ $platform->id }}">
                                        <div class="userForms">
                                            <button type="submit" class="btn btn-default">Aktualizuj</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection