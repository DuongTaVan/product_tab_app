@if(config('shopify-app.esdk_enabled'))
    <script src="https://cdn.shopify.com/s/assets/external/app.js?{{ date('YmdH') }}"></script>
    <script type="text/javascript">
        ShopifyApp.init({
            apiKey: '{{ config('shopify-app.api_key') }}',
            shopOrigin: 'https://{{ ShopifyApp::shop()->shopify_domain }}',
            debug: false,
            forceRedirect: false
        });
    </script>

    @include('shopify-app::partials.flash_messages')
@endif
