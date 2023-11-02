@extends('layouts.auth-layout')

@section('css')
    <link href="{{asset("css/admin/auth.css")}}" rel="stylesheet"></link>
@endsection

@section('content')
    <div class="min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="card-body">
                                    <h1 class="text-black-emphasis mb-4">Prijava</h1>
                                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                      </svg></span>
                                        <input class="form-control @error('email') is-invalid @enderror " type="text"
                                               placeholder="Email" name="email" id="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                      </svg></span>
                                        <input class="form-control  @error('password') is-invalid @enderror"
                                               type="password" placeholder="Šifra" name="password" id="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-dark-red px-4" type="submit">Prijavi se</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="btn px-0" type="button" href="{{ route("password.request") }}">Zaboravili
                                                ste šifru?</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="card col-md-5 text-white background-etf py-5">
                            <div class="bg-etf-content text-center">
                                <div>
                                    <h2>Istraživačka grupa za multimodalno biomedicinsko inženjerstvo</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
