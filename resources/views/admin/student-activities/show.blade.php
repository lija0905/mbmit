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
                            <div class="card-header"><h3>{{ $student_activity->title }}/{{ $student_activity->naslov }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        @if(isset($student_activity->photo))
                                            <img src="{{ asset('/storage/student-activities/'.$student_activity->photo) }}" class="w-100 mb-3">
                                        @endif
                                        @if(isset($project->video))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <iframe width="100%" height="250" src="{{ $student_activity->video }}"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div @if(isset($student_activity->photo) || isset($student_activity->video)) class="col-sm-9" @else class="col-sm-12" @endif>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $student_activity->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Naslov</th>
                                                    <td>{{ $student_activity->naslov }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Content</th>
                                                    <td>{{ $student_activity->content }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sadržaj</th>
                                                    <td>{{ $student_activity->sadrzaj }}</td>
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
