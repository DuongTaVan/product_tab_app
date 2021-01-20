@include('backend.v2.header')
<?php $shop = ShopifyApp::shop();  ?>
@include('backend.v2.preloader')

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    @include('backend.v2.layouts.app-header')
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')
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

            .ndnapps-wrapper label {
                font-weight: 500 !important;
                font-size: 13px !important;
            }
        </style>
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
                    <style>
                        .form-group .form-control {
                            width: 250px;
                        }
                    </style>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Setting
                                </div>
                                <div class="card-body table-responsive">
                                    <form id="setting-form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch checkbox" data-toggle="tooltip"
                                                               data-placement="right"
                                                               title="" data-original-title="Click to Enable/Disable">
                                                            <input class="form-control" type="checkbox" id="status"
                                                                   name="status"
                                                                   @if($setting->status == 1)checked="checked"@endif>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="exampleFormControlSelect1"
                                                                name="type">
                                                            <option value="0"
                                                                    @if($setting->type == 0)selected="selected"@endif>
                                                                vertical
                                                            </option>
                                                            <option value="1"
                                                                    @if($setting->type == 1)selected="selected"@endif>
                                                                horizontal
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Max
                                                        Column</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" min="1" max="5"
                                                               name="max_column"
                                                               value="{{$setting->max_column}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="status"
                                                           class="col-sm-3 col-form-label">Background</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-control" type="color"
                                                                       class="form-check-input"
                                                                       name="background"
                                                                       value="{{$setting->background}}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Color</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-control" type="color"
                                                                       class="form-check-input"
                                                                       name="color" value="{{$setting->color}}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Font
                                                        Family</label>
                                                    <div class="col-sm-9">
                                                        <select name="font_family" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option @if($setting->font_family == 0)selected="selected"@endif style="font-family: Arapey,serif; " value="0">
                                                                Arapey,serif
                                                            </option>
                                                            <option @if($setting->font_family == 1)selected="selected"@endif style="font-family: sans-serif, Arial; " value="1">
                                                                sans-serif, Arial
                                                            </option>
                                                            <option @if($setting->font_family == 2)selected="selected"@endif style="font-family: Consolas, Menlo;" value="2">
                                                                Consolas, Menlo
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div><small style="margin-left: 128px;" id="emailHelp" class="form-text text-muted">it will change font-family your website.</small></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Font
                                                        Size</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" min="1" type="number"
                                                               name="font_site"
                                                               value="{{$setting->font_site}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Background Title</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-control" type="color"
                                                                       class="form-check-input"
                                                                       name="background_title"
                                                                       value="{{$setting->background_title}}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Color
                                                        Title</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-control" type="color"
                                                                       class="form-check-input"
                                                                       name="color_title"
                                                                       value="{{$setting->color_title}}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-2">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button class="btn btn-primary js-add-js-setting"
                                                            type="submit"><span><i
                                                                    class="fa fa-plus-circle"></i> Save Settings </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
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
<style>
    #exampleModal .modal-dialog {
        max-width: 800px;
    }
</style>
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

<style>
    .toast-success {
        color: white !important;
        background-color: #3ac47d !important;
    }
</style>
<div class="ndn-message">

</div>
@section('script_dth')
    <script>
        $(document).ready(function () {
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
        $(document).ready(function () {
            $('.js-add-item').click(function () {
                let route = '{{route('setting.ajax_modal')}}';
                $.ajax({
                    url: route,
                })
                    .done(function (data) {
                        $('#settingModal .modal-body').html(data.html);
                    });
            });
            $('.js-edit-item').click(function () {
                let route = $(this).attr('href');
                $.ajax({
                    url: route,
                })
                    .done(function (data) {
                        //console.log(data.html);
                        $('#settingModal .modal-body').html(data.html);
                    });
            });


        });
        $(document).on("click", ".js-add-js-setting", function (e) {
            e.preventDefault();
            let route = '{{route('setting.update')}}';
            // alert($('#setting-form').serialize());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: route,
                data: $('#setting-form').serialize(),
                beforeSend: function (xhr) {
                    $('.ndnapps-wrapper').find('.save-loading').show();
                    $('.ndnapps-wrapper').find('.bgr').show();
                    //$('#publicthemesFrom').addClass('loading-ajax');

                },
            })
                .success(function (data) {
                    $('.ndnapps-wrapper').find('.save-loading').hide();
                    $('.ndnapps-wrapper').find('.bgr').hide();
                    saveStatus(data);
                })
                .fail(function (data) {
                    $('.ndnapps-wrapper').find('.save-loading').hide();
                    $('.ndnapps-wrapper').find('.bgr').hide();
                    saveStatus(data);
                })
        });
    </script>
@endsection
@include('backend.v2.footer')
