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
                            <div class="card-header"><strong>Izmeni galeriju</strong></div>
                            <div class="card-body">
                                @if(session("message"))
                                    <div class="alert alert-success">
                                        <div> {{ session('message') }} </div>
                                    </div>
                                @endif
                                <div class="alert alert-success d-none response-div">
                                    <div class="response-message"></div>
                                </div>
                                <form method="POST" action="{{ route('galleries.update', $gallery) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>
                                                    <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ $gallery->title }}"/>

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Naziv</th>
                                                <td>
                                                    <input class="form-control @error('naziv') is-invalid @enderror" name="naziv" id="naziv" type="text" value="{{ $gallery->naziv }}" />

                                                    @error('naziv')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>
                                                    <textarea rows="4" class="form-control  @error('description') is-invalid @enderror" name="description" id="description" type="text">{{ $gallery->description }}</textarea>

                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Opis</th>
                                                <td>
                                                    <textarea rows="4" class="form-control  @error('opis') is-invalid @enderror" name="opis" id="opis" type="text">{{ $gallery->opis }}</textarea>

                                                    @error('opis')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Slike</th>
                                                <td>
                                                    <input class="form-control" name="photos[]" id="photos[]" type="file" multiple/>
                                                    @if(count($gallery->photos) > 0)
                                                        <div class="row pt-3 w-100">
                                                            @foreach($gallery->photos as $photo)
                                                                <div class="col-sm-3">
                                                                    <img src="{{ asset('/storage/gallery/gallery/'.$photo->photo) }}" class="w-75">
                                                                    <i class="cil-trash" style="color: red; font-size: 20px;"  id="{{ $photo->id }}"></i>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
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

                let photo_id = $(this).attr("id");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('gallery_photo.destroy') }}",
                    data: {
                        photo_id: photo_id,
                        photo_type: "gallery"
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
