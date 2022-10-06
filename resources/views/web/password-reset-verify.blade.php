@extends('web.layouts.default_sign')
    @section('content')
    <body>

        <div id="wrapper">
            <div id="inner-wrapper"> 
                <div class="container">

                    <div class="logo">
                        <img src="/web-assets/images/number-6.svg" alt="">
                    </div>

                    <div class="instruction-text">
                        メールで送信された<br>
                        認証コードを入力してください
                    </div>

                    <form action="{{route('postPasswordResetVerify')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" id="" value="{{$user_id}}">
                        <div class="form-layout-1">
                            <div class="form-group">
                                <input type="text" class="input-text" placeholder="認証コード" name="otp">
                            </div>
                            <div class="text-align-center">
                                <button type="submit" class="button button-style-3">送信</button>
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
