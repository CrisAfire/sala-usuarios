<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sala de usuarios</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    @vite(['resources/scss/app.scss', 'resources/scss/authLayout.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex flex-column" style="height:100dvh">
        <header class="navbar navbar-expand-sm justify-content-center sombraDegradado">
            <img src="images/logoITL.png" class="img-fluid rounded-top me-3" style="max-width:60px;" alt="Logo ITL">
            <a class="navbar-brand fw-bold text-white" href="#">
                Sala de Usuarios
            </a>
        </header>

        <div class="d-flex flex-grow-1 align-items-center text-center">
            <div class="container-sm py-3">
                <p class="mb-3 h3 titulo">Inicia sesión:</p>
                <form class="sombraCaja rounded-5 p-4 mx-auto bg-light boxInicio" action="{{ route('login.store') }}"
                    method="POST">
                    @csrf
                    <div class="col-12 text-center">
                        @if(session("error"))
                            <span class="text-danger fw-bold p-1">{{session("error")}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label m-0 fw-bold fs-5">Correo electrónico</label>
                        <input type="email" class="form-control text-center col-12 p-1" id="email"
                            placeholder="Ingresa tu correo" name="email" required>
                        @error("email")
                            <p class="text-danger text-center mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label m-0 fw-bold fs-5">Contraseña</label>
                        <input type="password" class="form-control text-center col-12 p-1" id="pass"
                            placeholder="Ingresa tu contraseña" name="password" required
                            autocomplete="new-password">
                        @error("password")
                            <p class="text-danger text-center mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <a href="{{route('forgotPassword.show')}}" class="d-block mb-3 text-center">¿Olvidaste tu contraseña?</a>
                    <div class="mx-auto">
                        <button type="submit" class="w-50 btn btn-marino fw-bold">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
