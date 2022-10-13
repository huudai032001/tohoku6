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
        @include('web.inc.notification')        

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        
    </body>
    @endsection
