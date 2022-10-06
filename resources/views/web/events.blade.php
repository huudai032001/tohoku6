@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/event-list.css">
    @endsection

    @section('content')

    <body>

        <div id="wrapper">
            <div id="inner-wrapper">
                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="/web-assets/images/tohoku-6-calendar.svg" alt="">
                        </div>
                    </div>

                    <div class="container px-0">
                        <div class="cadendar-select">
                            <div class="calendar-month-select d-sm-flex justify-content-center">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="arrow arrow-left">
                                        <img src="/web-assets/images/arrow-left.svg" alt="">
                                    </div>
                                    <div class="month-label">
                                        <span class="year-num"></span>.<span class="month-num"></span>
                                        <span class="month-name"></span>
                                    </div>
                                    <div class="arrow arrow-right">
                                        <img src="/web-assets/images/arrow-right.svg" alt="">
                                    </div>
                                </div>
                                <input type="hidden" name="year">
                                <input type="hidden" name="month">
                            </div>

                            <div class="calendar-day-select">
                                <div class="slider owl-carousel owl-style-1"></div>
                                <input type="hidden" name="day">
                            </div>


                        </div>
                    </div>

                    <div class="container text-align-center">
                        <div class="area-select d-flex justify-content-center">
                            <div class="custom-select-button button">
                                エリアを選択 <img src="/web-assets/images/triangle-down.svg" alt="Select">
                                <input type="hidden" name="" id="">
                            </div>
                        </div>

                        <div style="padding: 25px 0;">
                            <button type="button" class="button-style-1 button submit-button">検索</button>
                        </div>
                    </div>
                </div>

                <div class="post-container">
                    <div class="post-row row">
                        @foreach($list_events as $value)
                        <div class="col-md-6 col-lg-4">
                            <div class="post-item-9">
                                <div class="thumb">
                                    <div class="icon-star">
                                        <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                    </div>
                                    <a href="{{route('event_detail',$value->id)}}">
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
                                        <a href="{{route('event_detail',$value->id)}}">
                                            {{$value->name}}
                                        </a>
                                    </div>
                                    <div class="item-desc">{{$value->location}}</div>
                                    <div class="counters d-flex align-items-center justify-content-between"> 
                                        <div class="tags d-flex align-items-center">
                                            <span class="tag">花火</span>
                                            <span class="tag">夏祭り</span>
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
                {!! $list_events->appends(['nickname'=>'huudai'])->links() !!}
                <div style="padding: 25px 0;">
                    <div class="container">
                        <div class="simple-paginator d-flex justify-content-between align-items-center">
                            @if($total_page >1)
                            <a href="?page={{$total_page - 1}}" class="prev">
                            @else
                            <a href="" class="prev">
                            @endif
                                <img src="/web-assets/images/angle-left.svg" alt="">
                            </a>
                            <div class="page-num">
                                <span class="current-page-num">1</span>/<span class="total-page-num">{{$total_page}}</span>
                            </div>
                            @if($total_page == 1)
                            <a href="" class="next">
                            @else
                            <a href="?page={{$total_page + 1}}" class="next">
                            @endif
                                <img src="/web-assets/images/angle-right.svg" alt="">
                            </a>
                        </div>
                        <div class="mt-20 text-align-center">
                            <a href="#" class="button-style-1 button">次の10件を見る</a>
                        </div>
                    </div>
                </div>

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

       

        

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


        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/event.js"></script>
        
    </body>
    @endsection
