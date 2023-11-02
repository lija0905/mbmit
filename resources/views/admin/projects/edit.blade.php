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
                            <div class="card-header"><strong>Izmeni projekat</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <div class="alert alert-success d-none response-div">
                                    <div class="response-message"></div>
                                </div>
                                <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>
                                                    <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ $project->title }}"/>

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Naslov</th>
                                                <td>
                                                    <input class="form-control @error('naslov') is-invalid @enderror" name="naslov" id="naslov" type="text" value="{{ $project->naslov }}" />

                                                    @error('naslov')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Content</th>
                                                <td>
                                                    <textarea rows="4" class="form-control  @error('content') is-invalid @enderror" name="content" id="content" type="text">{{ $project->content }}</textarea>

                                                    @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sadržaj</th>
                                                <td>
                                                    <textarea rows="4" class="form-control  @error('sadrzaj') is-invalid @enderror" name="sadrzaj" id="sadrzaj" type="text">{{ $project->sadrzaj }}</textarea>

                                                    @error('sadrzaj')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Slika</th>
                                                <td>
                                                    <input class="form-control  @error('photo') is-invalid @enderror" name="photo" id="photo" type="file"/>

                                                    @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                    @if(isset($project->photo))
                                                        <div class="row pt-3 w-100">
                                                            <div class="col-sm-3">
                                                                <img src="{{ asset('/storage/projects/'.$project->photo) }}" class="w-75">
                                                                <i class="cil-trash" style="color: red; font-size: 20px;"  id="{{ $project->id }}"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Video</th>
                                                <td>
                                                    <input class="form-control  @error('video') is-invalid @enderror" name="video" id="video" type="text" value="{{ $project->video }}"/>

                                                    @error('video')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
        $(document).ready(function() {

            $(".cil-trash").on('click', function (){

                let project_id = $(this).attr("id");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('projects.destroyPhoto') }}",
                    data: {
                        project_id: project_id,
                    },
                    success:function(response) {
                        if (response.success) {

                            $(".response-message").html(response.message);
                            $(".response-div").removeClass("d-none");
                            $(this).parent().css("display","none");

                            setTimeout(function() {
                                location.reload();
                            }, 1000)
                        }
                    }
                });
            });

        });
    </script>
@endsection
