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
                            <div class="card-header"><h3>{{ $publication->naziv }}/{{ $publication->title }}</h3></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $publication->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Naziv</th>
                                                    <td>{{ $publication->naziv }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Abstract</th>
                                                    <td>{{ $publication->abstract }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Opis</th>
                                                    <td>{{ $publication->opis }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tip</th>
                                                    <td>{{ $publication->publication_type->type_name_rs }}/{{ $publication->publication_type->type_name_en }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if (count($publication->authors) > 0)
                                    <div class="col-sm-12">
                                        <h6>Autori</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable" id="authors_table">
                                                <thead>
                                                <tr>
                                                    <th>Ime i Prezime</th>
                                                    <th>Titula</th>
                                                    <th>Title</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($publication->authors as $author)
                                                        <tr>
                                                            <td>{{ $author->fullname }}</td>
                                                            <td>{{ $author->titula }}</td>
                                                            <td>{{ $author->title }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
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

@section('javascript')
@endsection
