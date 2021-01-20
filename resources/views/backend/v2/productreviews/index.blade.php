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
										
                                    </div>
                                </div>
                            </div>
                            
                    	</div>
                	</div><!--end app-page-title-->
                	<div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Manage Reviews
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
									        <button class="add-modal btn btn-primary">
									        	<span><i class="fa fa-plus-circle"></i> BUTTON </span>
									       	</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                	
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
