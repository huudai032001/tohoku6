<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit profile</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/profile.css">

        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        
    </head>
    <body class="">
        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="section-profile-edit">
                    <div class="container">
                        <form action="{{route('post_edit_profile',$info_user->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="d-flex justify-content-center">
                                <div class="avatar">
                                    <img src="/web-assets/images/profile.svg" alt="">
                                </div>                            
                            </div>
                            <div class="text-align-center">
                                <span class="text-avatar-change">プロフィール写真を変更</span>
                            </div>
                        
                            <div class="form-layout-1 mt-40">
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">名前</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" name="name" value="{{$info_user->name}}">
                                    </div>
                                </div>
                                
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">メール</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text"name="email" value="{{$info_user->email}}">
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">
                                        SNS表示
                                        <div class="form-group-instruction">※非公開</div>
                                    </div>
                                    <div class="form-control-wrap">
                                        <div class="mb-20">
                                            <div class="row space-x-20 space-y-10">
                                                <div class="col-auto">
                                                    <label class="custom-radio-3">
                                                        <input type="radio" name="gender" value="1" <?php if($info_user->gender == 1) echo 'checked'?>> <span class="checkmark"></span> 男性
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="custom-radio-3">
                                                        <input type="radio" name="gender" value="2" <?php if($info_user->gender == 2) echo 'checked'?>> <span class="checkmark"></span> 女性
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="custom-radio-3">
                                                        <input type="radio" name="gender" value="3" <?php if($info_user->gender == 3) echo 'checked'?>> <span class="checkmark"></span> その他
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="custom-radio-3">
                                                        <input type="radio" name="gender" value="4" <?php if($info_user->gender == 4) echo 'checked'?>> <span class="checkmark"></span> 未回答
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">居住地
                                        <div class="form-group-instruction">※非公開</div>
                                    </div>
                                    <div class="form-control-wrap">
                                        <select class="select" name="location">
                                            <option value=""></option>
                                            <option value="東京" <?php if($info_user->location == '東京') echo 'selected'?>>東京</option>
                                            <option value="川崎" <?php if($info_user->location == '川崎') echo 'selected'?>>川崎</option>
                                            <option value="大沢" <?php if($info_user->location == '大沢') echo 'selected'?>>大沢</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">生年月日
                                        <div class="form-group-instruction">※非公開</div>
                                    </div>
                                    <div class="form-control-wrap">
                                        <div class="row align-items-center space-y-10 space-x-10">
                                            <input type="date" name="birth_day" value="{{$info_user->birth_day}}">
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
                                        
                                    </div>
                                </div>
                                <div class="form-group form-group-horizontal">
                                    <div class="form-group-label">自己紹介</div>
                                    <div class="form-control-wrap">
                                        <textarea class="textarea" rows="6" name="intro">{{$info_user->intro}}</textarea>
                                    </div>
                                </div>
                                <div style="margin-top: 35px;text-align: center;margin-bottom: 50px;">
                                    <button class="button-style-1">完了</button>
                                </div>
                                
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

</html>