@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="panel panel-success">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        
                        
                         <div class="form-group{{ $errors->has('IDPerson') ? ' has-error' : '' }}">
                            <label for="IDPerson" class="col-md-4 control-label">Numero de identificacion</label>

                            <div class="col-md-6">
                                <input id="IDPerson" type="text" class="form-control" name="IDPerson" value="{{ old('IDPerson') }}" required autofocus>

                                @if ($errors->has('IDPerson'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('IDPerson') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmacion de contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
