<?php $shop = ShopifyApp::shop(); 
    $api = $shop->api();
    $access_scopes = $api->request(
                'GET', '/admin/oauth/access_scopes.json')->body->access_scopes;
    $flag = 0;
    foreach ($access_scopes as $key => $value) {
        if($value->handle == 'write_themes'){
            $flag = 1; 
            break;
            //exit;
        }
        
    }
?>
<span style="font-size: 14px;"><i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i> Store locator URL: <a target="_brank" href="//{{$shop->shopify_domain}}/apps/store-locator/all">https://{{$shop->shopify_domain}}/apps/store-locator/all</a>. To add this URL to your menu: Go to <b>Online Store > <a target="_brank" href="//{{$shop->shopify_domain}}/admin/menus">Navigation</a></b>. Add or edit a menu >> Then, add a menu item and paste <b>/apps/store-locator/all</b> into the Link field.</span><br/>

@if(App\Storelocator::getCountItems()>0 && $flag == 1)
<span style="font-size: 14px;">
    <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i> After created, edited or changed anything with Store Locator, please click <button class="btn btn-primary" id="storelocator-publish-to-shop"><i class="fa fa-hand-point-right" aria-hidden="true"></i> Publish Stores</button>
</span>
@endif