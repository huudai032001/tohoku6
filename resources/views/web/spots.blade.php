
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
                            <a onclick="sort(1)" class="active">新着順</a>
                            <a onclick="sort(2)">いいね順</a>
                            <a onclick="sort(3)">口コミ数順</a>
                            <a onclick="sort(4)">ポイント順</a>
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
                                            <a href="{{route('spot_detail',$value->id)}}">
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
                            {!! $list_spot->appends(['nickname'=>'huudai'])->links() !!}

                        </div>
                        <div class="load-more-button">
                            <img src="/web-assets/images/icons/reload.svg" alt="">
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
                                    <input type="radio" name="area-select" value="2"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="3"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="4"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="5"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
                                </label>
                            </li>
                            <li>
                                <label class="custom-radio-2">
                                    <input type="radio" name="area-select" value="6"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">
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
                                    <input type="radio" name="category-select" checked  value="3"> <span class="checkmark"></span> 宿泊
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"  value="4"> <span class="checkmark"></span> 体験
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select"  value="5"> <span class="checkmark"></span> 自然
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="6"> <span class="checkmark"></span> SNS映え
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="custom-radio">
                                    <input type="radio" name="category-select" value="7"> <span class="checkmark"></span> 歴史
                                </label>
                            </div>
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
