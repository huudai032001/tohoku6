<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset password</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="libs/lightslider/css/lightslider.min.css">

        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/auth.css">

        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        <script src="/web-assets/libs/lightslider/js/lightslider.min.js"></script>
        
    </head>

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

                    <form action="{{route('postSetNewPassword',$id)}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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

</html>