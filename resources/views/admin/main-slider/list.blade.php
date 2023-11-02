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
                            <div class="card-header"><strong>Glavni Slider</strong></div>
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
                                            <th>Slika</th>
                                            <th>Title</th>
                                            <th>Naslov</th>
                                            <th>Description</th>
                                            <th>Kratak Opis</th>
                                            <th>Link</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($slider as $slide)
                                            <tr>
                                                <td style="width:20%;"><img @if(Storage::exists('public/main-slider/'.$slide->photo)) src="{{ asset('storage/main-slider/'.$slide->photo) }}" @else src="{{ asset('assets/img/'. $slide->photo) }}" @endif class="w-100"></td>
                                                <td>{{ $slide->title }}</td>
                                                <td>{{ $slide->naslov }}</td>
                                                <td><span class="text-limit">{{ $slide->description }}</span></td>
                                                <td><span class="text-limit">{{ $slide->opis }}</span></td>
                                                <td>{{ $slide->link }}</td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('main-slider.show', $slide) }}">Pregled</a></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('main-slider.edit', $slide) }}">Izmeni</a></td>
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
