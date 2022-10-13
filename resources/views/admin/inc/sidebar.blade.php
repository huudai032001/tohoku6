<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">       

        <div class="sidebar-section sidebar-user my-1 d-lg-none">
            <div class="sidebar-section-body">
                <div class="media">
                    <div></div>
        
                    <div class="ml-auto align-self-center">                        
        
                        <button type="button"
                            class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="icon-home2"></i>
                        <span>
                            {{ __('Dashboard') }}
                        </span>
                    </a>
                </li>

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{ __('Data management') }}</div> <i class="icon-menu"></i></li>
                <li class="nav-item">
                    <a href="{{ route('admin.comment.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Comment') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.report_comment.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Report Comment') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.report_spot.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Report Spot') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Category') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.spot.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Spot') }}</span></a>                    
                </li> 

                <li class="nav-item">
                    <a href="{{ route('admin.goods.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Goods') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.event.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Event') }}</span></a>                    
                </li> 
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.page.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Page') }}</span></a>                    
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Post') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.post.index') }}" class="nav-link">{{ __('List') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.post-category.index') }}" class="nav-link">{{ __('Category') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.post-tag.index') }}" class="nav-link">{{ __('Tag') }}</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Shop') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.shop.index') }}" class="nav-link">{{ __('List') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.shop-category.index') }}" class="nav-link">{{ __('Category') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.shop-tag.index') }}" class="nav-link">{{ __('Tag') }}</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Machi') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.machi.index') }}" class="nav-link"> {{ __('List') }}</a></li> 
                        <li class="nav-item"><a href="{{ route('admin.machi-tag.index') }}" class="nav-link">{{ __('Tag') }}</a></li> 
                    </ul>
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Job') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.job.index') }}" class="nav-link">{{ __('List') }}</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Event') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.event.index') }}" class="nav-link">{{ __('List') }}</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.inquiry.index') }}" class="nav-link"><i class="icon-envelope"></i> <span>{{ __('Inquiry')
                            }}</span></a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.upload.index') }}" class="nav-link"><i class="icon-upload"></i>
                        <span>
                            {{ __('File management') }}
                        </span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('admin.file-library') }}" class="nav-link"><i class="icon-images2"></i> <span>{{ __('common.file_library') }}</span></a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="icon-users"></i> <span>{{ __('common.user') }}</span></a>                    
                </li>



                {{-- <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Forum') }}</div> <i class="icon-menu"></i>
                </li> --}}

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Topic') }}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.topic.index') }}" class="nav-link">{{ __('List') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.topic-category.index') }}" class="nav-link">{{ __('Category') }}</a></li>
                        <li class="nav-item"><a href="{{ route('admin.topic-tag.index') }}" class="nav-link">{{ __('Tag') }}</a></li>                        
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.reply.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span>{{ __('Reply') }}</span></a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.report.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span>{{ __('Report')
                            }}</span></a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-envelop3"></i> <span> Contact</span></a>
                
                </li> --}}               
               

                

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-wrench3"></i> <span>Setting</span></a>
                
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-magic-wand2"></i> <span>Tool</span></a>
                
                </li> --}}

                <!-- /main -->

               

                
                {{-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Test</div> <i class="icon-menu" title="Forms"></i></li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-pencil3"></i> <span>Test components</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="#" class="nav-link">Sample text</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sample text</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sample text</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-spinner2 spinner"></i> <span>Test nimations</span></a>                    
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-list-unordered"></i>
                        <span>Test 2</span>
                        <span class="badge badge-primary align-self-center ml-auto">3.0</span>
                    </a>
                </li>                --}}

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> Tool</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="/admin/tool/log-viewer" class="nav-link" target="_blank">Log</a></li>                                              
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>
<!-- /main sidebar -->