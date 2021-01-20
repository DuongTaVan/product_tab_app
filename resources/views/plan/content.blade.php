	<?php $shop = ShopifyApp::shop() ?>
	<!--<header class="cd-header">
		<h1 class="text-info">Pricing Plan</h1>
	</header>
	<link rel="stylesheet" href="{{ secure_asset('/public/plan/css/reset.css') }}">-->
	<link rel="stylesheet" href="{{ secure_asset('/public/plan/css/style.css') }}">
	<div class="cd-pricing-container cd-has-margins">
		
		<ul class="cd-pricing-list cd-bounce-invert">
			<li>
				<ul class="cd-pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="cd-pricing-header">
							<h2>FREE</h2><b style="color: red; font-size: 18px;">(Free forever)</b>

							<div class="cd-price">
								<span class="cd-currency">$</span>
								<span class="cd-value">0</span>
								<span class="cd-duration">month</span>
							</div>
						</header> <!-- .cd-pricing-header -->

						<div class="cd-pricing-body">
							<ul class="cd-pricing-features">
								<li><i class="fa fa-check text-success pull-left float-left"></i>For shops which have only 1 store</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>4 layouts</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Find store by products, location, distance</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Google Map integration</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Translations</li>
								<li><i class="fa fa-times text-danger"></i></li>
								<li><i class="fa fa-times text-danger"></i></li>
								<li><i class="fa fa-times text-danger"></i></li>
								<li><i class="fa fa-times text-danger"></i></li>
								<li><i class="fa fa-times text-danger"></i></li>
							</ul>
						</div> <!-- .cd-pricing-body -->

						<footer class="cd-pricing-footer">
							@if($shop->plan_id == 1 || $shop->isFreemium())
							<a class="cd-select" href="javascript:void(0);">Current Plan</a>
							@else
							<a class="cd-select" href="{{ route('billing', ['plan_id' => 1]) }}">
								@if($shop->plan_id == 2 || $shop->plan_id == 3)
									Downgrade now
								@endif
							</a>
							@endif
						</footer>  <!-- .cd-pricing-footer -->
					</li>
				</ul>
			</li> 
			<!-- 1 -->
			<li class="cd-popular">
				<ul class="cd-pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="cd-pricing-header">
							<h2>BASIC PLAN</h2><b style="color: red;font-size: 18px;">(3-day free trial)</b>
							<div class="cd-price">
								<span class="cd-currency">$</span>
								<span class="cd-value">9.99</span>
								<span class="cd-duration">mo</span>
							</div>
						</header> <!-- .cd-pricing-header -->

						<div class="cd-pricing-body">
							<ul class="cd-pricing-features">
								<li><i class="fa fa-check text-success pull-left float-left"></i>For shops which have 2 - 100 stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>4 layouts</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Find store by products, location, distance</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Google Map integration</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Translations</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Bulk import stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Export stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Custom CSS</li>
								<li><i class="fa fa-times text-danger"></i></li>
								<li><i class="fa fa-times text-danger"></i></li>
							</ul>
						</div> <!-- .cd-pricing-body -->

						<footer class="cd-pricing-footer">
							@if($shop->plan_id == 2)
							<a class="cd-select" href="javascript:void(0);">Current Plan</a>
							@else
							<a class="cd-select" href="{{ route('billing', ['plan_id' => 2]) }}">
								@if($shop->plan_id == 1 || $shop->isFreemium())
									Upgrade now
								@endif
								@if($shop->plan_id == 3)
									Downgrade now
								@endif
							</a>
							@endif
						</footer>  <!-- .cd-pricing-footer -->
					</li>

				</ul> 
			</li>
			<!-- 2 -->
			<li class="cd-popular">
				<ul class="cd-pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="cd-pricing-header">
							<h2>PRO PLAN</h2><b style="color: red;font-size: 18px;">(3-day free trial)</b>
							<div class="cd-price">
								<span class="cd-currency">$</span>
								<span class="cd-value">16.99</span>
								<span class="cd-duration">mo</span>
							</div>
						</header> <!-- .cd-pricing-header -->

						<div class="cd-pricing-body">
							<ul class="cd-pricing-features">
								<li><i class="fa fa-check text-success pull-left float-left"></i>Unlimited stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>4 layouts</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Find store by products, location, distance</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Google Map integration</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Translations</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Bulk import stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Export stores</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Custom CSS</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Contact store owner via a quick contact form</li>
								<li><i class="fa fa-check text-success pull-left float-left"></i>Google reCaptcha v3 integration</li>
							</ul>
						</div> <!-- .cd-pricing-body -->

						<footer class="cd-pricing-footer">
							@if($shop->plan_id == 3)
							<a class="cd-select" href="javascript:void(0);">Current Plan</a>
							@else
							<a class="cd-select" href="{{ route('billing', ['plan_id' => 3]) }}">
								@if($shop->plan_id == 1 || $shop->plan_id == 2 || $shop->isFreemium())
									Upgrade now
								@endif
							</a>
							@endif
						</footer>  <!-- .cd-pricing-footer -->
					</li>

				</ul> 
			</li>
			<!-- 3 -->
			

		</ul> <!-- .cd-pricing-list -->
		<span class="price-vat text-info">Prices in USD, VAT included.</span>
	</div> <!-- .cd-pricing-container -->	