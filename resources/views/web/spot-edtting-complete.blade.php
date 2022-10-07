@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/spot-editing.css">
    @endsection
    @section('content')

    <body>


        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="spot-editing-form">
                    <div class="section_header-2">
                        <div class="container">                                
                            <div class="title">
                                投稿予約完了しました
                            </div>
                            <div class="desc">
                                事務局が確認中です。<br>
                                完了したらお知らせします。

                            </div>
                        </div>
                    </div>

                    <div class="container text-align-center pb-50">
                        <a href="{{route('list_spot')}}" class="button button-style-3">スポット一覧へ
                        </a>
                    </div>
                </section>

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

       

        

        <div id="user-notification-modal" class="modal user-notification-modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">通知</div>
                <ul class="user-notification_list custom-scrollbar">
                    @if(Auth::check())
                        @if($notifi = Auth::user()->getNotifi())
                            @foreach($notifi as $noti)
                            <li class="d-flex align-items-center">
                                <div class="date">{{$noti->created_at}}</div>
                                <div class="flex-fill content">投稿スポットが公開されました</div>
                            </li>
                            @endforeach
                        @endif
                    @endif
                </ul>
            </div>
        </div>


        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>
    @endsection
