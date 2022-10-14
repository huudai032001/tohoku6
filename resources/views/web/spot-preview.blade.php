@extends('web.layouts.default')
    @section('link_css')
        <link rel="stylesheet" href="/web-assets/css/spot-editing.css">
    @endsection
    @section('content')
    <body>
    <?php
        $cate = implode(',',$spot->category);

        $images = implode(',',$spot->images_id);
        // dd($categorys = $spot->categories)
    ?>
        <div id="wrapper">
            <div id="inner-wrapper">
                <section class="spot-editing-form">
                    <form action="{{route('PostSpotPreview')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" value="{{$spot->id}}" name="id">
                        <input type="hidden" value="{{$spot->name}}" name="name">
                        <input type="hidden" value="{{$spot->location}}" name="location">
                        <input type="hidden" value="{{$spot->intro}}" name="intro">
                        <!-- <input type="hidden" value="{{$spot->name}}" name="name"> -->
                        <input type="hidden" value="{{$spot->image_id}}" name="image" id="image_id">
                        <input type="hidden" value="{{$cate}}" name="category">
                        <input type="hidden" value="{{$images}}" name="sub_image" id="sub_image">
                        <input type="hidden" value="{{$spot->address}}" name="address" >

                        <div class="section_header-2">
                            <div class="container">                                
                                <div class="title">
                                    プレビュー
                                </div>
                            </div>
                        </div>

                        <div class="container px-0">
                            <div style="background-color: #E3E3E3; height: auto;">
                                <div class="spot-images">
                                    <div class="container">
                                        <div class="slider">
                                            @if($image = $spot->image)
                                            <div class="item">
                                                <img src="{{$image->getUrl()}}" alt="" class="images-spot">
                                            </div>
                                            @endif
                                            @if($images = $spot->getImages())
                                                @foreach($images as $img)
                                                <div class="item">
                                                    <img src="{{$img->getUrl()}}" alt=""class="images-spot">
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="title">名前 : <span>{{$spot->name}}</span> </div>
                                <div class="title">位置 : <span>{{$spot->location}}</span> </div>
                                <div class="title">イントロ : <span>{{$spot->intro}}</span></div>
                                <div class="title">カテゴリー : 
                                @if($categorys = $spot->categories)
                                    @foreach($categorys as $category)
                                    <span class="tags">{{$category->name}}</span>
                                    @endforeach
                                @endif

                                @if($categorys = $spot->getCategories())
                                    @foreach($categorys as $category)
                                    <span class="tags">{{$category->name}} |</span>
                                    @endforeach
                                @endif
                                </div>

                                <!-- <div>{{$spot->name}}</div> -->
                                <!-- <div>{{$spot->name}}</div> -->

                            </div>
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
                                        <a href="/list-spot" class="button button-style-3 form-button" type="button" >戻る
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </section>


            </div> <!-- /inner-wrapper -->
        </div> <!-- /wrapper -->

        @include('web.inc.notification')        

        <script src="/web-assets/js/components.js"></script>
        <script src="/web-assets/js/main.js"></script>
        <script src="/web-assets/js/tohoku-calendar.js"></script>
        <script src="/web-assets/js/spot-preview.js"></script>
        
    </body>
    @endsection

