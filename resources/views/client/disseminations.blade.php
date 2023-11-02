@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/disseminations.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.disseminations.disseminations') }}
                </div>
                <div class="mt-4 pt-4">
                    @foreach($disseminations as $key => $dissemination)
                        <div id="project_{{$dissemination->id}}" class="mb-4 @if($key < $disseminations->count() - 1) bottom-border-style @endif">
                            <div class="row">
                                <div class="col-sm-7 mb-2">
                                    <div class="pb-2">
                                        <h3 class="font-medium">
                                            @if(app()->getLocale() == "rs")
                                                {{ $dissemination->naslov }}
                                            @elseif (app()->getLocale() == "pc")
                                                {{ Helper::latinToCyrillic($dissemination->naslov) }}
                                            @else
                                                {{ $dissemination->title }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 pb-2">
                                <div class="col-lg-7 col-md-9 col-sm-12 disseminations-text">
                                    <div class="disseminations-text-limit" id="content_{{$dissemination->id}}">
                                        @if(app()->getLocale() == "rs")
                                            {!! nl2br(e($dissemination->sadrzaj))  !!}
                                        @elseif (app()->getLocale() == "pc")
                                            {!! nl2br(e(Helper::latinToCyrillic($dissemination->sadrzaj)))  !!}
                                        @else
                                            {!! nl2br(e($dissemination->content))  !!}
                                        @endif

                                    </div>
                                    <a class="disseminations-see-more cursor-pointer disseminations-link" style="display: none;" id="{{$dissemination->id}}">{{ __('client.disseminations.see_more') }} <i class="fa fa-plus" style="font-size:15px;"></i></a>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12 disseminations-assets">
                                    <figure class="disseminations-figure">
                                        @if(isset($dissemination->photo))
                                            @if(isset($dissemination->link) || count($dissemination->photos) > 0)
                                                @if(isset($dissemination->link))
                                                    <a href="{{ $dissemination->link }}" target="_blank">
                                                        <img src="{{ asset('/storage/disseminations/'.$dissemination->photo) }}"
                                                             class="disseminations-image">
                                                    </a>
                                                @else
                                                    <a href="{{ route('client.get_gallery', ["disseminations", $dissemination->id]) }}"
                                                       target="_blank"> <img
                                                            src="{{ asset('/storage/disseminations/'.$dissemination->photo) }}"
                                                            class="disseminations-image">
                                                    </a>
                                                @endif
                                            @else
                                                <img src="{{ asset('/storage/disseminations/'.$dissemination->photo) }}"
                                                     class="disseminations-image">
                                            @endif
                                        @endif
                                    </figure>
                                    @if(isset($dissemination->video))
                                        <iframe class="disseminations-frame" src="{{ $dissemination->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $disseminations->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script>

        $(document).ready(function(){


            $(".disseminations-see-more").each(function() {
                let dissemination_id = $(this).attr("id");
                let contentDiv = $("#content_" + dissemination_id);

                if (contentDiv[0].scrollHeight > contentDiv.height()) {
                    // Content exceeds the visible area, show "See More" button
                    $(this).show();
                }
            });


            $(".disseminations-see-more").on('click', function(e) {
                e.preventDefault();

                let project_id = $(this).attr("id");

                if ($("#content_"+project_id).hasClass("disseminations-text-limit")) {
                    $("#content_"+project_id).removeClass("disseminations-text-limit");
                    $("#content_"+project_id).addClass("disseminations-expanded");
                } else {
                    $("#content_"+project_id).removeClass("disseminations-expanded");
                    $("#content_"+project_id).addClass("disseminations-text-limit");
                }

                $("#" + project_id + " > i").toggleClass("fa-plus");
                $("#"+ project_id + " > i").toggleClass("fa-minus");

            });

        });


    </script>
@endsection
