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
                
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-file-text3"></i> <span> Spot</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{ route('admin.spot.index') }}" class="nav-link" >List</a></li>
                        <li class="nav-item"><a href="{{ route('admin.spot-category.index') }}" class="nav-link" >Category</a></li>
                    </ul>
                </li>
                

                <li class="nav-item">
                    <a href="{{ route('admin.goods.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Goods') }}</span></a>                    
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.event.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Event') }}</span></a>                    
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.comment.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Comment') }}</span></a>                    
                </li> 

                <li class="nav-item">
                    <a href="{{ route('admin.report.index') }}" class="nav-link"><i class="icon-file-text3"></i> <span> {{ __('Report') }}</span></a>                    
                </li> 
                

                <li class="nav-item">
                    <a href="{{ route('admin.file-library') }}" class="nav-link"><i class="icon-images2"></i> <span>{{ __('common.file_library') }}</span></a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="icon-users"></i> <span>{{ __('common.user') }}</span></a>                    
                </li>


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