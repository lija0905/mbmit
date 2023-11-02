@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/researchers.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.researchers.researchers') }}
                </div>
                <div class="font-medium mb-5" style="font-size: 1.3rem;">
                    <a class="btn nav-link bg-color-blue px-4" style="cursor:unset;"> {{ __('client.researchers.seniors') }}</a>
                </div>
                <div class="row mb-4 pb-4">
                @foreach($senior_researchers as $senior)
                        <div class="col-lg-3 col-md-5 col-sm-6">
                            <div class="font-medium mb-1 researcher-name">
                                @if(app()->getLocale() == "rs")
                                    {{ $senior->fullname }}
                                @elseif (app()->getLocale() == "pc")
                                    {{ Helper::latinToCyrillic( $senior->fullname) }}
                                @endif
                            </div>
                            <figure class="researcher-image">
                                @if(isset($senior->photo))
                                    <img src="{{ asset('/storage/researchers/'.$senior->photo) }}" class="w-100">
                                @else
                                    <img src="{{ asset('/assets/img/default-profile-picture_1.webp') }}" class="w-100">
                                @endif
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-3 d-flex flex-column align-items-center p-2 pt-3 researcher-bio">
                            <div class="d-flex flex-column">
                                <span class="font-medium">
                                    @if( app()->getLocale() == "rs")
                                        {{ $senior->titula }}
                                    @elseif (app()->getLocale() == "pc")
                                        {{ Helper::latinToCyrillic( $senior->titula) }}
                                    @else
                                        {{ $senior->title }}
                                    @endif
                                </span>

                                <br>
                                <span class="researcher-links">
                                    @if($senior->email != null)
                                        Email: <a href="">{{ $senior->email }}</a>
                                    @endif
                                    <br>
                                    @foreach($senior->researcher_links as $link)
                                            {{ $link->link_name }}: <a href="">{{ $link->link }}</a> <br>
                                    @endforeach
                                </span>

                            </div>
                        </div>
                @endforeach
                </div>
                <div class="font-medium mb-5" style="font-size: 1.3rem;">
                    <a class="btn nav-link bg-color-blue px-4" style="cursor:unset;">  {{ __('client.researchers.juniors') }} </a>
                </div>
                <div class="row mb-4 pb-4">
                @foreach($junior_researchers as $junior)
                        <div class="col-lg-3 col-md-5 col-sm-6 mb-2">
                            <div class="font-medium mb-1 researcher-name">
                                @if(app()->getLocale() == "rs")
                                    {{ $junior->fullname }}
                                @elseif (app()->getLocale() == "pc")
                                    {{ Helper::latinToCyrillic( $junior->fullname) }}
                                @endif
                            </div>
                            <figure class="researcher-image">
                                @if(isset($junior->photo))
                                    <img src="{{ asset('/storage/researchers/'.$junior->photo) }}" class="w-100">
                                @else
                                    <img src="{{ asset('/assets/img/default-profile-picture_1.webp') }}" class="w-100">
                                @endif
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-3 d-flex flex-column  align-items-center p-2 mb-2 researcher-bio">
                            <div class="d-flex flex-column">
                                <span class="font-medium">
                                    @if( app()->getLocale() == "rs")
                                        {{ $junior->titula }}
                                    @elseif (app()->getLocale() == "pc")
                                        {{ Helper::latinToCyrillic( $junior->titula) }}
                                    @else
                                        {{ $junior->title }}
                                    @endif
                                </span>
                                <br>
                                <span class="researcher-links">
                                    @if($junior->email!= null)
                                        Email:  <a href="">{{ $junior->email }}</a>
                                    @endif
                                    <br>
                                    @foreach($junior->researcher_links as $link)
                                        {{ $link->link_name }}: <a href="">{{ $link->link }}</a> <br>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                @endforeach
                </div>
                <div class="font-medium mb-5" style="font-size: 1.3rem;">
                    <a class="btn nav-link bg-color-blue px-4" style="cursor:unset;">  {{ __('client.researchers.external') }} </a>
                </div>
                <div class="row mb-4 pb-4">
                @foreach($external_researchers as $external)
                    <div class="col-lg-2 col-md-5 col-sm-6 mb-2">
                        <figure class="researcher-image">
                            @if(isset($external->photo))
                                <img src="{{ asset('/storage/researchers/'.$external->photo) }}" class="w-100">
                            @else
                                <img src="{{ asset('/assets/img/default-profile-picture_1.webp') }}" class="w-100">
                            @endif
                        </figure>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-3 d-flex flex-column align-items-center mb-2 researcher-bio">
                        <div class="d-flex flex-column">
                            <span class="font-medium">
                                @if(app()->getLocale() == "rs" || app()->getLocale() == "en")
                                    {{ $external->fullname }}
                                @elseif (app()->getLocale() == "pc")
                                    {{ Helper::latinToCyrillic( $external->fullname) }}
                                @endif
                            </span>
                            <span class="researcher-links">
                                @if( app()->getLocale() == "rs")
                                    {{ $external->titula }}
                                @elseif (app()->getLocale() == "pc")
                                    {{ Helper::latinToCyrillic( $external->titula) }}
                                @else
                                    {{ $external->title }}
                                @endif
                            </span>
                        </div>

                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')@endsection
