@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/home.css">
        <link rel="stylesheet" href="/web-assets/css/index.css">
    @endsection

    @section('content')

    <body class="home-page">
        <div id="wrapper">
            <div id="inner-wrapper">


                <section class="section-home-top">                    

                    <div class="banner-wrap">
                        <video class="background-video"  autoplay muted loop>
                          <source src="/web-assets/files/demo-footage.mp4" type="video/mp4" />
                        </video>


                        <div class="container">
                            <div class="short-desc">東北をみんなで遊び尽くすスポット紹介サイト</div>
                            <div class="tohoku-6">
                                <img src="/web-assets/images/tohoku-6.svg" alt="Tohoku 6">
                            </div>
                        </div>
                    </div>

                    <div class="posts-panel">
                        <div class="section-posts-inner">
                            <div class="tabs d-flex justify-content-center">
                                <div class="tab active" data-tab="calendar">
                                    <img src="/web-assets/images/tohoku-6-calendar.svg" alt="Tohoku 6 calendar">
                                </div>
                                <div class="tab" data-tab="spot">
                                    <img src="/web-assets/images/tohoku-6-spot.svg" alt="Tohoku 6 spot">
                                </div>
                            </div>
                            <div class="tab-panels">
                                <div class="tab-panel active" data-tab="calendar">

                                    <div class="cadendar-select">
                                        <div class="calendar-month-select d-sm-flex justify-content-center">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="arrow arrow-left">
                                                    <img src="/web-assets/images/arrow-left.svg" alt="">
                                                </div>
                                                <div class="month-label">
                                                    <span class="year-num"></span>.<span class="month-num"></span>
                                                    <span class="month-name"></span>
                                                </div>
                                                <div class="arrow arrow-right">
                                                    <img src="/web-assets/images/arrow-right.svg" alt="">
                                                </div>
                                            </div>
                                            <input type="hidden" name="year">
                                            <input type="hidden" name="month">
                                        </div>

                                        <div class="calendar-day-select">
                                            <div class="slider owl-carousel owl-style-1"></div>
                                            <input type="hidden" name="day">
                                        </div>
                                    </div>

                                    <div class="area-select-two d-flex justify-content-center">
                                        <div class="custom-select-button button">
                                            エリアを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                            <input type="hidden" name="" id="">
                                        </div>
                                    </div>

                                    <div class="calendar-posts" >
                                        <div class="post-slider owl-carousel owl-style-2" id="dom">
                                            @foreach($list_event as $value)
                                            <div class="item">
                                                <div class="post-item-1">
                                                    <a href="{{route('event_detail',$value->alias)}}">
                                                        @if($image = $value->image)
                                                        <div class="thumb ratio thumb-hover-anim">
                                                            <img src="{{$image->getUrl()}}" alt="">
                                                        </div>
                                                        @endif
                                                    </a>
                                                    <div class="item-content">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="flex-fill">
                                                                <div class="date text-latin">{{$value->created_at}} UP!</div>
                                                            </div>
                                                            <div class="flex-auto ml-20">
                                                                <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                                <span class="count text-latin">{{$value->favorite}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <a href="{{route('event_detail',$value->alias)}}">
                                                            {{$value->name}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-panel" data-tab="spot">

                                    <div class="spot-filter-options d-flex justify-content-center">
                                        <div>
                                            <div class="py-30 row space-x-10 space-y-10 justify-content-center">
                                                <div class="col-auto">
                                                    <div class="custom-select-button button area-select">
                                                        エリアを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                                        <input type="hidden" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-select-button button category-select">
                                                        カテゴリを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                                        <input type="hidden" name="" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="button-style-1 button d-block w-100 submit-button">検索</button>
                                        </div>
                                    </div>

                                    <div class="spot-posts">
                                        <div class="post-slider owl-style-2 owl-carousel list-category" id="dom-category">

                                            @foreach($all_event as $event)
                              
                                            <div class="item">
                                                <div class="post-item-2">
                                                    <a href="{{route('event_detail',$event->alias)}}">
                                                        @if($image = $event->image)
                                                        <div class="thumb ratio thumb-hover-anim">
                                                            <img src="{{$image->getUrl()}}" alt="">
                                                        </div>
                                                        @endif
                                                    </a>
                                                    <div class="item-content">
                                                        <div class="d-none d-sm-flex justify-content-end align-items-center">
                                                            <div class="comment-count">
                                                                コメント
                                                                <div class="count text-latin ml-10">{{$event->count_comment}}</div>
                                                            </div>
                                                            <div class="favorite-count ml-20">
                                                                <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                                <span class="count text-latin">{{$event->favorite}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <a href="{{route('event_detail',$event->alias)}}">{{$event->name}}・</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="number-6-black-white d-lg-none">
                    <img src="/web-assets/images/number-6-white.svg" alt="Tohoku 6">
                </div>
                <section class="section-tohoku-media">
                    <div class="section-bg"></div>
                    <div class="section-content">
                        <div class="section-title">
                            <img src="/web-assets/images/tohoku-media.svg" alt="">
                        </div>
                        <div class="slider owl-carousel owl-style-3">
                            @foreach($list_spot as $spot)
                            <div class="post-item-3">
                                <a href="{{route('spot_detail',$spot->alias)}}">
                                    @if($image = $spot->image)
                                    <div class="thumb ratio thumb-hover-anim">
                                        <img src="{{$image->getUrl()}}" alt="">
                                    </div>
                                    @endif
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="title">{{$spot->name}}</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">{{$spot->created_at}} UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">{{$spot->favorite}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('list_spot')}}" class="view-more button button-style-2">もっと見る</a>
                        </div>
                    </div>
                </section>

                <section class="section-pickup">
                    <div class="section-bg"></div>
                    <div class="section-content">
                        <div class="section-title">
                            <img src="/web-assets/images/pickup.svg" alt="">
                        </div>
                        <div class="slider owl-carousel owl-style-3">
                            @foreach($favorite_event as $faEvent)
                            <div class="post-item-4">
                                @if($image = $faEvent->image)
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                                @endif
                                <a href="{{route('event_detail',$value->alias)}}">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">EVENT</div>
                                        <div class="title">{{$faEvent->name}}</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">{{$faEvent->created_at}} UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">{{$faEvent->favorite}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @foreach($favorite_spot as $faSpot)
                            <div class="post-item-4">
                                @if($image = $faSpot->image)
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                                @endif
                                <a href="{{route('spot_detail',$value->alias)}}">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">SPOT</div>
                                        <div class="title">{{$faSpot->name}}</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">{{$faSpot->created_at}} UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">{{$faSpot->favorite}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>                        
                    </div>
                </section>

                <div class="bg-white">
                    <section class="section-newest-posts">
                        <div class="container">
                            <div class="section-header">
                                <div class="title d-flex align-items-center justify-content-md-center">
                                    <div>
                                        <img src="/web-assets/images/tohoku-6-spot.svg" alt="">
                                    </div>
                                    <span class="ml-30">直近のイベント</span>
                                </div>
                                <div class="desc">東北で開催されるイベントをご紹介。</div>
                            </div>                            
                        </div>
                        <div class="post-container">
                            <div class="post-row row">
                                @foreach($list_upcoming_spot as $value)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="post-item-5 d-flex">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="{{route('event_detail',$value->alias)}}">
                                                @if($image = $value->image)
                                                <div class="ratio thumb-image">
                                                    <img src="{{$image->getUrl()}}" alt="">
                                                </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="item-content flex-fill d-flex flex-column justify-content-between">
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('spot_detail',$value->alias)}}">
                                                <div class="item-title">{{$value->name}}・</div>
                                            </a>
                                            <div class="counters d-flex align-items-center justify-content-end justify-content-lg-start">
                                                <div class="comment-count">
                                                    コメント
                                                    <div class="count text-latin ml-10">{{$value->count_comment}}</div>
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">{{$value->favorite}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-30 d-flex justify-content-center">
                            <a href="{{route('list_spot')}}" class="button-style-1 button">スポットを探す</a>
                        </div>
                    </section>

                    <section class="section-newest-posts">
                        <div class="container">
                            <div class="section-header">
                                <div class="title d-flex align-items-center justify-content-md-center">
                                    <div>
                                        <img src="/web-assets/images/tohoku-6-calendar.svg" alt="">
                                    </div>
                                    <span class="ml-30">新着スポット</span>
                                </div>
                                <div class="desc">みんなが登録した、東北のおすすめスポット。</div>
                            </div>                            
                        </div>
                        <div class="post-container">
                            <div class="post-row row">
                                @foreach($list_feature as $value)
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="{{route('featureDetail',$value->alias)}}">
                                                @if($image = $value->image)
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="{{$image->getUrl()}}" alt="">
                                                </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                {{$value->time_start}}<span class="day-of-week">[sun]</span>
                                                </div>
                                                <div class="area d-flex align-items-center">
                                                    <div class="icon"></div>
                                                    <div>
                                                        <img src="/web-assets/images/area/akita.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                            <div class="item-title">
                                                <a href="{{route('featureDetail',$value->alias)}}">
                                                    {{$value->name}}
                                                </a>
                                            </div>
                                            <div class="item-desc">{{$value->location}}</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">{{$value->favorite}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-30 d-flex justify-content-center">
                            <a href="{{route('list_events')}}" class="button-style-1 button">イベントを探す</a>
                        </div>
                    </section>

                    <section class="section-goods">
                        <div class="container">
                            <div class="section-header">
                                <div class="title d-flex align-items-center justify-content-md-center pb-0 pb-md-30">
                                    <div>
                                        <img src="/web-assets/images/tohoku-goods.svg" alt="">
                                    </div>
                                    <span class="ml-30">ポイント交換グッズ</span>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach($list_goods as $goods)
                                <div class="col-6 col-lg-3">
                                    <div class="post-item-7">
                                        <div class="thumb">                                            
                                            <a href="{{route('goods_detail',$goods->alias)}}">
                                            @if($image = $value->image)
                                                <div class="ratio thumb-image">
                                                    <img src="{{$image->getUrl()}}" alt="">
                                                </div>
                                            @endif
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <a href="{{route('goods_detail',$goods->alias)}}">{{$goods->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-30 d-flex justify-content-center">
                            <a href="{{route('list_goods')}}" class="button-style-1 button">もっと見る</a>
                        </div>
                    </section>

                </div>


            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

        <div id="number-6-button-actions" class="modal modal-bottom">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <ul class="modal_menu">
                    <li>
                        <a href="{{route('spotRegister')}}">スポット登録をする</a>
                    </li>
                    <li>
                        <a href="#n">トウホクポイントを使う</a>
                    </li>
                    <li>
                        <a href="#n">トウホクシックスとは？</a>
                    </li>
                    <li>
                        <a href="#n">トウホクポイントとは？</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="user-notification-modal" class="modal user-notification-modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">通知</div>
                <ul class="user-notification_list custom-scrollbar">
                    @if(Auth::check())
                        @if($notifi = Auth::user()->getNotifi())
                            @foreach($notifi as $noti)
                            <li class="d-flex align-items-center">
                                <div class="date">{{$noti->created_at}}</div>
                                <div class="flex-fill content">{{$noti->feedback}}</div>
                            </li>
                            @endforeach
                        @endif
                    @endif
                </ul>
            </div>
        </div>


        <div class="area-select-panel toggle-select-panel d-flex justify-content-lg-center align-items-lg-center">
            <div class="backdrop"></div>
            <div class="toggle-select-panel_dialog  d-flex flex-column">
                <div class="flex-auto panel_header">
                    <div class="panel_title">エリアを選択</div>
                    <div class="button-close">×</div>
                </div>
                <div class="panel_body flex-fill">
                    <div class="number-6">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="area-selection-list">
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Akita"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Akita
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Aomori"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Aomori
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" checked value="Fukushima"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Fukushima
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Iwate"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Iwate
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Miyagi"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Miyagi
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Yamagata"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Yamagata
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1" onclick="find_location()">
                        絞り込む
                    </div>
                </div>
            </div>
        </div>

        <div class="area-select-panel-two toggle-select-panel d-flex justify-content-lg-center align-items-lg-center">
            <div class="backdrop"></div>
            <div class="toggle-select-panel_dialog  d-flex flex-column">
                <div class="flex-auto panel_header">
                    <div class="panel_title">エリアを選択</div>
                    <div class="button-close">×</div>
                </div>
                <div class="panel_body flex-fill">
                    <div class="number-6">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="area-selection-list">
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Akita"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Akita
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Aomori"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Aomori
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" checked value="Fukushima"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Fukushima
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Iwate"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Iwate
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Miyagi"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Miyagi
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="Yamagata"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Yamagata
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1" onclick="find_location_two()">
                        絞り込む
                    </div>
                </div>
            </div>
        </div>

        <div class="category-select-panel toggle-select-panel d-flex justify-content-lg-center align-items-lg-center">
            <div class="backdrop"></div>
            <div class="toggle-select-panel_dialog  d-flex flex-column">
                <div class="flex-auto panel_header">
                    <div class="panel_title">カテゴリを選択</div>
                    <div class="button-close">×</div>
                </div>
                <div class="panel_body flex-fill">                    
                    <div class="category-selection-list">
                        <div class="row space-x-20 space-y-20">
                            @foreach($category as $value)
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="{{$value->id}}"> <span class="checkmark"></span> {{$value->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1" onclick="find_category()">
                        絞り込む
                    </div>
                </div>
            </div>
        </div>


        <div class="fixed-number-6 d-flex align-items-center justify-content-center" data-show-modal="#number-6-button-actions">
            <div>
                <img src="/web-assets/images/number-6.svg" alt="" class="d-block">
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/index.js"></script>
        
    </body>
    @endsection