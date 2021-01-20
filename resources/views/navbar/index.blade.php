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
                            <div class="card-header">Manage Tabs
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">

{{--                                        <a class="btn btn-primary js-add-item" data-toggle="modal"--}}
{{--                                           data-target="#navbarModal">--}}
{{--                                            <span><i class="fa fa-plus-circle"></i> Add navbar </span>--}}
{{--                                        </a>--}}
                                        <a class="btn btn-primary" href="{{route('create.navbar')}}">
                                            <span><i class="fa fa-plus-circle"></i> Add navbar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>0rder</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($navbars as $navbar)
                                        <tr>
                                            <td>{{$navbar->id}}</td>
                                            <td>{{$navbar->name}}</td>
                                            <td><i class="{{$navbar->icon}}"></i></td>
                                            <td>{{$navbar->content}}</td>
                                            <td style="text-align: center"><a href="{{route('show.navbar',$navbar->id)}}">@if($navbar->status == 0)<i class="fa fa-eye" aria-hidden="true"></i>
                                                @else <i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                @endif</td>
                                            <td>{{$navbar->n_order}}</td>
                                            <td>{{$navbar->updated_at}}</td>
                                            <td>
{{--                                                <a href="{{route('navbar.ajax_edit_modal',$navbar->id)}}"--}}
{{--                                                   class="btn btn-info btn-sm js-edit-item" data-toggle="modal"--}}
{{--                                                   data-target="#navbarModal">--}}
{{--                                                    <i class="fa fa-edit"></i>--}}
{{--                                                </a>--}}
                                                <a href="{{route('edit.navbar',$navbar->id)}}"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class=" delete delete-modal btn btn-danger btn-sm" href="#"
                                                   data-href="{{route('navbar.delete',$navbar->id)}}" data-toggle="modal"
                                                   data-target="#confirm-delete-navbar"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>0rder</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.v2.other-apps')
            </div>
            @include('backend.v2.layouts.footer-wrapper')
        </div>
    </div>
    <div class="modal fade" id="confirm-delete-navbar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
<div class="modal fade" id="navbarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $('#confirm-delete-navbar').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    $(function () {
        $('.js-add-item').click(function () {
            let route = '{{route('navbar.ajax_modal')}}';
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    //console.log(data.html);
                    $('#navbarModal .modal-body').html(data.html);
                });
        });
        $('.js-edit-item').click(function () {
            let route = $(this).attr('href');
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    //console.log(data.html);
                    $('#navbarModal .modal-body').html(data.html);
                });
        });
    });
</script>

@include('backend.v2.footer')
