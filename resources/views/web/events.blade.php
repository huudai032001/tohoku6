<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7//web-assets/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/event-list.css">

        <script src="libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="libs/owl-carousel/owl.carousel.min.js"></script>
        
    </head>

    <body>


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
                        <a href="my-profile.html">
                            <div class="profile-image">
                                <img width="75" src="/web-assets/images/profile.svg" alt="profile">
                            </div>
                            <div class="profile-label">プロフィール</div>
                        </a>
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

                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="/web-assets/images/tohoku-6-calendar.svg" alt="">
                        </div>
                    </div>

                    <div class="container px-0">
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
                    </div>

                    <div class="container text-align-center">
                        <div class="area-select d-flex justify-content-center">
                            <div class="custom-select-button button">
                                エリアを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                <input type="hidden" name="" id="">
                            </div>
                        </div>

                        <div style="padding: 25px 0;">
                            <button type="button" class="button-style-1 button submit-button">検索</button>
                        </div>
                    </div>
                </div>

                <div class="post-container">
                    <div class="post-row row">
                        @foreach($list_events as $value)
                        <div class="col-md-6 col-lg-4">
                            <div class="post-item-9">
                                <div class="thumb">
                                    <div class="icon-star">
                                        <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                    </div>
                                    <a href="{{route('event_detail',$value->id)}}">
                                        <div class="ratio thumb-image thumb-hover-anim">
                                            <img src="/web-assets/images/demo/1.png" alt="">
                                        </div>
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
                                        <a href="{{route('event_detail',$value->id)}}">
                                            {{$value->name}}
                                        </a>
                                    </div>
                                    <div class="item-desc">{{$value->location}}</div>
                                    <div class="counters d-flex align-items-center justify-content-between"> 
                                        <div class="tags d-flex align-items-center">
                                            <span class="tag">花火</span>
                                            <span class="tag">夏祭り</span>
                                        </div>
                                        <div class="favorite-count ml-20">
                                            <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                            <span class="count text-latin">123</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div style="padding: 25px 0;">
                    <div class="container">
                        <div class="simple-paginator d-flex justify-content-between align-items-center">
                            <a href="#" class="prev">
                                <img src="/web-assets/images/angle-left.svg" alt="">
                            </a>
                            <div class="page-num">
                                <span class="current-page-num">1</span>/<span class="total-page-num">20</span>
                            </div>
                            <a href="#" class="next">
                                <img src="/web-assets/images/angle-right.svg" alt="">
                            </a>
                        </div>
                        <div class="mt-20 text-align-center">
                            <a href="#" class="button-style-1 button">次の10件を見る</a>
                        </div>
                    </div>
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


        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

</html>