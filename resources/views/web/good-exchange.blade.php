@extends('web.layouts.default')
    @section('link_css')

        <link rel="stylesheet" href="/web-assets/libs/lightslider/css/lightslider.min.css">
        <link rel="stylesheet" href="/web-assets/css/point-exchange.css">
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
                                @error('name')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">フリガナ</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="furigana">
                                    </div>
                                </div>
                                @error('furigana')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">電話番号</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="phone">
                                    </div>
                                </div>
                                @error('phone')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">郵便番号</div>
                                    <div class="form-control-wrap">
                                        <div class="row space-x-10">
                                            <div class="col-7">
                                                <input type="text" class="input-text" name="zip_code">
                                            </div>
                                            <div class="col-5">
                                                <a class="button form-control-button" onclick="zip_code()">検索</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('zip_code')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">住所</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="address">
                                    </div>
                                </div>
                                @error('address')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">番地</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="home_address">
                                    </div>
                                </div>
                                @error('home_address')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
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

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

    @endsection
