<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var myVeryOwnProductId = '{{product.id}}';
  console.log(myVeryOwnProductId);
  $(document).ready(function () {
    let route = 'http://dth999.ngrok.io/ajax-product';
    //alert(myVeryOwnProductId);
    $.ajax({
      type: 'GET',
      url: '//dth999.ngrok.io/ajax-product',
      data: { id: myVeryOwnProductId}
    })
    .done(function (data) {
      $('#ndnapps-nav-wrapper').html(data.html);
    })



        });
</script>