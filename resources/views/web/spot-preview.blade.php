@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/spot-editing.css">
    @endsection
    @section('content')
    <body>


        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="spot-editing-form">
                    <form action="{{route('PostSpotPreview')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" value="{{$spot->id}}" name="id">
                        <input type="hidden" value="{{$spot->name}}" name="name">
                        <input type="hidden" value="{{$spot->location}}" name="location">
                        <input type="hidden" value="{{$spot->intro}}" name="intro">
                        <input type="hidden" value="{{$spot->name}}" name="name">
                        <input type="hidden" value="{{$spot->image_id}}" name="image">
                        <input type="hidden" value="{{$spot->category}}" name="category">

                        <input type="hidden" value="{{$spot->sub_image}}" name="sub_image">

                        <div class="section_header-2">
                            <div class="container">                                
                                <div class="title">
                                    プレビュー
                                </div>
                            </div>
                        </div>

                        <div class="container px-0">
                            <div style="background-color: #E3E3E3; height: 300px;"></div>
                        </div>

                        <div class="section-footer form-action-buttons">
                            <div class="container">
                                <div class="action-notice">こちらで投稿しますか？</div>
                                <div class="row justify-content-center" style="--col-space-y: 15px;">
                                    <div class="col-12 col-md-6">
                                        <input class="button button-style-3 form-button" type="submit" value="次へ">
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="#" class="button button-style-3 form-button" type="button" >戻る
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </section>


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
    @endsection

