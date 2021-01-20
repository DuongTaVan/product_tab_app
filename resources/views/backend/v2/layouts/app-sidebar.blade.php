<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <style>
        .li-active {
            color: #202e78;
            background: rgba(92,106,196,.12);
        }
    </style>
    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">{{ config('shopify-app.app_name') }}</li>
                <li class="li-menu">
                    <a href="{{route('navbar.index')}}">
                        <i class="metismenu-icon fa fa-credit-card "></i>
                        Manage tab
                    </a>
                </li>
                <li class="li-menu">
                    <a href="{{route('product.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Product
                    </a>
                </li>
                <li class="li-menu li-active">
                    <a href="{{route('setting.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.li-menu a').filter(function () {
            return this.href == location.href
        }).parent().addClass('li-active').siblings().removeClass('li-active')
        $('.li-menu a').click(function () {
            $(this).parent().addClass('li-active').siblings().removeClass('li-active')
        })
    })
</script>