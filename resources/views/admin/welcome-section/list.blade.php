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
                            <div class="card-header"><strong>Tekst Početne</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Naslov</th>
                                            <th>Description</th>
                                            <th>Opis</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $section[0]->title }}</td>
                                                <td>{{ $section[0]->naslov }}</td>
                                                <td><span class="text-limit">{{ $section[0]->description }}</span></td>
                                                <td><span class="text-limit">{{ $section[0]->opis }}</span></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('welcome-section.show', $section[0]) }}">Pregled</a></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('welcome-section.edit', $section[0]) }}">Izmeni</a></td>
                                            </tr>
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
