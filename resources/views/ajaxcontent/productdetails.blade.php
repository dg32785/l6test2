<tr class="product_count" id="product_count_{{$rowCount}}" row="{{$rowCount}}" >
    <td style="cursor: pointer;width: 50px;"><a class="btn btn-lg delete" id="delete_{{$rowCount}}" > <i class="fa fa-trash "></i></a></td>
    <td>
        <div class="form-group">
            <select class="form-control select2" id="product_{{$rowCount}}" style="width: 100%;">

                <option>Select</option>
                @foreach($products as $product)
                    <option value="{{$product->productid}}">{{$product->productname}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td><input type="text" class="form-control" id="item" name="item"></td>


    <td><input type="text" class="form-control" id="item" name="item"></td>
</tr>


