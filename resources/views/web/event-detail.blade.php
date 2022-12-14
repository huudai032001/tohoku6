@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/event-detail.css">
    @endsection
    @section('content')

    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="section-event-detail">
                    <div class="container">
                        <div class="section_header">
                            <div class="section_title">
                                <img src="/web-assets/images/tohoku-6-calendar.svg" alt="">
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
                        <h1 class="event-title">{{$info_event->name}}</h1>
                        <div class="location">{{$info_event->location}}</div>
                        <div class="event-date">
                        {{$info_event->time_start}}
                        </div>
                        <div class="notation">・日付が複数の場合、範囲の場合の表記</div>
                        <div class="d-flex justify-content-end">
                        @if(Auth::check())
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="posts_id" id="posts_id" value="{{$info_event->id}}">
                        <a onclick="favorite()">
                        @else
                        <a>
                        @endif
                            <div class="favorite-count d-flex align-items-center">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/heart-gray.svg" alt="">
                                </div>
                                <div class="count-number">{{$info_event->favorite}}</div>
                            </div>
                        </a>
                        </div>                        
                    </div>
                    <div class="event-images">
                        <div class="container">
                            <div class="slider owl-carousel">
                                @if($images = $info_event->getImages())
                                    @foreach($images as $image)
                                    <div class="item">
                                        <img src="{{$image->getUrl()}}" alt="">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="post-content-text">
                        {{$info_event->intro}}
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

                <section class="section-related-events">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                            @foreach($recently as $value)
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="{{route('event_detail',$value->alias)}}">
                                            <div class="ratio thumb-image">
                                                @if($image = $value->image)
                                                <img src="{{$image->getUrl()}}" alt="">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">{{$value->time_start}} UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('event_detail',$value->alias)}}">
                                                <div class="item-title">{{$value->name}}・</div>
                                            </a>
                                            <div class="item-desc">
                                            {{$value->intro}}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                    @if($categorys = $value->categories)
                                                        @foreach($categorys as $category)
                                                        <span class="tags">{{$category->name}} |</span>
                                                        @endforeach
                                                    @endif
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

                <section class="section-nearby-events">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                            @foreach($list_event as $value)
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="{{route('event_detail',$value->alias)}}">
                                            <div class="ratio thumb-image">
                                                @if($image = $value->image)
                                                <img src="{{$image->getUrl()}}" alt="">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">{{$value->created_at}} UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('event_detail',$value->alias)}}">
                                                <div class="item-title">{{$value->name}}・</div>
                                            </a>
                                            <div class="item-desc">
                                            {{$value->location}}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                    @if($categorys = $value->categories)
                                                        @foreach($categorys as $category)
                                                        <span class="tags">{{$category->name}} |</span>
                                                        @endforeach
                                                    @endif
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">{{$value->favorite}}</span>
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

        @include('web.inc.notification')        
     
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
    @endsection
