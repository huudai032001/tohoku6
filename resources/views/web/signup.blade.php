@extends('web.layouts.default_sign')
    @section('content')
    <body>
        @if(Session::has('error'))
            <h1 style="text-align: center;">{{Session::get('error')}}</h1>
        @endif
        <div id="wrapper">
            <div id="inner-wrapper"> 
                <div class="container">

                    <div class="logo">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>

                    <div class="auth-form form-signup">
                        <div class="auth-form-instruction-text">メールアドレスで登録</div>
                        <form action="{{route('postSignup')}}" method="post">
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
                                <button type="submit" class="button form-signup-submit">次へ</button>
                            </div>
                        </form>

                        <div class="separate"></div>

                        <div class="sns-buttons">
                            <div class="button sns-google">
                                <a href="{{route('google.google_login')}}">
                                <img src="/web-assets/images/google.svg" alt="Google">
                                <span class="text-latin">Google</span>で登録
                                </a>
                            </div>
                            <div class="button sns-facebook">
                                <a href="{{route('facebook.facebook_login')}}">
                                <img src="/web-assets/images/facebook.svg" alt="Facebook">
                                <span class="text-latin">Facebook</span>で登録
                                </a>
                            </div>
                            <div class="button sns-twitter">
                                <img src="/web-assets/images/twitter.svg" alt="Twitter">
                                <span class="text-latin">Twitter</span>で登録
                            </div>
                        </div>

                        <div class="bottom-text">
                            <div class="mb-20">
                                <span class="text-gray">アカウントをお持ちの場合：</span><a href="signin.html">ログイン</a>
                            </div>
                            新規登録するにあたっては、<br>
                            利用規約に同意するものとします。
                        </div>

                    </div>                    

                </div>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        
        
    </body>
    @endsection
