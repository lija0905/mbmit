@extends('layouts.dashboard-layout')
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<!-- Breadcrumb-->
@section('css')@endsection


@section('content')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header"><strong>Izmeni teks početne</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('welcome-section.update', $section) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>
                                                    <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ $section->title }}"/>

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Naslov</th>
                                                <td>
                                                    <input class="form-control @error('naslov') is-invalid @enderror" name="naslov" id="naslov" type="text" value="{{ $section->naslov }}" />

                                                    @error('naslov')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>
                                                    <textarea rows="5" class="form-control  @error('description') is-invalid @enderror" name="description" id="description" type="text">{{ $section->description }}</textarea>

                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Opis</th>
                                                <td>
                                                    <textarea rows="5" class="form-control @error('opis') is-invalid @enderror" name="opis" id="opis" type="text">{{ $section->opis }}</textarea>

                                                    @error('opis')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-light-green">Sačuvaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
