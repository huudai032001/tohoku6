<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-dark navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-info22"></i>
        </button>
        
    </div>

    <div class="navbar-brand text-center text-lg-left">
        <a href="{{ route('admin.dashboard') }}" class="d-inline-block">
            {{-- <img src="/core-assets/images/logo_light.png" class="d-none d-sm-block" alt="">             --}}
        </a>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
        {{-- <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="d-lg-none ml-3">Git updates</span>
                    <span class="badge badge-warning badge-pill ml-auto ml-lg-0">9</span>
                </a>

                <div class="dropdown-menu dropdown-content wmin-lg-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">Git updates</span>
                        <a href="#" class="text-body"><i class="icon-sync"></i></a>
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-primary text-primary rounded-pill border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
                                </div>

                                <div class="media-body">
                                    Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                    <div class="text-muted font-size-sm">4 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon"><i class="icon-git-commit"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    Add full font overrides for popovers and tooltips
                                    <div class="text-muted font-size-sm">36 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-info text-info rounded-pill border-2 btn-icon"><i class="icon-git-branch"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    <a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
                                    <div class="text-muted font-size-sm">2 hours ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-success text-success rounded-pill border-2 btn-icon"><i class="icon-git-merge"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    <a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
                                    <div class="text-muted font-size-sm">Dec 18, 18:36</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-primary text-primary rounded-pill border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
                                </div>
                                
                                <div class="media-body">
                                    Have Carousel ignore keyboard events
                                    <div class="text-muted font-size-sm">Dec 12, 05:46</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-content-footer bg-light">
                        <a href="#" class="text-body mr-auto">All updates</a>
                        <div>
                            <a href="#" class="text-body" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
                            <a href="#" class="text-body ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span> --}}
        
    </div>
    
    @php
        $langs = [
            'en' => [
                'name' => 'English',
                'flag' => 'us.svg'
            ],
            'ja' => [
                'name' => '日本語',
                'flag' => 'jp.svg'
            ],
            'vi' => [
                'name' => 'Tiếng Việt',
                'flag' => 'vn.svg'
            ],
        ];
    @endphp
    

    <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
        <li class="nav-item dropdown">
            <span  class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                @php
                    $current_lang = session('locale', config('app.locale'));
                @endphp
                @foreach ($langs as $lang_code => $lang)
                    @if ($lang_code == $current_lang)
                        <img src="/share-assets/flags/{{ $lang['flag'] }}" class="img-flag mr-2" alt="">
                        {{ $lang['name'] }}
                    @endif
                @endforeach
                
            </span>
        
            <div class="dropdown-menu">
                @foreach ($langs as $lang_code => $lang)
                    <a href="?setLocale={{ $lang_code }}" class="dropdown-item"><img src="/share-assets/flags/{{ $lang['flag'] }}"
                            class="img-flag" alt=""> {{ $lang['name'] }}</a>                    
                @endforeach               
            </div>
        </li>        

        @php
            $user = Auth::user();
        @endphp
        <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
            <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
                <img src="{{ ($image = $user->avatarImage) ? $image->getUrl('thumbnail') : '/admin-assets/images/avatar-placeholder.png' }}" class="rounded-pill mr-lg-2 nav-bar-avatar-image" width="34" height="34" alt="">
                <span class="d-none d-lg-inline-block">{{ $user->display_name ?: $user->login_name ?: $user->email }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                {{-- <a href="#" class="dropdown-item"><i class="icon-user"></i> Edit profile</a>--}}
                <div class="dropdown-divider"></div>                
                <a href="{{ route('logout', ['relogin_redirect' => request()->fullUrl()]) }}" class="dropdown-item"><i class="icon-switch2"></i> {{ __('common.logout') }}</a>
            </div>
        </li>
    </ul>
</div>
<!-- /main navbar -->
