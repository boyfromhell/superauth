@extends('Superauth::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ trans('Superauth::auth.reset') }} {{ trans('Superauth::auth.password') }}</div>

                <div class="card-body">
                    @include('Superauth::layouts.partials.alerts')
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('Superauth::auth.emailAddress') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  name="email" value="{{ $email or old('email') }}"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('Superauth::auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"  name="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                {{ trans('Superauth::auth.confirm') }} {{ trans('Superauth::auth.password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password"  name="password_confirmation"
                                       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('Superauth::auth.reset') }} {{ trans('Superauth::auth.password') }}
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
