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
                            <div class="card-header"><h3>{{ $news->title }}/{{ $news->naslov }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ asset('/storage/news/'.$news->photo) }}" class="w-100 mb-3">
                                    </div>
                                    <div class="col-sm-9" >
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $news->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Naslov</th>
                                                    <td>{{ $news->naslov }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Content</th>
                                                    <td>{{ $news->content }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sadržaj</th>
                                                    <td>{{ $news->sadrzaj }}</td>
                                                </tr>
                                                @if(count($news->photos) > 0)
                                                    <tr>
                                                        <th>Slike</th>
                                                        <td>
                                                            <div class="row pt-3 w-100">
                                                                @foreach($news->photos as $photo)
                                                                    <div class="col-sm-6">
                                                                        <img src="{{ asset('/storage/gallery/news/'.$photo->photo) }}" class="w-75">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
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
