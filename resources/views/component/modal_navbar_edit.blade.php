<form id="form" action="{{route('navbar.update',$navbar->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" placeholder="name ..." value="{{$navbar->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Content</label>
        <textarea id="content_ckeditor" type="text" name="content" class="form-control"
                  placeholder="content ...">{{$navbar->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product</label>
        <select class="locationMultiple form-control" multiple="multiple" name="product_ids[]">
            @foreach($products as $product)
                <option value="{{$product->id}}" {{ in_array($product->id, json_decode($navbar->product_id) ) ? "selected='selected'"  : '' }}>{{$product->title}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><span> <i class="fa fa-save"></i>Send</span></button>
</form>
<script>
    $('body').ready(function () {
        $('#form').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 30
                },
                content: {
                    required: true,
                    minlength: 5
                },
            }

        });
    });
</script>
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".locationMultiple").select2({
        width: null
    })
</script>
<script>
    CKEDITOR.replace('content_ckeditor');
</script>