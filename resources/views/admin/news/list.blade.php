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
                            <div class="card-header"><strong>Vesti</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <a class="btn btn-light-green mb-4" href="{{ route('news.create') }}">Dodaj vest</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Naslov</th>
                                            <th>Content</th>
                                            <th>Sadržaj</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_news as $news)
                                            <tr>
                                                <td>{{ $news->title }}</td>
                                                <td>{{ $news->naslov }}</td>
                                                <td><span class="text-limit">{{ $news->content }}</span></td>
                                                <td><span class="text-limit">{{ $news->sadrzaj }}</span></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('news.show', $news) }}">Pregled</a></td>
                                                <td><a class="btn btn-grey w-100 text-center" href="{{ route('news.edit', $news) }}">Izmeni</a></td>
                                                <td>
                                                    <form method="POST" action="{{ route('news.destroy', $news) }}">
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
