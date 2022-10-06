@extends('web.layouts.default_sign')
    @section('content')
    <body>
        @if(Session::has('thongbao'))
            <h1 style="text-align: center;">{{Session::get('thongbao')}}</h1>
        @endif
        <div id="wrapper">
            <div id="inner-wrapper"> 
                <div class="container">

                    <div class="logo">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>

                    <div class="instruction-text">
                        パスワードをリセットする<br>
                        メールアドレスを入力してください
                    </div>

                    <form action="{{route('postPasswordReset')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-layout-1">
                            <div class="form-group">
                                <input type="email" class="input-text" placeholder="メールアドレス" name="email">
                            </div>
                            <div class="text-align-center">
                                <button type="submit" class="button button-style-1">送信</button>
                            </div>
                        </div>
                    </form>                 

                </div>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        
        
    </body>
    @endsection
