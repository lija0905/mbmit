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
        <div class="row mb-5">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    @if(app()->getLocale() == "rs")
                        {{ $item->naslov }}
                    @elseif (app()->getLocale() == "pc")
                        {{ Helper::latinToCyrillic($item->naslov) }}
                    @else
                        {{ $item->title }}
                    @endif
                </div>
                <div class="row mt-4 pt-4">
                    @foreach($item->photos as $photo)
                        <div class="col-sm-3 pb-3">
                            <a href="#" data-toggle="modal" data-target="#GallerySlideModal_{{$photo->id}}">
                                <img src="{{ asset('/storage/gallery/'.$type .'/'.$photo->photo) }}" class="w-100">
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
                                                @foreach($item->photos as $photo2)
                                                    <div
                                                        class="carousel-item @if($photo->id == $photo2->id) active @endif" id="img_{{$photo->id}}_{{ $photo2->id }}">
                                                        <img
                                                            src="{{ asset('/storage/gallery/'.$type.'/'.$photo2->photo) }}"
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
