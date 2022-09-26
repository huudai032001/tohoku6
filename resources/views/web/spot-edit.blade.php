<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit spot</title>

        <link rel="stylesheet" href="/web-assets/css/framework-full.css">

        <link rel="stylesheet" href="fonts/Fontawesome/4.7/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/web-assets/css/owl-customized.css">
        <link rel="stylesheet" href="/web-assets/css/main.css">
        <link rel="stylesheet" href="/web-assets/css/spot-editing.css">

        <script src="/web-assets/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/web-assets/libs/owl-carousel/owl.carousel.min.js"></script>
        
    </head>

    <body>


        <div id="wrapper">
            <div id="inner-wrapper">


                <!-- Menu bar -->
                <div class="nav-bar d-flex align-items-center justify-content-between">
                    <div class="nav-bar-left d-flex">
                        <div class="menu-button" data-toggle="nav-bar-panel">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="nav-bar-center d-flex justify-content-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/web-assets/images/number-6.svg" alt="Tohoku 6">
                            </a>
                        </div>
                    </div>
                    <div class="nav-bar-right d-flex justify-content-end">
                        <div class="user-menu-icons d-flex">
                            <div data-show-modal="#user-notification-modal">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/notification.svg" alt="notification">
                                    <div class="has-notification-sight"></div>
                                </div>
                            </div>
                            <a href="">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/star.svg" alt="favorite">
                                </div>
                            </a>
                            <a href="">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/search.svg" alt="search">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="nav-bar-panel">
                    <div class="button-close" data-toggle="nav-bar-panel">×</div>
                    <div class="profile-button">
                        <a href="my-profile.html">
                            <div class="profile-image">
                                <img width="75" src="/web-assets/images/profile.svg" alt="profile">
                            </div>
                            <div class="profile-label">プロフィール</div>
                        </a>
                    </div>
                    <div class="nav-menu">
                        <ul class="ul-lv-1">
                            <li class="li-lv-1">
                                <a href="spot-register.html">スポット登録をする</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="my-profile.html">お気に入り</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="posts.html">スポットを探す</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="events.html">イベントを探す</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="features.html">フィーチャー記事</a>
                            </li>
                            <li class="li-lv-1">
                                <a href="good-exchange.html">トウホクポイントを使う</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="about.html">トウホクシックスとは？</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="about-point.html">トウホクポイントとは？</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="faq.html">よくあるご質問</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="privacy-policy.html">プライバシーポリシー</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="term-of-service.html">利用規約</a>
                            </li>
                            <li class="li-lv-1 menu-item-small-text">
                                <a href="inquiry.html">お問い合わせ</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <!-- /Menu bar -->

                <section class="spot-editing-form">
                    <form action="spot-preview.html" method="post">

                        <div class="section_header">
                            <div class="container">
                                <div class="image">
                                    <img src="/web-assets/images/tohoku-6-spot.svg" alt="">
                                </div>
                                <div class="desc">
                                    スポットを編集する
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="form-layout-1">
                                <div style="margin-bottom: 25px;">
                                    <input type="text" class="input-text" placeholder="住所またはキーワード" value="{{$info_spot->location}}" name="location">
                                </div>
                                <div style="padding-bottom: 35px;">
                                    <div class="location-input ratio">

                                        <div class="d-flex align-items-center justify-content-center" style="font-family: var(--font2); color: white;text-align: center;background-color: #C6C6C6;font-weight: 700;">MAP</div>

                                    </div>
                                </div>
                            </div>                           
                        </div>

                        <div class="py-30 form-layout-2" style="background-color: #E8E8E8;">
                            <div class="container">

                                <div class="form-group">
                                    <div class="form-group-label">スポット名</div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="input-text" value="{{$info_spot->name}}" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label">スポット説明</div>
                                    <div class="form-control-wrap">
                                        <textarea class="textarea" rows="5" name="intro">{{$info_spot->intro}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label d-flex align-items-center">
                                        <div class="flex-auto">スポット説明</div>
                                        <div class="flex-fill px-10 text-align-center" style="font-size: 12px;">
                                            最大4枚まで
                                        </div>
                                    </div>
                                    <div class="form-control-wrap">
                                        <div class="row" style="--col-space-x: 6px; --col-space-y: 6px;">
                                            <div class="col-12">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="/upload/{{$info_spot->image}}" alt="">
                                                    </div>
                                                    <input type="file" accept="image/*">
                                                </label>
                                            </div>
                                            <?php
                                                $sub_image = trim($info_spot->sub_image , '"[]');
                                                $arr = explode(",", $sub_image);
                                                $arr_category = [
                                                    0=>'宿泊',
                                                    1=>'グルメ',
                                                    2=>'ショッピング',
                                                    3=>'自然',
                                                    4=>'体験',
                                                    5=>'歴史',
                                                ];

                                                $category = explode(',',$info_spot->category);
                                                for($i =0;$i< count($arr);$i++)
                                                {
                                                    $value = trim($arr[$i] , '"');

                                            ?>
                                            <div class="col-4">
                                                <label class="custom-input-image">
                                                    <div class="preview-image ratio">
                                                        <img src="/upload/{{$value}}" alt="">
                                                    </div>
                                                    <input type="file" accept="image/*">
                                                </label>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group-label">カテゴリを選ぶ</div>
                                    <div class="form-control-wrap">
                                        <div class="row" style="--col-space-x: 30px; --col-space-y: 26px;">
                                        <?php
                                            for($s=0;$s<count($arr_category);$s++)
                                            {
                                        ?>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <?php
                                                        for($u = 0;$u< count($category);$u++)
                                                        {
                                                    ?>
                                                    <input type="checkbox" name="category" value="{{$s+1}}" <?php if($category[$u] == $s+1) echo 'checked'?>> <span class="checkmark"></span> {{$arr_category[$s]}}
                                                    <?php
                                                        }
                                                    ?>
                                                </label>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category"  value="2"> <span class="checkmark"></span> グルメ
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category" value="3"> <span class="checkmark"></span> ショッピング
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category" checked value="4"> <span class="checkmark"></span> 自然
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category" value="5"> <span class="checkmark"></span> 体験
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category" value="6"> <span class="checkmark"></span> 歴史
                                                </label>
                                            </div> -->
                                            <div class="col-4 col-sm-3">
                                                <label class="custom-radio">
                                                    <input type="checkbox" name="category" value="7"> <span class="checkmark"></span> SNS映え
                                                </label>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="section-footer form-action-buttons">
                            <div class="container">
                                <div class="row justify-content-center" style="--col-space-y: 15px;">
                                    <div class="col-12 col-md-6">
                                        <button class="button button-style-3 form-button" type="submit">次へ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </section>

                <!-- Footer -->
                <div id="footer" class="bg-white">
                    <section class="footer-site-map">
                        <div style="display: flex ;justify-content: center; align-items: center; height: 420px; background-color: #B4B4B4;color: #fff;">
                            <b style="font-size: 16px;">サイトマップ</b>
                        </div>                        
                    </section>

                    <div class="container">
                        <ul class="footer-social-buttons d-flex align-items-center justify-content-center">
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/twitter.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/instagram.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/web-assets/images/icons/tiktok.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="copyright">
                        <div class="container">
                            tohoku6.co.jp
                        </div>
                    </div>
                </div>
                <!-- /Footer -->

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

       

        

        <div id="user-notification-modal" class="modal user-notification-modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">通知</div>
                <ul class="user-notification_list custom-scrollbar">
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="date">2022.10.10</div>
                        <div class="flex-fill content">投稿スポットが公開されました</div>
                    </li>
                </ul>
            </div>
        </div>


        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>

</html>