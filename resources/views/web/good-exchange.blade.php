<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Good exchange</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/libs/lightslider/css/lightslider.min.css">

        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/point-exchange.css">

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
                            <img src="/web-assets/images/tohoku-goods.svg" alt="">
                        </div>
                    </div>
                </div>

                <section class="exchange-item-preview">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div class="item-thumb">
                                @if($image = $goods->image)
                                <div class="ratio ratio-1x1">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                                @endif
                            </div>                            
                        </div>
                        <div class="item-name">{{$goods->name}}</div>

                    </div>
                </section>

                <section class="point-exchange-form">
                    <div class="container">
                        
                        <form action="{{route('postExchangeGoods',$id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="image" value="{{$image->getUrl()}}">
                        <input type="hidden" name="name_item" value="{{$goods->name}}">

                            <div class="form-layout-1">
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">名前</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="name">
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">フリガナ</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="furigana">
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">電話番号</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="phone">
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">郵便番号</div>
                                    <div class="form-control-wrap">
                                        <div class="row space-x-10">
                                            <div class="col-7">
                                                <input type="text" class="input-text" name="zip_code">
                                            </div>
                                            <div class="col-5">
                                                <button class="button form-control-button">検索</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">住所</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="address">
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">番地</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="home_address">
                                    </div>
                                </div>
                                <div class="my-30">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="save"> <span class="checkmark"></span> 入力項目を保存する
                                    </label>
                                </div>
                            </div>

                            <div class="point-calculating">
                                <div class="mb-10">
                                    <span class="_label">あなたの所有ポイント</span>
                                    <span class="point-num">{{number_format($user->point)}}pt</span>
                                </div>
                                <div class="mb-10">
                                    <span class="_label">消費ポイント</span>
                                    <span class="point-num">{{number_format($goods->point)}}pt</span>
                                </div>
                                <div class="mb-10">
                                    <div class="separate"></div>
                                </div>
                                <div class="">
                                    <span class="_label">残りポイント</span>
                                    <span class="point-num">{{number_format($user->point - $goods->point)}}pt</span>
                                    <input type="hidden" name="point_remaining" value="{{$user->point - $goods->point}}">
                                </div>
                            </div>

                            <div class="text-align-center">
                                <button type="submit" class="button button-style-1">次へ</button>
                            </div>
                        </form>

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
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

</html>