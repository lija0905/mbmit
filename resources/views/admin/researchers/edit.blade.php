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
                            <div class="card-header"><strong>Izmeni istraživača</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                @if(session("error"))
                                    <div class="alert alert-danger">
                                        <div> {{ session('error') }} </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('researchers.update', $researcher) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                            <tr>
                                                <th>Ime i Prezime</th>
                                                <td>
                                                    <input class="form-control @error('fullname') is-invalid @enderror " name="fullname" id="fullname" type="text" value="{{ $researcher->fullname }}"/>

                                                    @error('fullname')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>
                                                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" value="{{ $researcher->email }}" />

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Title</th>
                                                <td>
                                                    <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ $researcher->title }}"/>

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Titula</th>
                                                <td>
                                                    <input class="form-control  @error('titula') is-invalid @enderror" name="titula" id="titula" type="text" value="{{ $researcher->titula }}"/>

                                                    @error('titula')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Slika</th>
                                                <td>
                                                    <input class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" type="file"/>

                                                    @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tip</th>
                                                <td>
                                                    <select class="form-control" id="type_id" name="type_id">
                                                        @foreach($researchers_type as $type)
                                                            <option @if($researcher->type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            @if(\Illuminate\Support\Facades\Auth::user()->user_role->slug == "researcher")
                                            <tr>

                                                <th>New Password</th>
                                                <td>
                                                    <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password"/>

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Confirm New Password</th>
                                                <td>
                                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" type="password"/>

                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        <div id="add_link" class="mb-3">
                                            <a class="add_link cursor-pointer">
                                                <svg class="icon">
                                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                                </svg>&nbsp;Dodaj link
                                            </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable" id="links_table">
                                                <thead>
                                                <tr>
                                                    <th>Ime linka</th>
                                                    <th>Link</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($researcher->researcher_links as $link)
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="links_name[{{$link->id}}]" value="{{ $link->link_name }}"></td>
                                                            <td><input class="form-control" type="text" name="links[{{$link->id}}]" value="{{ $link->link }}"/></td>
                                                            <td><button class="btn btn-danger text-white w-100" id="remove_link_{{$link->id}}" data-id="{{$link->id}}">Ukloni link</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-light-green">Sačuvaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        let countRows = 0;
        $(".add_link").on('click', function() {
            let table = document.getElementById("links_table");

            let row = table.insertRow(-1);

            let link_name = row.insertCell(0);
            let link = row.insertCell(1);
            let remove_link = row.insertCell(2);

            link_name.innerHTML = '<input class="form-control" type="text" name="new_links_name['+countRows+']">';
            link.innerHTML = '<input class="form-control" type="text" name="new_links['+countRows+']">';
            remove_link.innerHTML = '<button class="btn btn-danger text-white w-100" id="remove_link_'+countRows+'" data-id="'+countRows+'">Ukloni link</button>';

            countRows++;
        });

        $("[id^='remove_link_']").on('click', function(){
            $(this).parent().parent().remove();
        });
    </script>
@endsection
