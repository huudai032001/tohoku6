<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spots</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7//web-assets/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/spot-list.css">

        <script src="libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="libs/owl-carousel/owl.carousel.min.js"></script>
        
    </head>

    <body class="my-profile-page">


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

                <div class="spot-search-form">
                    <div class="container">
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
                        <div class="form-layout-1">
                            <div class="mb-30">
                                <input class="input-text" type="text" placeholder="キーワード">
                            </div>
                        </div>
                        <div class="text-align-center">
                            <button type="button" class="button-style-1 button submit-button">検索</button>
                        </div>
                        <div class="to-spot-register">
                            <a href="spot-register.html">スポット登録をする</a>
                        </div>
                    </div>
                </div>

                <div class="post-list-sort-options">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#n" class="active">新着順</a>
                            <a href="#n">いいね順</a>
                            <a href="#n">口コミ数順</a>
                            <a href="#n">ポイント順</a>
                        </div>
                    </div>
                </div>
                
                <section class="post-list">
                    <div class="container px-0">                        
                        
                        <div class="post-container">
                            <div class="post-row row">
                            @foreach($list_spot as $value)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="post-item-5 d-flex">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="upload/{{$value->image}}" alt="">
                                            </div>
                                            <a href="{{route('spot_detail',$value->id)}}">
                                                <div class="ratio thumb-image">
                                                    <img src="/web-assets/images/demo/1.png" alt="">
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
                                                <?php
                                                    $string = strip_tags($value->name);
                                                    if (strlen($string) > 20) {
                                                        // truncate string
                                                        $stringCut = substr($string, 0, 20);
                                                        $endPoint = strrpos($stringCut, ' ');
                            
                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '...';
                                                    }
                                                ?>

                                                <div class="item-title">{{$string}} .<span class="text-latin">RISING SUN</span></div>
                                            </a>
                                            <div class="counters d-flex align-items-center justify-content-end justify-content-lg-start">
                                                <div class="comment-count">
                                                    コメント
                                                    <div class="count text-latin ml-10">123</div>
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
                        <div class="load-more-button">
                            <img src="/web-assets/images/icons/reload.svg" alt="">
                        </div>

                    </div>
                </section>

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
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> グルメ
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> ショッピング
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" checked> <span class="checkmark"></span> 宿泊
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> 体験
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> 自然
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> SNS映え
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"> <span class="checkmark"></span> 歴史
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto panel_footer text-align-center">
                    <div class="button button-style-1">
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

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

</html>