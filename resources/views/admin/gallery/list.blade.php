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
                            <div class="card-header"><strong>Galerije</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <a class="btn btn-light-green mb-4" href="{{ route('galleries.create') }}">Dodaj galeriju</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Naziv</th>
                                            <th>Description</th>
                                            <th>Opis</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($galleries as $gallery)
                                            <tr>
                                                <td>{{ $gallery->title }}</td>
                                                <td>{{ $gallery->naziv }}</td>
                                                <td><span class="text-limit">{{ $gallery->description }}</span></td>
                                                <td><span class="text-limit">{{ $gallery->opis }}</span></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('galleries.show', $gallery) }}">Pregled</a></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('galleries.edit', $gallery) }}">Izmeni</a></td>
                                                <td>
                                                    <form method="POST" action="{{ route('galleries.destroy', $gallery) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger text-white w-100 text-center" type="submit">Obriši</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')@endsection
