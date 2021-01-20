<form id="setting-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <label class="switch checkbox" data-toggle="tooltip" data-placement="right"
                   title="" data-original-title="Click to Enable/Disable">
                <input class="form-control" type="checkbox" id="status" name="status"
                       @if($setting->status == 1)checked="checked"@endif>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Type</label>
        <div class="col-sm-9">
            <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option value="0">vertical</option>
                <option value="1">horizontal</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Font Size</label>
        <div class="col-sm-9">
            <input class="form-control" min="1" type="number" name="font_site"
                   value="{{$setting->font_site}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Max Column</label>
        <div class="col-sm-9">
            <input class="form-control" type="number" min="1" max="5" name="max_column"
                   value="{{$setting->max_column}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Max height</label>
        <div class="col-sm-9">
            <input class="form-control" type="number" min="1" name="height"
                   value="{{$setting->height}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Background</label>
        <div class="col-sm-9">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-control" type="color" class="form-check-input"
                           name="background" value="{{$setting->background}}">
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Color</label>
        <div class="col-sm-9">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-control" type="color" class="form-check-input"
                           name="color" value="{{$setting->color}}">
                </label>
            </div>
        </div>
    </div>
    <div role="group" class="btn-group-sm btn-group">
        <a onclick="update()" class="btn btn-primary js-add-js-setting" type="submit"><span><i
                        class="fa fa-plus-circle"></i> Save Settings </span></a>
    </div>
</form>