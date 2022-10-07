@extends('web.layouts.default')

@if(Auth::check())   
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/spot-editing.css">
    @endsection
    @section('content')


    <body>


        <div id="wrapper">
            <div id="inner-wrapper">

                <section class="spot-editing-form">
                    <form action="{{route('postSpotRegister')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="section_header">
                            <div class="container">
                                <div class="image">
                                    <img src="/web-assets/images/tohoku-6-spot.svg" alt="">
                                </div>
                                <div class="desc">
                                    スポットを投稿する
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="form-layout-1">
                                <div style="margin-bottom: 25px;">
                                    <input type="text" class="input-text @error('location') is-invalid @enderror" placeholder="住所またはキーワード" name="location">
                                </div>
                                @error('location')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div style="padding-bottom: 35px;">
                                    <div class="location-input ratio">
                                        <div class="d-flex align-items-center justify-content-center" style="font-family: var(--font2); color: white;text-align: center;background-color: #C6C6C6;font-weight: 700;">MAP</div>
                                    </div>
                                </div>
                            </div>                           
                        </div>

                        <div class="py-30 form-layout-2" style="background-color: #E8E8E8;">
                            <div class="container">

                                <div class="form-group">
                                    <div class="form-group-label">スポット名</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text @error('name') is-invalid @enderror" name="name">
                                    </div>
                                    @error('name')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label">スポット説明</div>
                                    <div class="form-control-wrap">
                                        <textarea class="textarea @error('intro') is-invalid @enderror" rows="5" name="intro"></textarea>
                                    </div>
                                    @error('intro')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label d-flex align-items-center">
                                        <div class="flex-auto">スポット説明</div>
                                        <div class="flex-fill px-10 text-align-center" style="font-size: 12px;">
                                            最大4枚まで
                                        </div>
                                    </div>
                                    <div class="form-control-wrap">
                                        <div class="row" style="--col-space-x: 6px; --col-space-y: 6px;">
                                            <div class="col-12">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="" alt="" id="myImg">
                                                    </div>
                                                    <input type="file" accept="image/*" name="image" id="upload_img" class="@error('image') is-invalid @enderror">
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="" alt="" id="myImg01">
                                                    </div>
                                                    <input type="file" accept="image/*" name="sub_image_01" id="sub_image_01" class="@error('sub_image_01') is-invalid @enderror">
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="" alt="" id="myImg02">
                                                    </div>
                                                    <input type="file" accept="image/*" name="sub_image_02" id="sub_image_02" class="@error('sub_image_02') is-invalid @enderror">
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="" alt="" id="myImg03">
                                                    </div>
                                                    <input type="file" accept="image/*" name="sub_image_03" id="sub_image_03" class="@error('sub_image_03') is-invalid @enderror">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror

                                    @error('sub_image_01')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror

                                    @error('sub_image_02')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror

                                    @error('sub_image_03')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label">カテゴリを選ぶ</div>
                                    <div class="form-control-wrap">
                                        <div class="row" style="--col-space-x: 30px; --col-space-y: 26px;">
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="1"> <span class="checkmark"></span> 宿泊
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="2"> <span class="checkmark"></span> グルメ
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="3"> <span class="checkmark"></span> ショッピング
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="4"> <span class="checkmark"></span> 自然
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="5"> <span class="checkmark"></span> 体験
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="6"> <span class="checkmark"></span> 歴史
                                                </label>
                                            </div>
                                            <div class="col-4 col-sm-3">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category[]" value="7"> <span class="checkmark"></span> SNS映え
                                                </label>
                                            </div>                                            
                                        </div>
                                    </div>
                                    @error('category')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="section-footer form-action-buttons">
                            <div class="container">
                                <div class="row justify-content-center" style="--col-space-y: 15px;">
                                    <div class="col-12 col-md-6">
                                        <button class="button button-style-3 form-button" type="submit">次へ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </section>


            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

       

        

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


        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/spot_upload_image.js"></script>
        
    </body>

    @endsection

@endif