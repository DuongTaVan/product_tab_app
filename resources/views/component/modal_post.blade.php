<form id="demoForm" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" minlength="2" class="form-control" placeholder="name ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Summary</label>
        <textarea class="form-control" id="summary-ckeditor" name="summary" placeholder="summary ..."></textarea>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" id="summary-description" name="description"
                  placeholder="description ..."></textarea>
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
