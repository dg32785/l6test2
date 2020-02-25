
<?php
if(isset($type)){
    $action = "Edit";
    $routeurl = "editproduct";
}else{
    $action = "Add";
    $routeurl = "addproduct";
};
?>
@extends('layout/layout')
@section('title',$action.' Product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$action}} Product
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$action}} Product</li>

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
                            <h3 class="box-title">{{$action}} Product</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="row">
                            <div class="col-md-7 center">
                        <!-- form start -->
                        <form role="form" action="{{url($routeurl)}}" method="post">
                            @csrf
                            @isset($type))
                            <input type="hidden" name="productid" value="{{$productdetails->productid}}">
                            @endisset
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option <?php if(isset($productdetails)){if($productdetails->category==1) echo "selected"  ;} ?> value="1">Grossary</option>
                                        <option <?php if(isset($productdetails)){if($productdetails->category==2) echo "selected"  ;} ?> value="2">Vegitables</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <input type="text" class="form-control" value="<?php if(isset($productdetails)){echo $productdetails->productname ;} ?>" id="product" name="product" placeholder="Product Name">
                                    @error('product')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                            </div>
                        </div>
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