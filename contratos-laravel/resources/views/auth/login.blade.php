@extends('layouts.default')

@section('content')
<!DOCTYPE html>
<html>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card d-flex justify-content-center">
            <div class="card-body login-card-body my-auto">
                <p class="login-box-msg">Inicia Sesión para continuar</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input id="rut" type="rut" class="form-control " name="rut" value="{{ old('rut') }}"
                                placeholder="Rut">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('rut')
                            <span class="invalid-feedback" role="alert">
                                <strong>Usuario o Contraseña incorrecta</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Contraseña">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">

                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Iniciar') }}
                            </button>
                        </div>
                    </div>
                    <p class="mb-1">
                        <a href="{{url('/password/reset')}}">Olvide mi contraseña</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</html>
@endsection

