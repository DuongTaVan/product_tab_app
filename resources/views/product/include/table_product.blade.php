<table id="example1" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Handle</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($products->edges as $product)
        <tr>
            <td><?php
                $id = explode("gid://shopify/Product/", $product->node->id);
                $id = array_pop($id);
                ?>{{$id}}</td>
            <td>{{$product->node->title}}</td>
            <td>{{$product->node->handle}}</td>
            @if(!empty($product->node->featuredImage->src))
                <td><img width="100px" height="100px"
                         src="{{$product->node->featuredImage->src}}" alt=""></td>
            @else
                <td>
                    <img width="100px" height="100px"
                         src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png"
                         alt="">
                </td>
            @endif
            <td>
                <a href="{{route('product.edit',$id)}}"
                   class="edit-modal btn btn-info btn-sm js-edit-item"
                   data-toggle="modal" data-target="#productModal">
                    <i
                            class="fa fa-edit"></i>
                </a>

                <a class=" delete delete-modal btn btn-danger btn-sm" href="#"
                   data-href="{{route('product.delete',$id)}}"
                   data-toggle="modal"
                   data-target="#confirm-delete"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Handle</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </tfoot>

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
            <a id="previous" href="{{$response['prev']}}" data-btn="prev" data-cursor="{{$product->cursor}}"  data-search="@if(isset($search)){{$search}}@else @endif">« Previous</a>
        @endif
        @if($response['has_next'] == true)
            <a id="next" href="{{$response['next']}}" data-btn="next" data-cursor="{{$product->cursor}}" data-search="@if(isset($search)){{$search}}@else @endif">Next »</a>
        @endif
    </div>
@endif