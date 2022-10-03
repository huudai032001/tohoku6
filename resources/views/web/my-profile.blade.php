@if(Auth::check())
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My profile</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/profile.css">

        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        
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

                <section class="profile-user-info">
                    <div class="container">
                        <div class="div_1 d-flex align-items-center justify-content-between">
                            <div class="flex-fill">
                                <div class="user-name">{{$info['name']}}</div>
                                <ul class="social-icons d-flex align-items-center">
                                    <?php
                                        $a = trim($info->sns_active , '"[]');
                                        $sns_active = explode(",",$a);
                                        for($i=0; $i<count($sns_active);$i++)
                                        {
                                            $value = trim($sns_active[$i] , '"');
                                            if($value == 1)
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$info->twitter_url}}">
                                            <img src="/web-assets/images/icons/twitter.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                            elseif($value == 2)
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$info->instagram_url}}">
                                            <img src="/web-assets/images/icons/instagram.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                            else
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$info->tiktok_url}}">
                                            <img src="/web-assets/images/icons/tiktok.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="avatar flex-auto">
                                <img src="/web-assets/images/profile.svg" alt="">
                            </div>
                        </div>
                        <div class="div_2 d-flex justify-content-center">
                            <a href="{{route('profileEdit',$info->id)}}">
                                <div class="profile-edit-button button d-inline-flex align-items-center">
                                    <div class="icon">
                                        <img width="13" src="/web-assets/images/icons/config.svg" alt="">
                                    </div>
                                    <div class="button-text">
                                        プロフィールを編集
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="user-point">
                            現在のポイント：<span class="point">256pt</span>
                        </div>
                        <div class="div_3 d-flex justify-content-center">
                            <div class="point-exchange-button button">
                                ポイントを交換する
                            </div>
                        </div>
                        <div class="self-introduction">
                            <div class="self-introduction_title">自己紹介：</div>
                            <div class="self-introduction_content">
                               {{$info['intro']}}
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="profile-posts ui-tabable">
                    <div class="container px-0">
                        <div class="tabs d-flex align-items-end">
                            <div class="tab active d-flex align-items-center justify-content-center" data-tab="my-posts">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/edit.svg" alt="">
                                </div>
                                <span>投稿スポット</span>
                            </div>
                            <div class="tab d-flex align-items-center justify-content-center" data-tab="my-reviews">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/comment-edit.svg" alt="">
                                </div>
                                <span>投稿口コミ</span>
                            </div>
                            <div class="tab d-flex align-items-center justify-content-center" data-tab="favorite-posts">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/star-solid.svg" alt="">
                                </div>
                                <span>スポット</span>
                            </div>
                            <div class="tab d-flex align-items-center justify-content-center" data-tab="favorite-events">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/star-solid.svg" alt="">
                                </div>
                                <span>イベント</span>
                            </div>
                        </div>
                        <div class="tab-panels">
                            <div class="tab-panel active" data-tab="my-posts">
                                <div class="post-container">
                                    <div class="post-row row">
                                        @foreach($list_spot as $value)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="post-item-5 d-flex">
                                                <div class="thumb">
                                                    <div class="icon-star">
                                                        <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                    </div>
                                                    <a href="{{route('spot_detail',$value->id)}}">
                                                        <div class="ratio thumb-image">
                                                            <img src="/upload/{{$value->image}}" alt="">
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
                            <div class="tab-panel" data-tab="my-reviews">
                                <div class="post-container">
                                    <div class="post-row row">
                                        <div class="col-md-6">
                                            <div class="review-item-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="post-title">
                                                        グランピング・<span class="text-latin">RISING SUN</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="review-time">1日前</div>
                                                        <div class="toggle-action-button d-flex align-items-center">
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
                                        <div class="col-md-6">
                                            <div class="review-item-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="post-title">
                                                        グランピング・<span class="text-latin">RISING SUN</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="review-time">1日前</div>
                                                        <div class="toggle-action-button d-flex align-items-center">
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
                                        <div class="col-md-6">
                                            <div class="review-item-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="post-title">
                                                        グランピング・<span class="text-latin">RISING SUN</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="review-time">1日前</div>
                                                        <div class="toggle-action-button d-flex align-items-center">
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
                                        <div class="col-md-6">
                                            <div class="review-item-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="post-title">
                                                        グランピング・<span class="text-latin">RISING SUN</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="review-time">1日前</div>
                                                        <div class="toggle-action-button d-flex align-items-center">
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
                                <div class="load-more-button">
                                    <img src="/web-assets/images/icons/reload.svg" alt="">
                                </div>
                            </div>
                            <div class="tab-panel" data-tab="favorite-posts">
                               <div class="post-container">
                                   <div class="post-row row">
                                    <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                       <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                       <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                       <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                       <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                       <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
                                                       <div class="item-title">グランピング・<span class="text-latin">RISING SUN</span></div>
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
                                   </div>
                               </div>
                               <div class="load-more-button">
                                   <img src="/web-assets/images/icons/reload.svg" alt="">
                               </div>
                            </div>
                            <div class="tab-panel" data-tab="favorite-events">
                                <div class="post-container">
                                    <div class="post-row row">
                                        @foreach($list_event as $value)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="post-item-6">
                                                <div class="thumb">
                                                    <div class="icon-star">
                                                        <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                    </div>
                                                    <a href="{{route('featureDetail',$value->id)}}">
                                                        <div class="ratio thumb-image thumb-hover-anim">
                                                            <img src="/upload/{{$value->image}}" alt="">
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
                                                        <a href="{{route('featureDetail',$value->id)}}">
                                                        {{$value->name}}
                                                        </a>
                                                    </div>
                                                    <div class="item-desc">{{$value->location}}</div>
                                                    <div class="counters d-flex align-items-center justify-content-end"> 
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


        <div class="fixed-number-6 d-flex align-items-center justify-content-center" data-toggle-active="#number-6-button-actions">
            <div>
                <img src="/web-assets/images/number-6.svg" alt="" class="d-block">
            </div>
        </div>

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

</html>

@endif