<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/home.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        
    </head>

    <body class="home-page">


        <div id="wrapper">
            <div id="inner-wrapper">


                <!-- Menu bar -->
                <div class="nav-bar d-flex align-items-center justify-content-between">
                    <div class="nav-bar-left d-flex">
                        <div class="menu-button" data-toggle="nav-bar-panel">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="nav-bar-center d-flex justify-content-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/web-assets/images/number-6.svg" alt="Tohoku 6">
                            </a>
                        </div>
                    </div>
                    <div class="nav-bar-right d-flex justify-content-end">
                        <div class="user-menu-icons d-flex">
                            <div data-show-modal="#user-notification-modal">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/notification.svg" alt="notification">
                                    <div class="has-notification-sight"></div>
                                </div>
                            </div>
                            <a href="">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/star.svg" alt="favorite">
                                </div>
                            </a>
                            <a href="">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/search.svg" alt="search">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="nav-bar-panel">
                    <div class="button-close" data-toggle="nav-bar-panel">×</div>
                    <div class="profile-button">
                        @if(Auth::check())
                        <a href="{{route('myProfile',$info['id'])}}">
                            <div class="profile-image">
                                <img width="75" src="/web-assets/images/profile.svg" alt="profile">
                            </div>
                            <div class="profile-label">プロフィール</div>
                        </a>
                        @endif
                    </div>
                    <div class="nav-menu">
                        <ul class="ul-lv-1">
                            <li class="li-lv-1">
                                <a href="spot-register.html">スポット登録をする</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="my-profile.html">お気に入り</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="posts.html">スポットを探す</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="events.html">イベントを探す</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="features.html">フィーチャー記事</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="good-exchange.html">トウホクポイントを使う</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="about.html">トウホクシックスとは？</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="about-point.html">トウホクポイントとは？</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="faq.html">よくあるご質問</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="privacy-policy.html">プライバシーポリシー</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="term-of-service.html">利用規約</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="inquiry.html">お問い合わせ</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <!-- /Menu bar -->

                <section class="section-home-top">                    

                    <div class="banner-wrap">
                        <video class="background-video"  autoplay muted loop>
                          <source src="files/demo-footage.mp4" type="video/mp4" />
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

                                    <div class="area-select d-flex justify-content-center">
                                        <div class="custom-select-button button">
                                            エリアを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                            <input type="hidden" name="" id="">
                                        </div>
                                    </div>

                                    <div class="calendar-posts" >
                                        <!-- <div id="dom" class="aa owl-carousel owl-style-2 "></div> -->
                                        <div class="post-slider owl-carousel owl-style-2" id="dom">
                                            <!-- <div id="dome"></div> -->
                                            @foreach($list_event as $value)
                                            <div class="item">
                                                <div class="post-item-1">
                                                    <a href="event-detail.html">
                                                        <div class="thumb ratio thumb-hover-anim">
                                                            <img src="/uploads/{{$value->image}}" alt="">
                                                        </div>
                                                    </a>
                                                    <div class="item-content">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="flex-fill">
                                                                <div class="date text-latin">{{$value->created_at}} UP!</div>
                                                            </div>
                                                            <div class="flex-auto ml-20">
                                                                <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                                <span class="count text-latin">123</span>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <a href="event-detail.html">
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
                                            @foreach($all_event as $value)
                                            {{$value->event[0]->name}}
                                            <div class="item">
                                                <div class="post-item-2">
                                                    <a href="spot-detail.html">
                                                        <div class="thumb ratio thumb-hover-anim">
                                                            <img src="/uploads/{{$value->file_name}}" alt="">
                                                        </div>
                                                    </a>
                                                    <div class="item-content">
                                                        <div class="d-none d-sm-flex justify-content-end align-items-center">
                                                            <div class="comment-count">
                                                                コメント
                                                                <div class="count text-latin ml-10">{{$value->event[0]->namecount_comment}}</div>
                                                            </div>
                                                            <div class="favorite-count ml-20">
                                                                <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                                <span class="count text-latin">{{$value->event[0]->namefavorite}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="title">
                                                            <a href="post-detail.html">{{$value->event[0]->name}}・RISING SUN</a>
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
                            @foreach($list_spot as $value)
                            <div class="post-item-3">
                                <a href="{{route('spot_detail',$value->id)}}">
                                    <div class="thumb ratio thumb-hover-anim">
                                        <img src="/uploads/{{$value->image}}" alt="">
                                    </div>
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="title">{{$value->name}}</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">{{$value->created_at}} UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="" class="view-more button button-style-2">もっと見る</a>
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
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="event-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">EVENT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="spot-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">SPOT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="event-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">EVENT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="spot-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">SPOT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="event-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">EVENT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="spot-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">SPOT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="event-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">EVENT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post-item-4">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/web-assets/images/demo/2.png" alt="">
                                </div>
                                <a href="spot-detail.html">
                                    <div class="item-content d-flex flex-column justify-content-end">
                                        <div class="type">SPOT</div>
                                        <div class="title">全国花火競技大会「大曲の花火」</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="flex-fill">
                                                <div class="date text-latin">2022.10.10 UP!</div>
                                            </div>
                                            <div class="flex-auto ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-white.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
                                            <a href="{{route('event_detail',$value->id)}}">
                                                <div class="ratio thumb-image">
                                                    <img src="/uploads/{{$value->image}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content flex-fill d-flex flex-column justify-content-between">
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('spot_detail',$value->id)}}">
                                                <div class="item-title">{{$value->name}}・<span class="text-latin">RISING SUN</span></div>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="post-item-6">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                            </div>
                                            <a href="feature-detail.html">
                                                <div class="ratio thumb-image thumb-hover-anim">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="date">
                                                    2022.10.10<span class="day-of-week">[sun]</span>
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
                                                <a href="feature-detail.html">
                                                    全国花火競技大会「大曲の花火」
                                                </a>
                                            </div>
                                            <div class="item-desc">秋田県雄勝郡羽後町足田字五輪坂下43-4</div>
                                            <div class="counters d-flex align-items-center justify-content-end"> 
                                                <div class="favorite-count ml-20">
                                                    <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-30 d-flex justify-content-center">
                            <a href="" class="button-style-1 button">イベントを探す</a>
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
                                <div class="col-6 col-lg-3">
                                    <div class="post-item-7">
                                        <div class="thumb">                                            
                                            <a href="good-detail.html">
                                                <div class="ratio thumb-image">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <a href="good-detail.html">トウホクステッカー</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="post-item-7">
                                        <div class="thumb">                                            
                                            <a href="good-detail.html">
                                                <div class="ratio thumb-image">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <a href="good-detail.html">トウホクステッカー</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="post-item-7">
                                        <div class="thumb">                                            
                                            <a href="good-detail.html">
                                                <div class="ratio thumb-image">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <a href="good-detail.html">トウホクステッカー</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="post-item-7">
                                        <div class="thumb">                                            
                                            <a href="good-detail.html">
                                                <div class="ratio thumb-image">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <a href="good-detail.html">トウホクステッカー</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-30 d-flex justify-content-center">
                            <a href="goods.html" class="button-style-1 button">もっと見る</a>
                        </div>
                    </section>

                </div>


                <!-- Footer -->
                <div id="footer" class="bg-white">
                    <section class="footer-site-map">
                        <div style="display: flex ;justify-content: center; align-items: center; height: 420px; background-color: #B4B4B4;color: #fff;">
                            <b style="font-size: 16px;">サイトマップ</b>
                        </div>                        
                    </section>

                    <div class="container">
                        <ul class="footer-social-buttons d-flex align-items-center justify-content-center">
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/twitter.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/instagram.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/tiktok.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="copyright">
                        <div class="container">
                            tohoku6.co.jp
                        </div>
                    </div>
                </div>
                <!-- /Footer -->

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

        <div id="number-6-button-actions" class="modal modal-bottom">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <ul class="modal_menu">
                    <li>
                        <a href="spot-register.html">スポット登録をする</a>
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
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
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
                                    <input type="radio" name="area-select"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" checked> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1">
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
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="1"> <span class="checkmark"></span> グルメ
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="2"> <span class="checkmark"></span> ショッピング
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="3"> <span class="checkmark"></span> 宿泊
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="4"> <span class="checkmark"></span> 体験
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="5"> <span class="checkmark"></span> 自然
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="6"> <span class="checkmark"></span> SNS映え
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="7" > <span class="checkmark"></span> 歴史
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1" onclick="test()">
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

</html>