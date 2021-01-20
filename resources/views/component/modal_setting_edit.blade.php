<form id="demoForm" action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="file" name="thumbnail" value="{{$setting->thumbnail}}" class="form-control" id="imgInp">
        <img width="300px" id="blah" src="{{$setting->thumbnail}}" alt="your image"/>


    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <select class="form-control" name="status">
            <option @if($setting->status == 0) selected='selected' @endif value="0">Hidden</option>
            <option @if($setting->status == 1) selected='selected' @endif value="1">Show</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Order By</label>
        <select class="form-control" name="order_by">

            <option @if($setting->order_by == 0) selected='selected' @endif value="0">Desc</option>
            <option @if($setting->order_by == 1) selected='selected' @endif value="1">Asc</option>
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
