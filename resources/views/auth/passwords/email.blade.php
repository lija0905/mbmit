@extends('layouts.auth-layout')

@section('css')
    <link href="{{asset("css/admin/auth.css")}}" rel="stylesheet"></link>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 d-flex flex-row align-items-center">
        <div class="col-lg-7">
            <div class="card">
                <h3 class="card-header p-4">{{ __('Promenite šifru') }}</h3>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <div class="input-group"><span class="input-group-text">
                                 <svg class="icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                     </svg></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark-red">
                                    {{ __('Pošalji link za promenu šifre') }}
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
