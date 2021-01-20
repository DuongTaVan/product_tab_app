@include('backend.v2.header')
<?php $shop = ShopifyApp::shop();  ?>
@include('backend.v2.preloader')

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    @include('backend.v2.layouts.app-header')
    <style>
        .save-loading {
            bottom: 0;
            height: 100%;
            left: 0;
            margin: 0 auto;
            position: fixed;
            right: 0;
            text-align: center;
            top: 40%;
            width: 100%;
            z-index: 9998;
        }

        .bgr {
            background-color: #323232b5;
            bottom: 0;
            height: 100%;
            left: 0;
            margin: 0 auto;
            position: fixed;
            right: 0;
            text-align: center;
            width: 100%;
            z-index: 9999;
        }
    </style>
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')

        <div class="app-main__outer">
            <div class="ndnapps-wrapper">
                <div class="bgr" style="display: none;"></div>
                <div class="save-loading" style="display: none;">
                    <img src="https://www.ndnapps.com/ndnapps/dev/contact-form/images/backend/ajax-spinner.gif">
                </div>
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fa fa-bell icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div class="main-card card">
                                    <div class="card-body">
                                        @if(session()->has('message'))
                                            <div class="text-success">
                                                <span style="font-size: 14px;">{{ session()->get('message') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--end app-page-title-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Manage Product
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a type="button" class="btn btn-primary js-add-item" data-toggle="modal"
                                               data-target="#productModal">
                                                <span><i class="fa fa-plus-circle"></i> Add Item </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input type="search" id="form1" class="form-control search_key"/>
                                            <label class="form-label" for="form1">Search</label>
                                        </div>
                                    </div>
                                    <div class="ndn-table">
                                        @include('product.include.table_product')
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    @include('backend.v2.other-apps')
                </div>
                @include('backend.v2.layouts.footer-wrapper')
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Do you want to delete ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>


</div>
<style>
    #exampleModal .modal-dialog {
        max-width: 800px;
    }
</style>
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    $(function () {
        $('.js-add-item').click(function () {
            let route = '{{route('product.ajax-modal')}}';
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    $('#productModal .modal-body').html(data.html);
                });
        });
        $('.js-edit-item').click(function () {
            let route = $(this).attr('href');
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    //console.log(data.html);
                    $('#productModal .modal-body').html(data.html);
                });
        });
    });
    $(document).on("click", "#next", function (e) {
        e.preventDefault();
        let page_info = $(this).attr('href');
        let route = '{{route('paginate_product_ajax')}}';
        let btn = $(this).attr('data-btn');
        let cursor = $(this).attr('data-cursor');
        let search = $(this).attr('data-search');
        //console.log(page_info);
        $.ajax({
            url: route,
            data: {page_info: page_info, btn: btn, cursor: cursor, search:search},
            // beforeSend: function (xhr) {
            //     $('.ndnapps-wrapper').find('.save-loading').show();
            //     $('.ndnapps-wrapper').find('.bgr').show();
            // },
        })
            .done(function (data) {
                // $('.ndnapps-wrapper').find('.save-loading').hide();
                // $('.ndnapps-wrapper').find('.bgr').hide();
                $('.ndn-table').html(data.html);
            });
    });
    $(document).on("click", "#previous", function (e) {
        e.preventDefault();
        let page_info = $(this).attr('href');
        let route = '{{route('paginate_product_ajax')}}';
        let btn = $(this).attr('data-btn');
        let cursor = $(this).attr('data-cursor');
        let search = $(this).attr('data-search');
        //alert(page_info);
        //console.log(page_info);
        $.ajax({
            url: route,
            data: {page_info: page_info, btn: btn, cursor: cursor, search:search},
            // beforeSend: function (xhr) {
            //     $('.ndnapps-wrapper').find('.save-loading').show();
            //     $('.ndnapps-wrapper').find('.bgr').show();
            // },
        })
            .done(function (data) {
                // $('.ndnapps-wrapper').find('.save-loading').hide();
                // $('.ndnapps-wrapper').find('.bgr').hide();
                $('.ndn-table').html(data.html);
            });
    });
    $('.search_key').keyup(function () {
        let query = $(this).val();
        let route = '{{route('paginate_product_ajax')}}';
        let rog = 'dth999';
        if(query == ""){
            rog = "dth9999";
        }
        $.ajax({
            url: route,
            data: {search: query, rog:rog}
        })
            .done(function (data) {
                $('.ndn-table').html(data.html);
            });


    })
</script>

@include('backend.v2.footer')
