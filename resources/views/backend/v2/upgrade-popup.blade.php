<?php $shop = ShopifyApp::shop(); 
$plan_name = 'FREE FOREVER';
if($shop->plan_id == 2)
	$plan_name = 'BASIC';
if($shop->plan_id == 3)
	$plan_name = 'PROFESIONAL';
?>
<div class="modal fade in" id="form-upgrade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Upgrade your plan</h4>
				<button class="close" type="button" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p style="text-align: center;">Sorry, your current plan is <strong class="text-danger">{{$plan_name}} PLAN</strong> and it is limited for this feature.<br/></p>
				@include('plan.content')
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Close
				</button>
			</div>
		</div>
	</div>
</div>