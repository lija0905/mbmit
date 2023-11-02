@extends('layouts.app')


@section('css')
    <style>
        .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.2);
        }
    </style>

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.galleries.galleries') }}
                </div>
                <div class="mt-4 pt-4">
                    @foreach($galleries as $key => $gallery)
                        <div class="mb-4 @if($key < $galleries->count() - 1) bottom-border-style @endif">
                            <div>
                                <h5 class="font-medium">
                                    @if(app()->getLocale() == "rs")
                                        {{ $gallery->naziv }}
                                    @elseif (app()->getLocale() == "pc")
                                        {{ Helper::latinToCyrillic($gallery->naziv) }}
                                    @else
                                        {{ $gallery->title }}
                                    @endif
                                </h5>
                            </div>
                            <div class="w-100 pb-4">
                                @if(app()->getLocale() == "rs")
                                    {!! nl2br(e($gallery->opis))  !!}
                                @elseif (app()->getLocale() == "pc")
                                    {!! nl2br(e(Helper::latinToCyrillic($gallery->opis)))  !!}
                                @else
                                    {!! nl2br(e($gallery->description))  !!}
                                @endif
                            </div>
                            <div class="row pb-4">
                                @foreach($gallery->photos as $photo)
                                    <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
                                        <a href="#" data-toggle="modal" data-target="#GallerySlideModal_{{$photo->id}}">
                                            <img src="{{ asset('/storage/gallery/gallery/'.$photo->photo) }}" class="w-100">
                                        </a>
                                    </div>
                                    <div class="modal fade" id="GallerySlideModal_{{$photo->id}}"  data-id="{{ $photo->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="carouselGallery_{{ $photo->id }}" class="carousel slide carousel-fade full-screen" data-interval="false" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach($gallery->photos as $photo2)
                                                                <div
                                                                    class="carousel-item @if($photo->id == $photo2->id) active @endif" id="img_{{$photo->id}}_{{ $photo2->id }}">
                                                                    <img
                                                                        src="{{ asset('/storage/gallery/gallery/'.$photo2->photo) }}"
                                                                        class="img-fluid">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselGallery_{{ $photo->id }}"
                                                           role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselGallery_{{ $photo->id }}"
                                                           role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $galleries->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            $('[id^=GallerySlideModal_]').on('hidden.bs.modal', function() {
                let photo_id = $(this).data("id");

                $("[id^=img_"+photo_id+"]").removeClass("active");
                $("#img_"+photo_id+"_"+photo_id).addClass("active");
            });


        });

    </script>

@endsection
