<form id="form" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" placeholder="name ...">
    </div>
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="file" name="image" class="form-control" id="imgInp">
        <img id="blah" src="#" alt="your image" />
    </div>
    <button type="submit" class="btn btn-primary"><span> <i class="fa fa-save"></i>Send</span></button>
</form>
<script>
    $('body').ready(function () {
        $('#form').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                image: {
                    required: true,
                    extension: "jpeg|png"
                },
            }

        });
    });
</script>