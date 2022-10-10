@extends('web.layouts.default')
@if(Auth::check())

        @section('link_css')

        <link rel="stylesheet" href="/web-assets/css/profile.css">
        @endsection

        @section('content')

    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">

                <section class="profile-user-info">
                    <div class="container">
                        <div class="div_1 d-flex align-items-center justify-content-between">
                            <div class="flex-fill">
                                <div class="user-name">{{$user['name']}}</div>
                                <ul class="social-icons d-flex align-items-center">
                                    <?php
                                        $a = trim($user->sns_active , '"[]');
                                        $sns_active = explode(",",$a);
                                        for($i=0; $i<count($sns_active);$i++)
                                        {
                                            $value = trim($sns_active[$i] , '"');
                                            if($value == 1)
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$user->twitter_url}}">
                                            <img src="/web-assets/images/icons/twitter.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                            elseif($value == 2)
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$user->instagram_url}}">
                                            <img src="/web-assets/images/icons/instagram.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                            else
                                            {
                                    ?>
                                    <li>
                                        <a href="{{$user->tiktok_url}}">
                                            <img src="/web-assets/images/icons/tiktok.svg" alt="">
                                        </a>
                                    </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            @if($image = $user->image)
                            @dump('a')
                            <div class="avatar flex-auto">
                                <img src="{{$image->getUrl()}}" alt="" onerror='this.onerror=null;this.src="images/profile.svg"'>
                            </div>
                            @else
                            <div class="avatar flex-auto">
                                <img src="/web-assets/images/profile.svg" alt="">
                            </div>
                            @endif
                        </div>
                        <div class="div_2 d-flex justify-content-center">
                            <a href="{{route('profileEdit')}}">
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
                            現在のポイント：<span class="point">{{number_format($user->point)}}pt</span>
                        </div>
                        <div class="div_3 d-flex justify-content-center">
                            <a href="{{route('list_goods')}}">
                                <div class="point-exchange-button button">
                                    ポイントを交換する
                                </div>
                            </a>
                        </div>
                        <div class="self-introduction">
                            <div class="self-introduction_title">自己紹介：</div>
                            <div class="self-introduction_content">
                               {{$user['intro']}}
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
                                    <div class="post-row row list-param-01">
                                        @foreach($user_spot_posts as $value)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="post-item-5 d-flex">
                                                <div class="thumb">
                                                    <div class="icon-star">
                                                        <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                    </div>
                                                    <a href="{{route('spot_detail',$value->alias)}}">
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
                                <div class="dom-load_01">
                                    <div class="load-more-button" onclick="load_more(1)">
                                        <img src="/web-assets/images/icons/reload.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-panel" data-tab="my-reviews">
                                <div class="post-container">
                                    <div class="post-row row list-param-02">
                                        @foreach($user_comment as $value)
                                        <div class="col-md-6">
                                            <div class="review-item-2">
                                                <div class="d-flex justify-content-between">
                                                    @if($comment = $value->spots)
                                                    <div class="post-title">
                                                        {{$comment->name}}・<span class="text-latin">RISING SUN</span>
                                                    </div>
                                                    @endif
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
                                                    {{$value->content}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="dom-load_02">
                                    <div class="load-more-button" onclick="load_more(2)">
                                        <img src="/web-assets/images/icons/reload.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-panel" data-tab="favorite-posts">
                               <div class="post-container">
                                   <div class="post-row row list-param-03">
                                    @foreach($user_spot_posts as $value)
                                        <div class="col-sm-6 col-lg-4">
                                           <div class="post-item-5 d-flex">
                                               <div class="thumb">
                                                   <div class="icon-star">
                                                       <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                                   </div>
                                                   <a href="spot-detail.html">
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
                                                   <a href="spot-detail.html">
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
                                <div class="dom-load_03">
                                    <div class="load-more-button" onclick="load_more(3)">
                                        <img src="/web-assets/images/icons/reload.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-panel" data-tab="favorite-events">
                                <div class="post-container">
                                    <div class="post-row row list-param-04">
                                        @foreach($user_favorite_events as $value)
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
                                <div class="dom-load_04">
                                    <div class="load-more-button" onclick="load_more(4)">
                                        <img src="/web-assets/images/icons/reload.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


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
                    @if($notifi = $user->getNotifi())
                        @foreach($notifi as $noti)
                        <li class="d-flex align-items-center">
                            <div class="date">{{$noti->created_at}}</div>
                            <div class="flex-fill content">投稿スポットが公開されました</div>
                        </li>
                        @endforeach
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
        <script src="/web-assets/js/my-profile.js"></script>
        
    </body>
    @endsection


@endif