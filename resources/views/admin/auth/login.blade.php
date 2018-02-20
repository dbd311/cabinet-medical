@extends('layouts.auth.main')
@section('css')
<link rel="shortcut icon" href="/images/icons/favicon.ico"/>
<link rel="stylesheet" href="{{ elixir('/css/auth.min.css') }}" />
@endsection
@section('title')
Connexion
@endsection

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5 mb-3">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Admin | Connexion</div>
                <div class="panel-body mt-3"  style="border: 1px dashed lightgrey;">
                    <form class="form-horizontal mt-3" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-4 control-label">E-Mail</label>
                            <div class="col-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-xs-5 col-md-4 control-label">Mot de passe</label>

                            <div class="col-8">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>                            
                        </div>                        
                        
                        <div class="form-group">                            
                            <div class="col-8 col-md-offset-5">
                                <br />
                                <input checked="checked" name="remember" type="checkbox"> Se souvenir de moi
                                <br />
                                <button type="submit" class="btn btn-primary mt-2">
                                    Se connecter
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
