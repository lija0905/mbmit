@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/projects.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.student-activities.student-activities') }}
                </div>
                <div class="mt-4 pt-4">
                    @foreach($student_activities as $key => $activity)
                        <div id="project_{{$activity->id}}" class="mb-4  @if($key < $student_activities->count() - 1) bottom-border-style @endif">
                            <div class="row">
                                <div class="col-sm-7 mb-2">
                                    <div class="pb-2">
                                        <h3 class="font-medium">
                                            @if(app()->getLocale() == "rs")
                                                {{ $activity->naslov }}
                                            @elseif (app()->getLocale() == "pc")
                                                {{ Helper::latinToCyrillic( $activity->naslov) }}
                                            @else
                                                {{ $activity->title }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 pb-2">
                                <div class="col-lg-7 col-md-9 col-sm-12 project-text">
                                    <div class="projects-text-limit" id="content_{{$activity->id}}">
                                        @if(app()->getLocale() == "rs")
                                            {!! nl2br(e($activity->sadrzaj))  !!}
                                        @elseif (app()->getLocale() == "pc")
                                            {!! nl2br(e(Helper::latinToCyrillic($activity->sadrzaj)))  !!}
                                        @else
                                            {!! nl2br(e($activity->content))  !!}
                                        @endif
                                    </div>
                                    <a class="activity-see-more cursor-pointer project-link" id="{{$activity->id}}" style="display: none;">{{ __('client.projects.see_more') }} <i class="fa fa-plus" style="font-size:15px;"></i></a>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12 project-assets">
                                    @if(isset($activity->photo))
                                        <figure class="project-figure">
                                            <a href="#" data-toggle="modal" data-target="#fullImageModal_{{ $activity->id }}">
                                                <img src="{{ asset('/storage/student-activities/'.$activity->photo) }}" class="w-100">
                                            </a>
                                        </figure>
                                    @endif
                                    @if(isset($activity->video))
                                        <iframe class="project-frame" src="{{ $activity->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(isset($activity->photo))
                            <div class="modal fade" id="fullImageModal_{{ $activity->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('/storage/student-activities/'.$activity->photo) }}" alt="Full Resolution Image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $student_activities->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script>

        $(document).ready(function(){

            $(".activity-see-more").each(function() {
                let activity_id = $(this).attr("id");
                let contentDiv = $("#content_" + activity_id);

                if (contentDiv[0].scrollHeight > contentDiv.height()) {
                    // Content exceeds the visible area, show "See More" button
                    $(this).show();
                }
            });


            $(".activity-see-more").on('click', function(e) {
                e.preventDefault();

                let activity_id = $(this).attr("id");

                if ($("#content_"+activity_id).hasClass("projects-text-limit")) {
                    $("#content_"+activity_id).removeClass("projects-text-limit");
                    $("#content_"+activity_id).addClass("projects-expanded");
                } else {
                    $("#content_"+activity_id).removeClass("projects-expanded");
                    $("#content_"+activity_id).addClass("projects-text-limit");
                }

                $("#" + activity_id + " > i").toggleClass("fa-plus");
                $("#"+ activity_id + " > i").toggleClass("fa-minus");

            });

        });


    </script>
@endsection
