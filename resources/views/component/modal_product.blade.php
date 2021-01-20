<form id="demoForm" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">title</label>
        <input type="text" name="title" minlength="2" class="form-control" placeholder="title ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">body_html</label>
        <input type="text" name="body_html" minlength="2" class="form-control" placeholder="body_html ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">vendor</label>
        <input type="text" name="vendor" minlength="2" class="form-control" placeholder="vendor ...">
    </div><div class="form-group">
        <label for="exampleInputEmail1">product_type</label>
        <input type="text" name="product_type" minlength="2" class="form-control" placeholder="product_type ...">
    </div><div class="form-group">
        <label for="exampleInputEmail1">published</label>
        <input type="text" name="published" minlength="2" class="form-control" placeholder="published ...">
    </div>
    <button type="submit" class="btn btn-primary sm">Send</button>
</form>
<script>
    $('body').ready(function () {
        $('#demoForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                summary: {
                    required: true,
                    minlength: 5
                },
                description: {
                    required: true,
                    minlength: 5
                }
            }

        });
    });
</script>
