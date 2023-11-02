@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/researchers.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.alumni.alumni') }}
                </div>
                <div class="row mb-4 pb-4">
                    @foreach($alumni as $researcher)
                        <div class="col-lg-2 col-md-5 col-sm-6">
                            <div class="font-medium mb-1 researcher-name">
                                @if(app()->getLocale() == "rs" || app()->getLocale() == "en")
                                    {{ $researcher->fullname }}
                                @elseif (app()->getLocale() == "pc")
                                    {{ Helper::latinToCyrillic( $researcher->fullname) }}
                                @endif
                            </div>
                            <figure class="researcher-image">
                                @if(isset($researcher->photo))
                                    <img src="{{ asset('/storage/researchers/'.$researcher->photo) }}" class="w-100">
                                @else
                                    <img src="{{ asset('/assets/img/default-profile-picture_1.webp') }}" class="w-100">
                                @endif
                            </figure>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-3 d-flex flex-column align-items-center p-2 pt-3 researcher-bio">
                            <div class="flex-column d-flex">
                                <span class="font-medium">
                                    @if( app()->getLocale() == "rs")
                                        {{ $researcher->titula }}
                                    @elseif (app()->getLocale() == "pc")
                                        {{ Helper::latinToCyrillic( $researcher->titula) }}
                                    @else
                                        {{ $researcher->title }}
                                    @endif
                                </span>
                                <br>
                                <span class="researcher-links">
                                     @if($researcher->email != null)
                                        Email: <a href="">{{ $researcher->email }}</a>
                                    @endif
                                     <br>
                                    @foreach($researcher->researcher_links as $link)
                                        {{ $link->link_name }}: <a href="">{{ $link->link }}</a> <br>
                                    @endforeach
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
