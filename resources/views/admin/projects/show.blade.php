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
                            <div class="card-header"><h3>{{ $project->title }}/{{ $project->naslov }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        @if(isset($project->photo))
                                            <img src="{{ asset('/storage/projects/'.$project->photo) }}" class="w-100 mb-3">
                                        @endif
                                        @if(isset($project->video))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <iframe width="100%" height="250" src="{{ $project->video }}"
                                                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        @endif
                                      </div>
                                    <div @if(isset($project->photo) || isset($project->video)) class="col-sm-9" @else class="col-sm-12" @endif>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $project->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Naslov</th>
                                                    <td>{{ $project->naslov }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Content</th>
                                                    <td>{{ $project->content }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sadržaj</th>
                                                    <td>{{ $project->sadrzaj }}</td>
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
