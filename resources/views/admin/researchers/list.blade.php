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
                            <div class="card-header"><strong>Istraživači</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->user_role->slug == "admin")
                                    <a class="btn btn-light-green mb-4" href="{{ route('researchers.create') }}">Dodaj istraživača</a>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>Ime i prezime</th>
                                                <th>Email</th>
                                                <th>Title</th>
                                                <th>Titula</th>
                                                <th>Pozicija</th>
                                                <th></th>
                                                <th></th>
                                                @if(\Illuminate\Support\Facades\Auth::user()->user_role->slug == "admin")
                                                    <th></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($researchers as $researcher)
                                                <tr>
                                                    <td>{{ $researcher->fullname }}</td>
                                                    <td>{{ $researcher->email }}</td>
                                                    <td>{{ $researcher->title }}</td>
                                                    <td>{{ $researcher->titula }}</td>
                                                    <td>{{ $researcher->researcher_type->type_name }}</td>
                                                    <td><a class="btn btn-grey w-100 text-center" href="{{ route('researchers.show', $researcher) }}">Pregled</a></td>
                                                    <td><a class="btn btn-grey w-100 text-center" href="{{ route('researchers.edit', $researcher) }}">Izmeni</a></td>
                                                    @if(\Illuminate\Support\Facades\Auth::user()->user_role->slug == "admin")
                                                        <td>
                                                            <form method="POST" action="{{ route('researchers.destroy', $researcher) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger text-white w-100 text-center" type="submit">Obriši</button>
                                                            </form>
                                                        </td>
                                                    @endif
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
