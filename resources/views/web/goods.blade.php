@extends('web.layouts.default')
    @section('link_css')

        <link rel="stylesheet" href="/web-assets/css/good-list.css">
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

                <section class="good-list py-30">
                    <div class="container">
                        <div class="row space-x-10 space-y-20">
                            @foreach($list_goods as $value)
                            <div class="col-6 col-md-3 col-xl-2">
                                <div class="good-item">
                                    <a href="{{route('goods_detail',$value->id)}}">
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
                    </div>
                </section>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>
    @endsection
