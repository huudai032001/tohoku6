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
                        パスワードを再設定しました
                    </div>
                    <form action="{{route('postPasswordResetComplete')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" value="{{$id}}">
                        <input type="hidden" name="pass_new" id="" value="{{$pass_new}}">
                   <div class="text-align-center">
                       <input type="submit" class="button button-style-1" value="送信">
                   </div>      
                   </form>

                </div>
            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->
       
        
        <script src="/web-assets/css/components.js"></script>
        <script src="/web-assets/css/main.js"></script>
        
        
    </body>
    @endsection
