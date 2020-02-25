<?php
if (isset($type)) {
    $action = "Edit";
    $routeurl = "edititem";
} else {
    $action = "Add";
    $routeurl = "additem";
};
?>
@extends('layout/layout')
@section('title',$action.' Item')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$action}} Item
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$action}} Item</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{$action}} Item</h3>
                        </div>

                        <!-- /.box-header -->

                        <!-- form start -->
                        <form role="form" action="{{url($routeurl)}}" method="post">
                            @csrf
                            @isset($type))
                            <input type="hidden" name="itemid" value="{{$itemdetails->itemid}}">
                            @endisset
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Category</label>
                                            <select name="category" class="form-control">
                                                @foreach($item_categories as $item_category)
                                                    <option <?php if (isset($itemdetails)) {
                                                        if ($itemdetails->category == 1) echo "selected";
                                                    } ?> value="{{$item_category->item_categoryid}}">{{$item_category->item_category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="item">Item</label>
                                            <input type="text" class="form-control"
                                                   value="<?php if (isset($itemdetails)) {
                                                       echo $itemdetails->itemname;
                                                   } ?>" id="item" name="item" placeholder="Item Name">
                                            @error('item')
                                            <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr style="border-top: 1px dotted darkslategray">
                                <h3 class="box-title">Add Detail Item</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="product_details">
                                            <tr class="row_head" row="0">
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Company</th>
                                                <th>Quantity</th>
                                            </tr>


                                        </table>
                                        <div class="box-footer">
                                            <a id="additem" class="btn btn-info">Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" style="float: right" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box -->


                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click','#additem',function () {
                var id = $(this).attr('id');
                //var rowCount = $('#product_details tr').length;
                var rowCount = parseInt($('#product_details tr:last').attr('row'))+parseInt(1);
                $.ajax({
                    url:"{{url('item/productadd')}}",
                    type:'post',
                    data:{rowCount:rowCount,"_token": "{{ csrf_token() }}"},
                    success:function (data) {
                        $('#product_details tr:last').after(data);

                        $("#product_"+rowCount).select2({
                            allowClear: false,
                            height: "100px"
                        });
                    }
                });

            });

            $(document).on('click','.delete',function () {
                if(confirm("Are You Sure You want to delete?")) {
                    $(this).parent().parent().remove();

                }
            });
        });
    </script>

@endsection
