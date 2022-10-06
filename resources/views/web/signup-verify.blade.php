@extends('web.layouts.default_sign')
    @section('content')
    <body>
        @if(isset($error))
            <h1 style="text-align: center;">{{$error}}</h1>
        @endif
        <div id="wrapper">
            <div id="inner-wrapper"> 
                <div class="container">

                    <div class="logo">
                        <img src="/web-assets/images//number-6.svg" alt="">
                    </div>

                    <div class="instruction-text">
                        メールで送信された<br>
                        認証コードを入力してください
                    </div>

                    <form action="{{route('postSignupVerify')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-layout-1">
                            <div class="form-group">
                                <input type="hidden" name="id" id="" value="{{$id}}">
                                <input type="text" class="input-text" placeholder="認証コード" name="otp">
                            </div>
                            @error('otp')
                                <div class="form-error-msg">{{ $message }}</div>
                            @enderror
                            <div class="text-align-center">
                                <button type="submit" class="button button-style-3">次へ</button>
                            </div>
                        </div>
                    </form>                 

                </div>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/css/components.js"></script>
        <script src="/web-assets/css/main.js"></script>
        
        
    </body>
    @endsection

