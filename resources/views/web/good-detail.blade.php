@extends('web.layouts.default')
    @section('link_css')

        <link rel="stylesheet" href="/web-assets/css/good-detail.css">
        <link rel="stylesheet" href="/web-assets/libs/lightslider/css/lightslider.min.css">
        <script src="/web-assets/libs/lightslider/js/lightslider.min.js"></script>
    @endsection

    @section('content')

    <body class="my-profile-page">


        <div id="wrapper">
            <div id="inner-wrapper">

                <div class="page-header">
                    <div class="page-title">
                        <div class="container">
                            <img src="/web-assets/images/tohoku-goods.svg" alt="">
                        </div>
                    </div>
                </div>

                <section class="good-detail">
                    <div class="container">

                        <div class="good-images">
                            <div class="slider">
                                @if($image = $info_goods->image)
                                <div class="item" data-thumb="{{$image->getUrl()}}">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                                @endif

                                @if($images =$info_goods->getImages())
                                @foreach($images as $image)
                                <div class="item" data-thumb="{{$image->getUrl()}}">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>

                        <h1 class="good-name">{{$info_goods->name}}</h1>

                        <div class="d-flex justify-content-between">
                            <div class="good-cost">{{$info_goods->point}}pt</div>
                            <div class="my-own-point">
                                <span class="_label">あなたの所有ポイント</span>
                                <span class="num">{{number_format(Auth::user()->point)}}pt</span>
                            </div>
                        </div>

                        <div class="good-detail-content">
                        {{$info_goods->intro}}
                        </div>

                        <div class="text-align-center">
                            @if(Auth::user()->point >= $info_goods->point)
                            <a href="{{route('exchangeGoods',$info_goods->alias)}}" class="button button-style-1">交換する</a>
                            @else
                            <a onclick="fail()" class="button button-style-1">交換する</a>

                            @endif
                        </div>

                    </div>
                </section>

                <section class="realred-goods">
                    <div class="container">
                        <div class="section_title">関連アイテム</div>
                        <div class="row space-x-10 space-y-20">
                            @foreach($list_goods as $value)
                            <div class="col-6 col-md-3 col-xl-2">
                                <div class="good-item">
                                    <a href="{{route('goods_detail',$value->alias)}}">
                                        @if($image = $value->image)
                                        <div class="thumb ratio ratio-1x1 thumb-hover-anim">
                                            <img src="{{$image->getUrl()}}" alt="">
                                        </div>
                                        @endif
                                    </a>
                                    <div class="good-name">{{$value->name}}</div>
                                    <div class="good-cost">{{$value->point}}pt</div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="text-align-center mt-40">
                            <a href="{{route('list_goods')}}" class="button button-style-3">一覧に戻る</a>
                        </div>
                    </div>
                </section>

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/goods.js"></script>
        
    </body>
    @endsection
