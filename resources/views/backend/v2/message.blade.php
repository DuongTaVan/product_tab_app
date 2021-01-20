<!--Messsage-->

@if (Session::has('message'))
	<div id="toast-container" class="toast-bottom-center"><div class="toast toast-success" aria-live="polite"><div class="toast-message">{!! Session('message') !!}</div></div></div>
	<script type="text/javascript">
		$( document ).ready(function() {
			setTimeout(function(){
				$(".ndn-message").html('');
			}, 3000);
		});
	</script>
@endif

@if (Session::has('warning'))
	<div id="toast-container" class="toast-bottom-center"><div class="toast toast-error" aria-live="polite"><div class="toast-message">{!! Session('warning') !!}</div></div></div>
	<script type="text/javascript">
		$( document ).ready(function() {
			setTimeout(function(){
				$(".ndn-message").html('');
			}, 3000);
		});
	</script>
@endif
@if (Session::has('success'))
	<div id="toast-container" class="toast-bottom-center"><div class="toast toast-success" aria-live="polite"><div class="toast-message">{!! Session('success') !!}</div></div></div>
	<script type="text/javascript">
		$( document ).ready(function() {
			setTimeout(function(){
				$(".ndn-message").html('');
			}, 3000);
		});
	</script>
@endif
@if ($errors->any())
	<div id="toast-container" class="toast-bottom-center"><div class="toast toast-error" aria-live="polite">

        @foreach ($errors->all() as $error)
        	<div class="toast-message">{{ $error }}</div>
        @endforeach

    </div></div>
    <script type="text/javascript">
		$( document ).ready(function() {
			setTimeout(function(){
				$(".ndn-message").html('');
			}, 3000);
		});
	</script>
@endif

<!--Messsage-->