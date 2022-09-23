<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spot detail</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7//web-assets/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/spot-detail.css">

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

                <section class="section-spot-detail">
                    <div class="container">
                        <div class="section_header">
                            <div class="section_title">
                                <img src="/web-assets/images/tohoku-6-spot.svg" alt="">
                            </div>
                            <div class="action-button" data-show-modal="#modal-spot-actions">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="mb-20 d-flex justify-content-between">
                            <div class="area d-flex align-items-center">
                                <div class="icon"></div>
                                <img src="/web-assets/images/area/akita.svg" alt="">
                            </div>
                            <div class="icon-favorite">
                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                            </div>
                        </div>
                        <h1 class="spot-title">{{$info_spot->name}}・<span class="text-latin">RISING SUN</span></h1>
                        <div class="location">{{$info_spot->location}}</div>
                        <div class="author">
                            <span class="text-author">投稿者：</span> <span class="author-name">{{$info_spot->author}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="tags">
                                <span class="tag">自然</span>
                                <span class="tag">宿泊</span>
                            </div>
                            <div class="favorite-count d-flex align-items-center">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/heart-gray.svg" alt="">
                                </div>
                                <div class="count-number">123</div>
                            </div>
                        </div>                        
                    </div>
                    <div class="spot-images">
                        <div class="container">
                            <div class="slider owl-carousel">
                                <div class="item">
                                    <img src="/web-assets/images/demo/1.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="/web-assets/images/demo/1.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="/web-assets/images/demo/1.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="/web-assets/images/demo/1.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="/web-assets/images/demo/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="post-content-text">
                            {{$info_spot->intro}}
                        </div>
                    </div>
                </section>

                <section class="section-post-reviews">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
                            <div class="title-post-reviews">
                                みんなの口コミ
                            </div>
                            <div class="toggle-button">+</div>
                        </div>
                    </div>
                    <div class="toggle-content">
                        <div class="post-my-review-form">
                            <div class="container">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <img src="/web-assets/images/profile.svg" alt="">
                                    </div>
                                    <div class="user-name">
                                        TOGASHI-DANGAN
                                    </div>
                                </div>
                                <div class="ml-50">
                                    <textarea class="textarea review-content-input" rows="4"></textarea>
                                </div>
                                <div class="text-align-center">
                                    <button class="button button-style-3">口コミを投稿する</button>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="post-container">
                                <div class="post-row row">
                                    <div class="col-12">
                                        <div class="review-item">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="/web-assets/images/profile.svg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        TOGASHI-DANGAN
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="review-time">1日前</div>
                                                    <div class="toggle-action-button d-flex align-items-center" data-show-modal="#modal-review-actions">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="review-item">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="/web-assets/images/profile.svg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        TOGASHI-DANGAN
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="review-time">1日前</div>
                                                    <div class="toggle-action-button d-flex align-items-center" data-show-modal="#modal-review-actions">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="load-more-review text-align-center">
                            <button class="button button-style-3">もっと見る（12件）</button>
                        </div>
                    </div>
                </section>

                
                <section class="section-nearby-map">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="container px-0">
                        <div class="ratio" style="--ratio:1.62;">

                            <div style="background-color: #E3E3E3;">

                            </div>

                        </div>
                    </div>
                </section>

                <section class="section-related-spots">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="spot-detail.html">
                                            <div class="ratio thumb-image">
                                                <img src="/web-assets/images/demo/1.png" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">2022.10.10 UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="spot-detail.html">
                                                <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
                                            </a>
                                            <div class="item-desc">
                                                秋田県雄勝郡羽後町足田字五輪坂下43-4
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                        <span class="tag">アウトドア</span>
                                                        <span class="sep">|</span>
                                                        <span class="tag">いいね</span>
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="spot-detail.html">
                                            <div class="ratio thumb-image">
                                                <img src="/web-assets/images/demo/1.png" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">2022.10.10 UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="spot-detail.html">
                                                <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
                                            </a>
                                            <div class="item-desc">
                                                秋田県雄勝郡羽後町足田字五輪坂下43-4
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                        <span class="tag">アウトドア</span>
                                                        <span class="sep">|</span>
                                                        <span class="tag">いいね</span>
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="spot-detail.html">
                                            <div class="ratio thumb-image">
                                                <img src="/web-assets/images/demo/1.png" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">2022.10.10 UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="spot-detail.html">
                                                <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
                                            </a>
                                            <div class="item-desc">
                                                秋田県雄勝郡羽後町足田字五輪坂下43-4
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                        <span class="tag">アウトドア</span>
                                                        <span class="sep">|</span>
                                                        <span class="tag">いいね</span>
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </section>

                <section class="section-nearby-spots">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                            @foreach($list_spot as $value)
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="{{route('spot_detail',$value->id)}}">
                                            <div class="ratio thumb-image">
                                                <img src="/web-assets/images/demo/1.png" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">{{$value->created_at}}</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('spot_detail',$value->id)}}">
                                                <div class="item-title">{{$value->name}}・<span class="text-latin">RISING SUN</span></div>
                                            </a>
                                            <div class="item-desc">
                                            {{$value->address}}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                        <span class="tag">アウトドア</span>
                                                        <span class="sep">|</span>
                                                        <span class="tag">いいね</span>
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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

        <div id="modal-spot-actions" class="modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">このスポットについて</div>
                <ul class="modal_menu">
                    <li>
                        <a href="edit-edit.html">編集する</a>
                    </li>
                    <li>
                        <a href="#" data-to-report-spot>事務局に報告する</a>
                    </li>                    
                </ul>
            </div>
        </div>

        <div id="modal-review-actions" class="modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">この口コミについて</div>
                <ul class="modal_menu">
                    <li>
                        <a href="#" data-to-delete-review>削除する</a>
                    </li>
                    <li>
                        <a href="#" data-to-report-review>事務局に報告する</a>
                    </li>                    
                </ul>
            </div>
        </div>

        <div id="modal-report" class="modal modal-report">
            <div class="modal_backdrop"></div>            
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">事務局に報告する</div>
                <div class="modal-report_form">
                    <div class="note">
                        ガイドライン違反などお気付きの点があればお知らせください。 報告いただいた内容については、運営側で随時確認を行います。 返信は致しませんのでご了承ください。
                    </div>
                    <div class="form-layout-1">
                        <textarea class="textarea report-content" rows="6"></textarea>
                        <div class="text-align-center" style="margin-top: 15px;">
                            <button class="button button-style-1 button-form-submit">送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        
        <div id="ajax-loading-overlay" class="ajax-loading-overlay">
            <div class="ajax-loading_container">
                <div class="loading-icon"></div>
                <div class="result-message"></div>
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