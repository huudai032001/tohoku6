
@extends('web.layouts.default')
   
    @section('link_css')
        
        <link rel="stylesheet" href="/web-assets/css/spot-list.css">
    @endsection
    @section('content')


    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">
                <div class="spot-search-form">
                    <form action="">
                        <input type="hidden" value="" name="sort" id="form_sort">
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
                                    <input class="input-text" type="text" placeholder="キーワード" name="search">
                                </div>
                            </div>
                            <div class="text-align-center">
                                <button class="button-style-1 button submit-button">検索</button>
                            </div>
                            <div class="to-spot-register">
                                @if(Auth::check())
                                <a href="{{route('spotRegister')}}">スポット登録をする</a>
                                @else
                                <a href="{{route('signin')}}">スポット登録をする</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="post-list-sort-options">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-center">
                            <a onclick="sort(1)" class="sort_01 active">新着順</a>
                            <a onclick="sort(2)" class="sort_02">いいね順</a>
                            <a onclick="sort(3)" class="sort_03">口コミ数順</a>
                            <a onclick="sort(4)" class="sort_04">ポイント順</a>
                        </div>
                    </div>
                </div>
                
                <section class="post-list">
                    <div class="container px-0">                        
                        
                        <div class="post-container">
                            <div class="post-row row list-category">
                            @foreach($list_spot as $value)
                                
                                <div class="col-sm-6 col-lg-4">
                                    <div class="post-item-5 d-flex">
                                        <div class="thumb">
                                            <div class="icon-star">
                                                <img src="($value->image())->getUrl()" alt="">
                                            </div>
                                            <a href="{{route('spot_detail',$value->alias)}}">
                                                <div class="ratio thumb-image">
                                                    @if($image = $value->image)
                                                    <img src="{{$image->getUrl()}}" alt="">
                                                    @endif
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
                                            <a href="{{route('spot_detail',$value->alias)}}">
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

                                                <div class="item-title">{{$value->name}} .<span class="text-latin">RISING SUN</span></div>
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
                        <div class="dom-load">
                            <div class="load-more-button" onclick="load_more(1)">
                                <img src="/web-assets/images/icons/reload.svg" alt="">
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
                    <div class="button button-style-1" >
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

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/spot.js"></script>
        
    </body>
    @endsection
