<form id="demoForm" action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="file" name="thumbnail" value="" class="form-control" id="imgInp">
        <img width="300px" id="blah" src="" alt="your image" />
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <select class="form-control" name="status">
                <option value="0">Hidden</option>
            <option value="1">Show</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Order By</label>
        <select class="form-control" name="order_by">

            <option value="0">Desc</option>
            <option value="1">Asc</option>
        </select>
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
