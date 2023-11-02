@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/client/index.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container-fluid m-auto bottom-border-style">
        <!-- Welcome Section -->
        <div class="row pt-4 mt-2 mb-5 welcome-margin">
            <div class="col-lg-5 col-md-12 col-sm-12 welcome-card-margin">
                <div class="card h-100 card-shadow">
                    <div class="card-body align-items-center">
                        @if(app()->getLocale() == "rs")
                            <h4 class="card-title font-medium">{{ $section->naslov }}</h4>
                            <p class="card-text">{!! nl2br(e($section->opis))  !!}</p>
                        @elseif (app()->getLocale() == "pc")
                            <h4 class="card-title font-medium">{{ Helper::latinToCyrillic($section->naslov) }}</h4>
                            <p class="card-text">{!! nl2br(e(Helper::latinToCyrillic($section->opis))) !!}</p>
                        @else
                            <h4 class="card-title font-medium">{{ $section->title }}</h4>
                            <p class="card-text">{!! nl2br(e($section->description))  !!} </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 mb-4">
                <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner overflow-visible">
                        @foreach($main_slider as $slide)
                            <div class="carousel-item @if($slide->id == 1) active @endif">
                                <div class="slider-height">
                                    <a href="{{ $slide->link }}" target="_blank"><img class="d-block w-100 h-100"
                                                                                      @if(Storage::exists('public/main-slider/'.$slide->photo)) src="{{ asset('storage/main-slider/'.$slide->photo) }}" @else src="{{ asset('assets/img/'. $slide->photo) }}" @endif
                                                                                      alt="First slide"></a>
                                </div>
                                <div class="carousel-caption-custom">
                                    <div
                                        class="card @if($slide->id == 1) bg-color-blue-slide @elseif($slide->id == 2) bg-red-color @elseif($slide->id == 3) bg-theme-yellow @endif">
                                        <div class="align-items-center p-2">
                                            @if(app()->getLocale() == "rs")
                                                <h6>{{ $slide->naslov }}</h6>
                                                <span style="font-size: 14px;">{{ $slide->opis }}</span>
                                            @elseif (app()->getLocale() == "pc")
                                                <h6>{{ Helper::latinToCyrillic($slide->naslov) }}</h6>
                                                <span style="font-size: 14px;">{{ Helper::latinToCyrillic($slide->opis) }}</span>
                                            @else
                                                <h6>{{ $slide->title }}</h6>
                                                <span style="font-size: 14px;">{{ $slide->description }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- News Slider -->
        <div class="row bg-theme-light news-row pt-2 pb-5 px-4">
            <div class="col-sm-6" style="padding: 20px 0 0 50px;">
                <a class="btn px-3 font-medium text-white bg-red-color" style="font-size:20px ; cursor: unset;">
                    {{ __('client.news.latest_news') }}
                </a>
            </div>
            <div class="col-sm-6 d-flex justify-content-end align-items-center" style="padding: 15px 42px 0 0">
                <a class="btn archive-news" href="{{ route('client.news') }}">{{ __('client.news.archive') }}</a>
            </div>
            <div class="MultiCarousel m-2" data-items="1,2,3" data-slide="1" id="MultiCarousel" data-interval="false">
                <div class="MultiCarousel-inner">
                    @foreach($news as $item)
                        <div class="item">
                            <div class="pad15">
                                <div class="card h-100 card-shadow">
                                    <div class="card-body align-items-center">
                                        <a href="/news#news_{{ $item->id }}" style="color: unset!important;">
                                            <h4 class="card-title font-medium">
                                                @if( app()->getLocale() == "rs")
                                                    {{ $item->naslov }}
                                                @elseif (app()->getLocale() == "pc")
                                                    {{ Helper::latinToCyrillic($item->naslov) }}
                                                @elseif (app()->getLocale() == "en")
                                                    {{ $item->title }}
                                                @endif
                                            </h4>
                                        </a>
                                        <p class="card-text news-text-limit" style="color: unset!important; ">
                                            @if( app()->getLocale() == "rs")
                                                {!! nl2br(e($item->sadrzaj))  !!}
                                            @elseif (app()->getLocale() == "pc")
                                                {!! nl2br(e(Helper::latinToCyrillic($item->sadrzaj)))  !!}
                                            @else
                                                {!! nl2br(e($item->content))  !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="card-footer news-card-footer">
                                        {{ date('d.m.Y', strtotime($item->created_at)) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-dark leftLst"><</button>
                <button class="btn btn-dark rightLst">></button>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
{{--    https://bootsnipp.com/snippets/zDQkr--}}
    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else  {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>

@endsection
