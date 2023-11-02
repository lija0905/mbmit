@extends('layouts.auth-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/auth.css') }}">
@endsection

@section('content')
    <body>
    <div class="min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="card-header">{{ __('Registracija') }}</div>

                            <div class="card-body p-4">
                                <h1>Registracija</h1>
                                <p class="text-medium-emphasis">Napravite svoj nalog</p>
                                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                    </svg></span>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                           id="name" type="text" placeholder="Ime" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                    </svg></span>

                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                           id="email" type="text" placeholder="Email" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                    </svg></span>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                           id="password" type="password"
                                           placeholder="Šifra" required autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                    </svg></span>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation" id="password-confirm" type="password"
                                           placeholder="Šifra" required autofocus>

                                </div>
                                <button class="btn btn-block btn-dark-red" type="submit">Napravite svoj nalog</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    </body>
@endsection
