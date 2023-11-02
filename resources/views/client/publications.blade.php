@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/publications.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width-publications bottom-border-titles">
                    {{ __('client.publications.publications') }} - {{ __('client.publications.'.str_replace(' ', '_', strtolower($publications[0]->publication_type->type_name_en))) }}
                </div>
                <div class="mt-4 pt-4 publications-div">
                    @foreach($publications as $key => $publication)
                        <div class="mb-4 publication-div @if($key < $publications->count() - 1) bottom-border-style @endif" id="publication_{{ $publication->id }}">
                            <div class="pb-4">
                                <h5 class="font-medium">
                                    @if(app()->getLocale() == "rs")
                                        {{ $publication->naziv }}
                                    @elseif (app()->getLocale() == "pc")
                                        {{ Helper::latinToCyrillic($publication->naziv) }}
                                    @else
                                        {{ $publication->title }}
                                    @endif
                                </h5>
                                <div>
                                    @foreach($publication->authors as $index => $author)
                                        <span>
                                            @if(app()->getLocale() == "rs" || app()->getLocale() == "en")
                                                {{ $author->fullname }}@if($index < $publication->authors->count() - 1), @endif
                                            @elseif (app()->getLocale() == "pc")
                                                {{ Helper::latinToCyrillic( $author->fullname) }}@if($index < $publication->authors->count() - 1), @endif
                                            @endif
                                            </span>
                                    @endforeach
                                </div>
                                <div>
                                    <a href="{{ $publication->link }}" class="publication-link" target="_blank">{{ $publication->link }} </a>
                                </div>
                                @if(isset($publication->opis) || isset($publication->abstract))
                                    <div class="mb-3">
                                        <a class="abstract-click font-medium" data-toggle="collapse" href="#abstractContent_{{$publication->id}}" role="button" aria-expanded="false" aria-controls="abstractContent_{{$publication->id}}" id="{{$publication->id}}">{{ __('client.publications.abstract') }}  <i class="fa fa-plus cursor-pointer toggle-abstract-icon"></i></a>
                                    </div>
                                    <div class="collapse" id="abstractContent_{{$publication->id}}">
                                        <div class="card card-shadow bg-color-blue">
                                            <div class="card-body">
                                                @if(app()->getLocale() == "rs" && isset($publication->opis))
                                                   {!! nl2br(e($publication->opis ))  !!}
                                                @elseif (app()->getLocale() == "pc" && isset($publication->opis))
                                                    {!! nl2br(e(Helper::latinToCyrillic($publication->opis)))  !!}
                                                @elseif(isset($publication->abstract))
                                                    {!! nl2br(e($publication->abstract))  !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $publications->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

        <script>

            $(document).ready(function(){

                $(".abstract-click").on('click', function(){
                    let publication_id = $(this).attr("id");

                    if ($("#" +publication_id + " > i").hasClass("fa-plus")) {
                        $("#abstractContent_"+publication_id).collapse('show');
                    } else $("#abstractContent_"+publication_id).collapse('hide');


                    $("#" +publication_id + " > i").toggleClass("fa-plus");
                    $("#"+ publication_id + " > i").toggleClass("fa-minus");
                });

            });

        </script>

@endsection
