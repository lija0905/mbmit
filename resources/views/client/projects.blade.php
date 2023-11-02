@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/projects.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 col-lg-9 col-md-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.projects.projects') }}
                </div>
                <div class="mt-4 pt-4">
                    @foreach($projects as $key => $project)
                        <div id="project_{{$project->id}}" class="mb-4  @if($key < $projects->count() - 1) bottom-border-style @endif">
                            <div class="row">
                                <div class="col-sm-7 mb-2">
                                    <div class="pb-2">
                                        <h3 class="font-medium">
                                            @if(app()->getLocale() == "rs")
                                                {{ $project->naslov }}
                                            @elseif (app()->getLocale() == "pc")
                                                {{ Helper::latinToCyrillic($project->naslov) }}
                                            @else
                                                {{ $project->title }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 pb-2">
                                <div class="col-lg-7 col-md-9 col-sm-12 project-text">
                                    <div class="projects-text-limit" id="content_{{$project->id}}">
                                        @if(app()->getLocale() == "rs")
                                            {!! nl2br(e($project->sadrzaj))  !!}
                                        @elseif (app()->getLocale() == "pc")
                                            {!! nl2br(e(Helper::latinToCyrillic($project->sadrzaj)))  !!}
                                        @else
                                            {!! nl2br(e($project->content ))  !!}
                                        @endif
                                    </div>
                                    <a class="project-see-more cursor-pointer project-link"  style="display: none;" id="{{$project->id}}">{{ __('client.projects.see_more') }} <i class="fa fa-plus" style="font-size:15px;"></i></a>
                                </div>
                                <div class="col-lg-3 col-md-9 col-sm-12 project-assets">
                                    @if(isset($project->photo))
                                        <figure class="project-figure">
                                            <img src="{{ asset('/storage/projects/'.$project->photo) }}" class="project-image">
                                        </figure>
                                    @endif
                                    @if(isset($project->video))
                                        <iframe class="project-frame" src="{{ $project->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $projects->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script>

        $(document).ready(function(){

            $(".project-see-more").each(function() {
                let project_id = $(this).attr("id");
                let contentDiv = $("#content_" + project_id);

                if (contentDiv[0].scrollHeight > contentDiv.height()) {
                    // Content exceeds the visible area, show "See More" button
                    $(this).show();
                }
            });


            $(".project-see-more").on('click', function(e) {
            e.preventDefault();

            let project_id = $(this).attr("id");

            if ($("#content_"+project_id).hasClass("projects-text-limit")) {
                $("#content_"+project_id).removeClass("projects-text-limit");
                $("#content_"+project_id).addClass("projects-expanded");
            } else {
                $("#content_"+project_id).removeClass("projects-expanded");
                $("#content_"+project_id).addClass("projects-text-limit");
            }

            $("#" + project_id + " > i").toggleClass("fa-plus");
            $("#"+ project_id + " > i").toggleClass("fa-minus");

        });

        });


    </script>
@endsection
