<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Features</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/libs/lightslider/css/lightslider.min.css">
        
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/feature-detail.css">

        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        <script src="/web-assets/libs/lightslider/js/lightslider.min.js"></script>
        
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

                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="/web-assets/images/tohoku-media.svg" alt="">
                        </div>
                    </div>
                </div>

                <section class="feature-detail">
                    <div class="container">

                        <div class="image-gallery">
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/upload/{{$feature->image}}" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                            <div class="item" data-thumb="/web-assets/images/demo/1.png">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </div>
                        </div>

                        <div style="padding: 15px 0 20px;">
                            <div class="date">{{$feature->created_at}} UP!</div>
                            <div class="post-title">{{$feature->name}}</div>
                            <div class="d-flex justify-content-end">
                                <div class="favorite-count">
                                    <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                    <span class="count">{{$feature->favorite}}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="image-carousel">
                        <div class="container">
                            <div class="slider owl-carousel">
                                <?php
                                $sub_image = trim($feature->sub_image , '"[]');
                                $arr = explode(",", $sub_image);
                                if($arr[0] != ''){
                                    for($i =0;$i< count($arr);$i++)
                                    {
                                        $value = trim($arr[$i] , '"');
                                ?>
                                <div class="item">
                                    <img src="/upload/{{$value}}" alt="" onerror='this.onerror=null;this.src="/web-assets/images/demo/1.png"'>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="post-main-content typo-default py-30">
                            <h3>{{$feature->name}}</h3>
                            <p>
                            {{$feature->intro}}
                            </p>
                            <figure class="aligncenter">
                                <img src="/upload/{{$feature->image}}" alt="">
                            </figure>
                            <!-- <h3>はやぶさとこまちの連結・切り離し</h3>
                            <p>
                                仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子仙台から全国へ弾丸する男子
                            </p>
                            <figure class="aligncenter">
                                <img src="/web-assets/images/demo/1.png" alt="">
                            </figure> -->
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
        <script src="/web-assets/js/event.js"></script>
        
    </body>

</html>