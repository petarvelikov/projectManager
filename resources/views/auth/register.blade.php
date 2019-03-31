@extends('layout')

@section('content')

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary mb-3">
                    <div class="card-header text-center bg-primary text-secondary"><h4>Регистрационна форма</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Потребителско име:</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control p-3{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required />
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Парола:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control p-3{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Повтори паролата:</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control p-3" name="password_confirmation" required />
                                </div>
                            </div>
                            <div class="form-group row m-0 justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Регистрация
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
