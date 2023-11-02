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
                            <div class="card-header"><h3>{{ $slide->title }}/{{ $slide->naslov }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        @if(isset($slide->photo))
                                            <img @if(Storage::exists('public/main-slider/'.$slide->photo)) src="{{ asset('storage/main-slider/'.$slide->photo) }}" @else src="{{ asset('assets/img/'. $slide->photo) }}" @endif class="w-100 mb-3">
                                        @endif
                                    </div>
                                    <div @if(isset($slide->photo)) class="col-sm-9" @else class="col-sm-12" @endif>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $slide->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Naslov</th>
                                                    <td>{{ $slide->naslov }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $slide->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Opis</th>
                                                    <td>{{ $slide->opis }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Link</th>
                                                    <td>{{ $slide->link }}</td>
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
        </div>
    </div>
@endsection

@section('javascript')@endsection
