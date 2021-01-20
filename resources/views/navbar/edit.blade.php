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
                                <div class="card-header">Edit Manage Tab
                                </div>
                                <div class="card-body table-responsive">
                                    <form action="{{route('navbar.update',$navbar->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control" placeholder="name ... "
                                                   value="{{$navbar->name}}">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                name with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea id="summary-ckeditor" name="content" class="form-control"
                                                      placeholder="content ... ">{{$navbar->content}}</textarea>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                content with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Order</label>
                                            <input name="n_order" type="number" min="0" max="5" class="form-control" value="{{$navbar->n_order}}">
                                            <small id="emailHelp" class="form-text text-muted">order of it in list manage tab.</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <!-- Div tag -->
                                            <div id="ndn_dev" role="iconpicker"></div>
                                            <small id="emailHelp" class="form-text text-muted">icon near title.</small>
                                        </div>
                                        <div class="form-group tbl_prd">
                                            @include('navbar.include.index')
                                        </div>
                                        <?php
                                        $product_arr = json_decode($navbar->product_id);
                                        $product_id = implode(",", $product_arr);
                                        //dd($product_arr);
                                        ?>
                                        <input class="hd_ip" type="hidden" name="array[]" id="data-hid"
                                               value="{{$product_id}}">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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

</div>
<script>
    //let arrp = [];
    let arrp = $('.hd_ip').val().split(',');
    //arrp.push(arr);
    //console.log(arrp.length);
    $(document).on("change", ".check-all", function () {
        if (this.checked) {
            $('.check-item').prop('checked', true);
            $('.check-item').each(function () {
                arrp.push($(this).val());
            });
            $('.hd_ip').val(arrp);
        } else {
            arrp = [];
            $('.check-item').prop('checked', false);
            $('.hd_ip').val("");
        }
    })
    $(document).on("click", ".check-item", function (e) {

        if (this.checked) {
            if ($.inArray($(this).val(), arrp) == -1) {
                arrp.push($(this).val());
            }
           // alert(arrp);
        } else {
            let index = arrp.indexOf($(this).val());
            //alert(index);
            if (index != -1) {
                arrp.splice(index, 1);
            }
            $('.check-all').prop('checked', false);
        }
        $('.hd_ip').val(arrp);

    });
    $(document).on("click", "#next", function (e) {
        e.preventDefault();
        let page_info = $(this).attr('href');
        let route = '{{route('paginate_product_navbar_ajax')}}';
        let btn = $(this).attr('data-btn');
        let cursor = $(this).attr('data-cursor');
        let data_id = $(this).attr('data-id');
        let check = $('.hd_ip').val();
        check = check.split(',');
        //alert(data_id);
        //console.log(page_info);
        $.ajax({
            url: route,
            data: {page_info: page_info, btn: btn, cursor: cursor, id: data_id},
            // beforeSend: function (xhr) {
            //     $('.ndnapps-wrapper').find('.save-loading').show();
            //     $('.ndnapps-wrapper').find('.bgr').show();
            // },
        })
            .done(function (data) {
                // $('.ndnapps-wrapper').find('.save-loading').hide();
                // $('.ndnapps-wrapper').find('.bgr').hide();
                $('.tbl_prd').html(data.html);
                let i = 0;
                $('.check-item').each(function () {
                    if ($.inArray($(this).val(), check) != -1) {
                        $(this).prop('checked', true);
                        i++;
                    }
                    // alert($.inArray($(this).val(), check));
                    // $(this).prop('checked', true);
                });
                if (i == 10) {
                    $('.check-all').prop('checked', true);
                }
            });
    });
    $(document).on("click", "#previous", function (e) {
        e.preventDefault();
        let page_info = $(this).attr('href');
        let route = '{{route('paginate_product_navbar_ajax')}}';
        let btn = $(this).attr('data-btn');
        let cursor = $(this).attr('data-cursor');
        let data_id = $(this).attr('data-id');
        let check = $('.hd_ip').val();
        check = check.split(',');
        //console.log(check);
        $.ajax({
            url: route,
            data: {page_info: page_info, btn: btn, cursor: cursor, id: data_id},
            // beforeSend: function (xhr) {
            //     $('.ndnapps-wrapper').find('.save-loading').show();
            //     $('.ndnapps-wrapper').find('.bgr').show();
            // },
        })
            .done(function (data) {
                // $('.ndnapps-wrapper').find('.save-loading').hide();
                // $('.ndnapps-wrapper').find('.bgr').hide();
                $('.tbl_prd').html(data.html);
                let i = 0;
                $('.check-item').each(function () {
                    if ($.inArray($(this).val(), check) != -1) {
                        $(this).prop('checked', true);
                        i++;
                    }
                    // alert($.inArray($(this).val(), check));
                    // $(this).prop('checked', true);
                });
                if (i == 10) {
                    $('.check-all').prop('checked', true);
                }
            });
    });
</script>
@include('backend.v2.footer')
