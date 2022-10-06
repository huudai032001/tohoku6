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
            <a href="/">
                <img src="/web-assets/images/number-6.svg" alt="Tohoku 6">
            </a>
        </div>
    </div>
    <div class="nav-bar-right d-flex justify-content-end">
        @if(Auth::check())
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
        @else
        <div class="nav-bar-right d-flex justify-content-end flex-fill">
            <div class="non-user-menu-buttons d-flex align-items-center">
                <a href="signin" class="login-button button">
                    ログイン
                </a>
                <a href="register" class="register-button button">
                    新規登録
                </a>
            </div>
        </div>
        @endif
    </div>
</div>


<!-- /Menu bar -->