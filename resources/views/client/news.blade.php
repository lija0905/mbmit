@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/news.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid bottom-border-style">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="font-medium font-size-16 mb-4 border-width bottom-border-titles">
                    {{ __('client.news.news') }}
                </div>
                <div class="mt-4">
                    @foreach($news as $key => $item)
                        <div class="mb-4 pt-2 @if($key < $news->count() - 1) bottom-border-style @endif h-100" id="news_{{$item->id}}">
                            <div class="row h-100">
                                <div class="col-sm-7">
                                    <div class="pb-2">
                                        <h3 class="font-medium">
                                            @if(app()->getLocale() == "rs")
                                                {{ $item->naslov }}
                                            @elseif (app()->getLocale() == "pc")
                                                {{ Helper::latinToCyrillic($item->naslov) }}
                                            @else
                                                {{ $item->title }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1">
                                    @if(isset($item->photo))
                                        @if (count($item->photos) > 0)
                                        <a href="{{ route('client.get_gallery', ['news', $item->id]) }}" target="_blank">
                                            <img src="{{ asset('/storage/news/'.$item->photo) }}" class="w-25 news-image-style">
                                        </a>
                                        @else
                                        <div>
                                            <img src="{{ asset('/storage/news/'.$item->photo) }}" class="w-25 news-image-style">
                                        </div>
                                        @endif
                                    @endif
                                    <div class="clearfix">
                                        @if(app()->getLocale() == "rs")
                                            {!! nl2br(e($item->sadrzaj))  !!}
                                        @elseif (app()->getLocale() == "pc")
                                            {!! nl2br(e(Helper::latinToCyrillic($item->sadrzaj)))  !!}
                                        @else
                                            {!! nl2br(e($item->content )) !!}
                                        @endif
                                    </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-7" style="color: rgba(0, 0, 0, 0.5);">
                                    {{ date('d.m.Y', strtotime($item->created_at)) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-10 mr-2">{{ $news->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')@endsection
