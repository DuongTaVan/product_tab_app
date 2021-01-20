<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".ndn-preloader-icon").fadeOut("slow");
        ;
    });
</script>
<style type="text/css">
    /* This only works with JavaScript,
    if it's not present, don't show loader */
    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .ndn-preloader-icon {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url({{ secure_asset('/images/backend/loading.gif') }}) center no-repeat #fff;
    }

    .content img {
        width: 300px;
        height: 168px;
    }
</style>
<div class="ndn-preloader-icon"></div>
