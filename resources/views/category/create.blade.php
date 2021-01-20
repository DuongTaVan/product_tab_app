@include('backend.v2.header')
<?php $shop = ShopifyApp::shop(); ?>
@include('backend.v2.preloader')

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    @include('backend.v2.layouts.app-header')
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')
        <div class="app-main__outer">
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
                                    {!!showErrors($errors,'name')!!}
                                    {!!showErrors($errors,'summary')!!}
                                    {!!showErrors($errors,'description')!!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--end app-page-title-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Post Item
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <a href="{{route('category.index')}}" class="add-modal btn btn-primary">
                                            <span><i class="fa fa-share"></i> Close </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive">
                                <form method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thumbnail</label>
                                        <input type="file" name="image" class="form-control" id="imgInp">
                                        <img id="blah" src="#" alt="your image" />
                                    </div>
                                    <button type="submit" class="btn btn-primary"><span> <i class="fa fa-save"></i>Send</span></button>
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

@include('backend.v2.footer')
