@extends('web.layouts.default')
@if(Auth::check())
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/profile.css">
    @endsection
    @section('content')

    <body class="">
        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="section-profile-edit">
                    <div class="container">
                        <form action="{{route('postProfileEdit')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="d-flex justify-content-center">
                                <div class="avatar">
                                    @if($image = $user->avatarImage)
                                    <img src="{{$image->getUrl()}}" alt="" id="file_upload">
                                    @else
                                    <img src="/web-assets/images/profile.svg" alt="" id="file_upload">
                                    @endif    
                                </div>      
                                                  
                            </div>
                            <div class="text-align-center ">
                                <input type="file" accept="image/*" name="image" id="upload_avatar" class="@error('image') is-invalid @enderror">
                                <span class="text-avatar-change">プロフィール写真を変更</span>
                            </div>
                            <div class="form-layout-1 mt-40">
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">名前</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                @error('name')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">居住地</div>
                                    <div class="form-control-wrap">
                                        <select class="select" name="location">
                                            <option value=""></option>
                                            <option value="東京" <?php if($user->location == '東京') echo 'selected'?>>東京</option>
                                            <option value="川崎" <?php if($user->location == '川崎') echo 'selected'?>>川崎</option>
                                            <option value="大沢" <?php if($user->location == '大沢') echo 'selected'?>>大沢</option>
                                        </select>
                                    </div>
                                    @error('location')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">メール</div>
                                    <div class="form-control-wrap">
                                        <input type="email" class="input-text" value="{{$user->email}}" disabled>
                                        <input type="hidden" class="input-text" name="email" value="{{$user->email}}">

                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">SNS表示</div>
                                    <div class="form-control-wrap">
                                        <div class="mb-20">
                                            <div class="row space-x-20 space-y-10">
                                                <?php
                                                    $a = trim($user->sns_active , '"[]');
                                                    $sns_active = explode(",",$a);
                                                    $count_sns = count($sns_active);
                                                    $arr_sns = [
                                                        1=>'Twitter',
                                                        2=>'Instagram',
                                                        3=>'TikTok',
                                                    ];
                                                    for($i=1;$i<=count($arr_sns);$i++)
                                                    {
                                                ?>
                                                <div class="col-auto">
                                                    <label class="custom-radio-3">
                                                        <input type="checkbox" name="sns[]" value="{{$i}}" <?php for($s = 0;$s<$count_sns;$s++){  $va = trim($sns_active[$s] , '"'); if($i == $va){echo 'checked';} } ?>> <span class="checkmark"></span> {{$arr_sns[$i]}}
                                                    </label>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            @error('sns')
                                            <div class="form-error-msg">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <div class="form-control-label">TwitterプロフィールURL</div>
                                            <input type="text" class="input-text" name="twitter" value="{{$user->twitter_url}}">
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <div class="form-control-label">TikTokプロフィールURL</div>
                                            <input type="text" class="input-text" name="tiktok" value="{{$user->tiktok_url}}">
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <div class="form-control-label">InstagramプロフィールURL</div>
                                            <input type="text" class="input-text" name="instagram" value="{{$user->instagram_url}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">生年月日</div>
                                    <div class="form-control-wrap">
                                        <div class="row align-items-center space-y-10 space-x-10">
                                            <input type="date" name="birth_day" value="{{$user->birth_day}}" class="input-text">
                                            <!-- <div class="col-auto d-flex align-items-center">
                                                <select name="" class="select">
                                                    <option value=""></option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000" selected>2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                </select>
                                                <span class="ml-10">年</span>
                                            </div>

                                            <div class="col-auto d-flex align-items-center">
                                                <select name="" class="select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <span class="ml-10">月</span>
                                            </div>

                                            <div class="col-auto d-flex align-items-center">
                                                <select name="" class="select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                                <span class="ml-10">日</span>
                                            </div> -->
                                        </div>                                       
                                        @error('birth_day')
                                            <div class="form-error-msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">自己紹介</div>
                                    <div class="form-control-wrap">
                                        <textarea class="textarea" rows="6" name="intro">{{$user->intro}}</textarea>
                                    </div>

                                </div>
                                @error('intro')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div style="margin-top: 35px;text-align: center;">
                                    <button class="button-style-1">完了</button>
                                </div>
                                <div class="user-resign-text">
                                    退会は<a onclick="cancel()">こちら</a>
                                </div>
                            </div>

                        </form>
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

        @include('web.inc.notification')        



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


        <div class="fixed-number-6 d-flex align-items-center justify-content-center" data-show-modal="#number-6-button-actions">
            <div>
                <img src="/web-assets/images/number-6.svg" alt="" class="d-block">
            </div>
        </div>

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/spot_upload_image.js"></script>
        
    </body>
    @endsection

@endif