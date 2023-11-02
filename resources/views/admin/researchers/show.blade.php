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
                            <div class="card-header"><h3>{{ $researcher->fullname }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4"><img src="{{ asset('/storage/researchers/'.$researcher->photo) }}" class="w-100"></div>
                                    <div class="col-sm-8">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                    <tr>
                                                        <th>Ime i Prezime</th>
                                                        <td>{{ $researcher->fullname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $researcher->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Title</th>
                                                        <td>{{ $researcher->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Titula</th>
                                                        <td>{{ $researcher->titula }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tip</th>
                                                        <td>{{ $researcher->researcher_type->type_name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if(count($researcher->researcher_links) > 0)
                                    <div class="row">
                                        <div class="col-sm-12 mb-2 pl-2"><h5>Linkovi</h5></div>
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered datatable">
                                                    <thead>
                                                        <th>Ime linka</th>
                                                        <th>Link</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($researcher->researcher_links as $link)
                                                            <tr>
                                                                <td>{{ $link->link_name }}</td>
                                                                <td>{{ $link->link }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')@endsection
