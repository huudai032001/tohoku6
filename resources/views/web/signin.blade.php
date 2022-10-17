
@extends('web.layouts.default_sign')
    @section('content')
    <body>
        @if(Session::has('thongbao'))
            <h1 style="text-align: center;color:red;">{{Session::get('thongbao')}}</h1>
        @endif
        <div id="wrapper">
            <div id="inner-wrapper"> 
                <div class="container">

                    <div class="logo">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>

                    <div class="auth-form form-signup">
                        <div class="auth-form-instruction-text">メールアドレスでログイン</div>
                        <form action="" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-layout-1">
                                <div class="form-group">
                                    <input type="email" class="input-text" placeholder="メールアドレス" name="email">
                                </div>
                                @error('email')
                                    <div class="form-error-msg">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="input-text-wrap">
                                            <input type="password" class="input-text" placeholder="パスワード" name="password">
                                            <div class="input-text-icon-right password-showing-toggle">
                                                <img src="/web-assets/images/icons/eye.svg" alt="">
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="form-error-msg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="button form-signin-submit">ログイン</button>
                            </div>
                        </form>

                        <div class="bottom-text" style="margin-top: 15px;">
                            <span class="text-gray">パスワードを忘れた場合は</span><a href="{{route('passwordReset')}}">こちら</a>                        
                        </div>

                        <div class="separate"></div>

                        <div class="sns-buttons">
                            <div class="button sns-google">
                                <a href="{{route('google.google_login')}}">
                                    <img src="/web-assets/images/google.svg" alt="Google">
                                    <span class="text-latin">Google</span>ログイン
                                </a>
                            </div>
                            <div class="button sns-facebook">
                                <a href="{{route('facebook.facebook_login')}}">
                                <img src="/web-assets/images/facebook.svg" alt="Facebook">
                                <span class="text-latin">Facebook</span>ログイン
                                </a>
                            </div>
                            <div class="button sns-twitter">
                                <img src="/web-assets/images/twitter.svg" alt="Twitter">
                                <span class="text-latin">Twitter</span>ログイン
                            </div>
                        </div>

                        <div class="bottom-text">
                            <span class="text-gray">新規会員登録は</span><a href="/register">こちら</a>                        
                        </div>

                    </div>                    

                </div>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        
        
    </body>
    @endsection
