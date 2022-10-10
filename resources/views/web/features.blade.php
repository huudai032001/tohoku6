@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/feature-list.css">
    @endsection

    @section('content')

    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">

                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="/web-assets/images/tohoku-media.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="post-container">
                    <div class="post-row row">
                        @foreach($list_feature as $value)
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="post-item-1">
                                <a href="{{route('featureDetail',$value->alias)}}">
                                    <div class="thumb ratio thumb-hover-anim">
                                        <img src="/uploads/{{$value->file_name}}" alt="">
                                    </div>
                                </a>
                                <div class="item-content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="flex-fill">
                                            <div class="date text-latin">{{$value->created_at}} UP!</div>
                                        </div>
                                        <div class="flex-auto ml-20">
                                            <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                            <span class="count text-latin">{{$value->favorite}}</span>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <a href="{{route('featureDetail',$value->alias)}}">
                                        {{$value->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

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
                    @if(Auth::check())
                        @if($notifi = Auth::user()->getNotifi())
                            @foreach($notifi as $noti)
                            <li class="d-flex align-items-center">
                                <div class="date">{{$noti->created_at}}</div>
                                <div class="flex-fill content">投稿スポットが公開されました</div>
                            </li>
                            @endforeach
                        @endif
                    @endif
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
    @endsection

