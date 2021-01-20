<label>Product</label>
<table class="table">
    <thead>
    <tr>
        <th scope="col">
            <div class="form-check">
                <input class="form-check-input position-static check-all"
                       type="checkbox">
            </div>
        </th>
        <th scope="col">Title</th>
        <th scope="col">Handle</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products->edges as $product)
        <?php
        $id = explode("gid://shopify/Product/", $product->node->id);
        $id = array_pop($id);
        ?>
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input name="product_ids[]" class="form-check-input position-static check-item"
                           type="checkbox" id="blankCheckbox-{{$id}}" value="{{$id}}"
                           aria-label="..." @if(isset($navbar))  {{ in_array($id, json_decode($navbar->product_id) ) ? "checked='checked'"  : '' }} @endif>
                </div>
            </th>
            <td><label for="blankCheckbox-{{$id}}">{{$product->node->title}}</label></td>
            <td><label for="blankCheckbox-{{$id}}">{{$product->node->handle}}</label></td>
            @if(!empty($product->node->featuredImage->src))
                <td><label for="blankCheckbox-{{$id}}"><img width="100px" height="100px"
                                                    src="{{$product->node->featuredImage->src}}" alt=""></label></td>
            @else
                <td><label for="blankCheckbox-{{$id}}"><img width="100px" height="100px"
                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png"
                                                    alt=""></label>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<style>
    .paginate {
        height: 30px;
    }

    .paginate a {
        height: 20px;
        color: #111;
        margin-right: 20px;
        background-color: #e0ef01;
        line-height: 30px;
        padding: 5px;
        border-radius: 3px;
    }
</style>
@if(isset($response))
    <div class="paginate">
        @if($response['has_prev'] == true)
            <a id="previous" href="{{$response['prev']}}" data-btn="prev" data-cursor="{{$product->cursor}}"
               @if(isset($nb_id))data-id=" {{$nb_id}}" @endif>«
                Previous</a>
        @endif
        @if($response['has_next'] == true)
            <a id="next" href="{{$response['next']}}" data-btn="next" data-cursor="{{$product->cursor}}"
               @if(isset($nb_id))data-id=" {{$nb_id}}" @endif>Next »</a>
        @endif
    </div>
@endif
