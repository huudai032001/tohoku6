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
                        新しいパスワードを設定してください
                    </div>

                    <form action="{{route('postSetNewPassword')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" id="" value="{{$id}}">
                        <div class="form-layout-1">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <div class="input-text-wrap">
                                        <input type="password" class="input-text invalid @error('pass_new') is-invalid @enderror" placeholder="パスワード" id="pass_new" name="pass_new" >
                                        <div class="input-text-icon-right password-showing-toggle">
                                            <img src="/web-assets/images/icons/eye.svg" alt="">
                                        </div>
                                    </div>
                                    @error('pass_new')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <div class="input-text-wrap">
                                        <input type="password" class="input-text invalid @error('re_pass_new') is-invalid @enderror" placeholder="パスワード（確認用）" name="re_pass_new" id="re_pass_new">
                                        <div class="input-text-icon-right password-showing-toggle">
                                            <img src="/web-assets/images/icons/eye.svg" alt="">
                                        </div>
                                    </div>
                                    @error('re_pass_new')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror

                                </div>         
                            </div>

                            <div class="text-align-center">
                                <button type="submit" class="button button-style-3">パスワードを変更する</button>
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
