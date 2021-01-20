<?php $shop = ShopifyApp::shop(); 
    $api = $shop->api();
    $_shop = $api->rest(
                'GET',
                '/admin/shop.json'
            )->body->shop;
    //var_dump($_shop);
?>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src">
            <img src="{{ secure_asset('/css/backend/v2/assets/images/logo.png') }}" style="width: 80px;">
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
    <div class="app-header__content">
        <!--<div class="app-header-left"> 
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-question-circle"> </i>
                        Get Support
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-thumbs-up"></i>
                        Upgrade
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-book"></i>
                        User Guide
                    </a>
                </li>
            </ul>        
        </div>-->
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img style="border-radius: 0 !important;" width="36" class="rounded-circle" src="https://cdn.shopify.com/shopifycloud/web/assets/v1/fadd62d4f33b5391d0eaa0de0ca7491a.svg" alt="">
                                </a>
                                
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <a href="https://{{$_shop->myshopify_domain}}" target="_blank">{{$_shop->name}}</a>
                            </div>
                            <div class="widget-subheading">
                                {{$_shop->email}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>