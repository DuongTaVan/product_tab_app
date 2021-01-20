@include('backend.v2.header')
<style type="text/css">
	.see-screenshot{margin-bottom: 5px;padding:0 0 10px 20px;}
	.userguide img {width:auto;max-width: 100%;border:1px solid #ccc; border-radius: 10px; padding: 10px;}
</style>
<?php 
	$shop = ShopifyApp::shop();
	$disabled = '';
	$upgrade_modal = '';
	if($shop->isFreemium() OR $shop->plan_id ==1){
	$disabled = 'disabled';
	$upgrade_modal = 'upgrade-modal';
	}
?>
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
                            	<!--header-->
                            	<div class="card-header">User Guide
                                </div><!--end header-->
                                <!--body-->
                                <div class="card-body table-responsive">	
                                	<div class="row">
										<div class="col-md-12 userguide">
											<div class="panel-group" id="accordion">
											  <div class="panel panel-default">
											    <div class="panel-heading">
											      <h6 class="panel-title">
											        <a data-toggle="collapse" href="#collapse1">
											        How to create a store locator?</a>
											      </h6>
											    </div>
											    <div id="collapse1" class="panel-collapse collapse">
											      <div class="panel-body">
											      	<h6>1. Add new a store</h6>
											      	<p>1.1: Go to Apps > Store Locator > Manage Stores. Click the "Add new" button</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#v1-click-add-new" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="v1-click-add-new">
												  		<p><img src="{{ secure_asset('/images/userguide/1-click-add-new.png') }}"></p>
													</div>
											      	
											      	<p>1.2: Store info: Store name, Store Url Key, Thumb Image, Email, Street, City, State/Province, Zip/Postal code, Country, Phone, Web, Description</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#v2-add-form-store-info" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="v2-add-form-store-info">
												  		<p><img src="{{ secure_asset('/images/userguide/2-add-form-store-info.png') }}"></p>
													</div>

											      	<p>1.3 Store schedule: Open time and Close time for each store</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#v2-add-form-store-schedule" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="v2-add-form-store-schedule">
												  		<p><img src="{{ secure_asset('/images/userguide/2-add-form-store-schedule.png') }}"></p>
													</div>
											      	<!--
											      	<p>Store products: Choose product for the store</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#2-add-form-store-products" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="2-add-form-store-products">
												  		<p><img src="{{ secure_asset('/images/userguide/2-add-form-store-products.png') }}"></p>
													</div>-->
											      	
											      	<p>1.3: Click the "Add" button</p>
											      </div>
											    </div>
											  </div>
											  <div class="panel panel-default">
											    <div class="panel-heading">
											      <h6 class="panel-title">
											        <a data-toggle="collapse" href="#collapse2">
											        How to import a list of store locator?</a>
											      </h6>
											    </div>
											    <div id="collapse2" class="panel-collapse collapse">
											      <div class="panel-body">
											      	<div class="alert alert-warning">This feature is NOT available for the FREE plan.</div>
											      	<p>Go to Apps > Store Locator > <i class="fa fa-upload" aria-hidden="true">&nbsp;</i>Import/Export Stores > <i class="fa fa-upload" aria-hidden="true">&nbsp;</i>Bulk Import Stores</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#v3-import-stores" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="v3-import-stores">
												  		<p><img src="{{ secure_asset('/images/userguide/3-import-stores.png') }}"></p>
													</div>
											      </div>
											    </div>
											  </div>
											  <div class="panel panel-default">
											    <div class="panel-heading">
											      <h6 class="panel-title">
											        <a data-toggle="collapse" href="#collapse3">
											        	How to export store locators?
											        </a>
											      </h6>
											    </div>
											    <div id="collapse3" class="panel-collapse collapse">
											      <div class="panel-body">
											      	<div class="alert alert-warning">This feature is NOT available for the FREE plan.</div>
											      	<p>Go to Apps > Store Locator > <i class="fa fa-download" aria-hidden="true">&nbsp;</i>Import/Export Stores > <i class="fa fa-download" aria-hidden="true">&nbsp;</i>Export Stores</p>
											      	<div class="see-screenshot">
											      		<a class="btn btn-primary" data-toggle="collapse" href="#v3-export-stores" role="button" aria-expanded="false" aria-controls="collapseExample">
												    	See screenshot
												  		</a>
												  	</div>
												  	<div class="collapse" id="v3-export-stores">
												  		<p><img src="{{ secure_asset('/images/userguide/3-export-stores.png') }}"></p>
													</div>
											      </div>
											    </div>
											  </div>
											</div>
										</div>


                                	</div>
                                </div><!--end body-->
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
