<div class="nav-bar-panel">
    <div class="button-close" data-toggle="nav-bar-panel">×</div>
    <div class="profile-button">
        @if(Auth::check())
        <a href="{{route('myProfile')}}">
            <div class="profile-image">
                <img width="75" src="/web-assets/images/profile.svg" alt="profile">
            </div>
            <div class="profile-label">プロフィール</div>
        </a>
        @endif
    </div>
    <div class="nav-menu">
        <ul class="ul-lv-1">
            <li class="li-lv-1">
                <a href="{{route('spotRegister')}}">スポット登録をする</a>
            </li>
            <li class="li-lv-1">
                <a href="{{route('myProfile')}}">お気に入り</a>
            </li>
            <li class="li-lv-1">
                <a href="{{route('list_spot')}}">スポットを探す</a>
            </li>
            <li class="li-lv-1">
                <a href="{{route('list_events')}}">イベントを探す</a>
            </li>
            <li class="li-lv-1">
                <a href="{{route('feature')}}">フィーチャー記事</a>
            </li>
            <li class="li-lv-1">
                <a href="{{route('list_goods')}}">トウホクポイントを使う</a>
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