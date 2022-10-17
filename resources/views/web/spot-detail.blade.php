@extends('web.layouts.default')
   
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/spot-detail.css">
    @endsection
    @section('content')

    <body class="my-profile-page">
    <input type="hidden" value="{{Auth::user()->id}}" id="user">

        <div id="wrapper">
            <div id="inner-wrapper">

                <section class="section-spot-detail">
                    <div class="container">
                        <div class="section_header">
                            <div class="section_title">
                                <img src="/web-assets/images/tohoku-6-spot.svg" alt="">
                            </div>
                            <div class="action-button" data-show-modal="#modal-spot-actions-two" data-id="{{$info_spot->id}}">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="mb-20 d-flex justify-content-between">
                            <div class="area d-flex align-items-center">
                                <div class="icon"></div>
                                <img src="/web-assets/images/area/akita.svg" alt="">
                            </div>
                            <div class="icon-favorite">
                                <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                            </div>
                        </div>
                        <h1 class="spot-title">{{$info_spot->name}}・
                            <!-- <span class="text-latin">RISING SUN</span> -->
                        </h1>
                        <div class="location">{{$info_spot->location}}</div>
                        <div class="author">
                            <span class="text-author">投稿者：</span> <span class="author-name">{{$info_spot->user->name}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="tags">
                            @if($categorys = $info_spot->categories)
                                @foreach($categorys as $category)
                                <span class="tags">{{$category->name}} |</span>
                                @endforeach
                            @endif
                            </div>

                            @if(Auth::check())
                            <a onclick="favorite()">
                            @else
                            <a >
                            @endif
                            <div class="favorite-count d-flex align-items-center">
                                <div class="icon">
                                    <img src="/web-assets/images/icons/heart-gray.svg" alt="">
                                </div>
                                <div class="count-number">{{$info_spot->favorite}}</div>
                            </div>
                            </a>
                        </div>                        
                    </div>
                    @if ($images = $info_spot->getImages())
                    <div class="spot-images">
                        <div class="container">
                            <div class="slider owl-carousel">
                                @foreach ($images as $image)

                                <div class="item">
                                    <img src="{{ $image->getUrl() }}" alt="">
                                </div>       
                                @endforeach                         
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="container">
                        <div class="post-content-text">
                            {{$info_spot->intro}}
                        </div>
                    </div>
                </section>

                <section class="section-post-reviews">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
                            <div class="title-post-reviews">
                                みんなの口コミ
                            </div>
                            <div class="toggle-button">+</div>
                        </div>
                    </div>
                    <div class="toggle-content">
                        <div class="post-my-review-form">
                        @if(Auth::check())
                            <form action="{{route('spotComment')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="posts_id" id="posts_id" value="{{$info_spot->id}}">
                            <input type="hidden" name="name_user" id="name_user" value="{{Auth::user()->name}}">
                            <input type="hidden" name="author" id="author" value="{{$info_spot->author}}">

                            <div class="container">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <img src="/web-assets/images/profile.svg" alt="">
                                    </div>
                                    <div class="user-name">
                                        {{Auth::user()->name}}
                                    </div>
                                </div>
                                <div class="ml-50">
                                    <textarea class="textarea review-content-input" rows="4" name="comment"></textarea>
                                    @error('comment')
                                    <div class="form-error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-align-center">
                                    <button class="button button-style-3">口コミを投稿する</button>
                                </div>
                            </div>
                            </form>
                        @endif
                        </div>
                        <div class="review-list">
                            <div class="post-container">
                                <div class="post-row row" id="list_comment">
                                    @foreach($list_comment as $value)

                                    <div class="col-12">
                                        <div class="review-item">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="/web-assets/images/profile.svg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        {{$value->name_user}}
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="review-time">{{$value->created_at}}</div>
                                                    <div class="toggle-action-button d-flex align-items-center" data-show-modal="#modal-review-actions" data-id="{{$value->id}}" data-user_id="{{$value->user_id}}">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                            {{$value->content}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="load-more-review text-align-center">
                            <button class="button button-style-3" onclick="all_comment({{$info_spot->id}})">もっと見る（ {{$info_spot->count_comment}} 件）</button>
                        </div>
                    </div>
                </section>

                
                <section class="section-nearby-map">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="container px-0">
                        <div class="ratio" style="--ratio:1.62;">

                            <div style="background-color: #E3E3E3;">

                            </div>

                        </div>
                    </div>
                </section>

                <section class="section-related-spots">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                        @foreach($recently as $value)      
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="{{route('spot_detail',$value->alias)}}">
                                            <div class="ratio thumb-image">
                                                @if($image = $value->image)
                                                <img src="{{$image->getUrl()}}" alt="" class="image">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">{{$value->time_start}} UP!</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('spot_detail',$value->alias)}}">
                                                <div class="item-title">{{$value->name}} .</div>
                                            </a>
                                            <div class="item-desc">
                                            {{$value->intro}}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                        @if($category = $value->categoryDetail)
                                                            @foreach($category as $cate)
                                                                @if($ca = $cate->category)
                                                                <span class="tag"> {{$ca->name}}|</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">{{$value->favorite}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        @endforeach                       
                        </div>
                        
                    </div>
                </section>

                <section class="section-nearby-spots">
                    <div class="container">
                        <div class="section_title">近隣マップ</div>
                    </div>
                    <div class="post-container">
                        <div class="post-row row">
                            @foreach($list_spot as $value)
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-8 d-flex align-items-center">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="/web-assets/images/icons/star-gray.svg" alt="">
                                        </div>
                                        <a href="{{route('spot_detail',$value->alias)}}">
                                            <div class="ratio thumb-image">
                                                @if($image = $value->image)
                                                <img src="{{$image->getUrl()}}" alt="" class="image">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item-content flex-fill d-flex">
                                        <div>
                                            <div class="post-date">{{$value->created_at}}</div>
                                            <div class="area d-flex align-items-center">
                                                <div class="icon"></div>
                                                <div>
                                                    <img src="/web-assets/images/area/akita.svg" alt="">
                                                </div>
                                            </div>
                                            <a href="{{route('spot_detail',$value->alias)}}">
                                                <div class="item-title">{{$value->name}}・</div>
                                            </a>
                                            <div class="item-desc">
                                            {{$value->address}}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="tags">
                                                    @if($category = $value->categoryDetail)
                                                        @foreach($category as $cate)
                                                            @if($ca = $cate->category)
                                                            <span class="tag"> {{$ca->name}}|</span>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </div>                                               
                                                </div>
                                                <div class="favorite-count ml-20">
                                                    <span class="count text-latin">123</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

        <div id="modal-spot-actions" class="modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">このスポットについて</div>
                <ul class="modal_menu">
                    
                    @if(Auth::check())
                        @if(Auth::user()->id == $info_spot->author)
                    <li>
                        <a href="{{route('spotEdit',$info_spot->id)}}">編集する</a>
                    </li>
                    <li>
                        <a href="#" data-to-report-spot>事務局に報告する</a>
                    </li> 
                        @endif
                    @else
                    <li>
                        <a href="{{route('signin')}}">事務局に報告する</a>
                    </li> 
                    @endif

                </ul>
            </div>
        </div>

        <div id="modal-spot-actions-two" class="modal">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">このスポットについて</div>
                <ul class="modal_menu">
                @if(Auth::check())
                        @if(Auth::user()->id == $info_spot->author)
                    <li>
                        <a href="{{route('spotEdit',$info_spot->id)}}">編集する</a>
                    </li>
                    @endif
                    <li>
                        <a data-show-modal="#modal-report-two">事務局に報告する</a>
                    </li>  
                @else
                    <li>
                        <a href="{{route('signin')}}">事務局に報告する</a>
                    </li> 
                    @endif               
                </ul>
            </div>
        </div>

        <div id="modal-review-actions" class="modal modal_comment">
            <input type="hidden" id="id_comment" value="">
            <input type="hidden" id="id_posts" value="">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">この口コミについて</div>
                <ul class="modal_menu">
                    <li>
                        <a onclick="delete_comment()" data-to-delete-review class="delete_com">削除する</a>
                    </li>
                    <li>
                        <a href="#" data-to-report-review>事務局に報告する</a>
                    </li>                    
                </ul>
            </div>
        </div>

        <div id="modal-report" class="modal modal-report">
            <div class="modal_backdrop"></div>            
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">事務局に報告する</div>
                <div class="modal-report_form">
                    <div class="note">
                        ガイドライン違反などお気付きの点があればお知らせください。 報告いただいた内容については、運営側で随時確認を行います。 返信は致しませんのでご了承ください。
                    </div>
                    <div class="form-layout-1">
                        <textarea class="textarea report-content" rows="6" id="report"></textarea>
                        <div class="error" id="error_report_comment"></div>
                        <div class="text-align-center" style="margin-top: 15px;">
                            <button class="button button-style-1 button-form-submit" onclick="report()">送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-report-two" class="modal modal-report">
            <div class="modal_backdrop"></div>            
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <div class="modal_title">事務局に報告する</div>
                <div class="modal-report_form">
                    <div class="note">
                        ガイドライン違反などお気付きの点があればお知らせください。 報告いただいた内容については、運営側で随時確認を行います。 返信は致しませんのでご了承ください。
                    </div>
                    <div class="form-layout-1">
                        <textarea class="textarea report-content" rows="6" id="report_two"></textarea>
                        <div class="error" id="error_report_spot"></div>
                        <div class="text-align-center" style="margin-top: 15px;">
                            <button class="button button-style-1 button-form-submit" onclick="report_two()">送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="number-6-button-actions" class="modal modal-bottom">
            <div class="modal_backdrop"></div>
            <div class="modal_dialog">
                <div class="modal_close">×</div>
                <ul class="modal_menu">
                    <li>
                        <a href="spot-register.html">スポット登録をする</a>
                    </li>
                    <li>
                        <a href="#n">トウホクポイントを使う</a>
                    </li>
                    <li>
                        <a href="#n">トウホクシックスとは？</a>
                    </li>
                    <li>
                        <a href="#n">トウホクポイントとは？</a>
                    </li>
                </ul>
            </div>
        </div>

        @include('web.inc.notification')        

        <div id="ajax-loading-overlay" class="ajax-loading-overlay">
            <div class="ajax-loading_container">
                <div class="loading-icon"></div>
                <div class="result-message" id="result-message"></div>
            </div>            
        </div>


        <div class="fixed-number-6 d-flex align-items-center justify-content-center" data-show-modal="#number-6-button-actions">
            <div>
                <img src="/web-assets/images/number-6.svg" alt="" class="d-block">
            </div>
        </div>

        
        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="/web-assets/js/spot-detail.js"></script>
        
    </body>
    @endsection
