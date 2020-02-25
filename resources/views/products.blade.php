@extends('layout/layout')
@section('title','Products')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

                    <div class="box-header">

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="mgs"></div>
                                    @if (session('success'))
                                        <div class="alert alert-success" id="mgs">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-2">
                                    <a type="button" href="{{url('product/add')}}" class="btn btn-block btn-primary">Add Product</a>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-6">
                                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="example1"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productdetails as $productdetail)
                                        <tr>
                                            <td>{{$productdetail->name}}</td>
                                            <td>{{$productdetail->productname}}</td>
                                            <td>
                                                <a href="{{url('product/edit',['id'=>$productdetail->productid])}}"><i class="fa fa-edit"></i></a>
                                                <a style="cursor: pointer" class="delete" id="{{$productdetail->productid}}"><i class="fa fa-trash "></i></a>
                                                <a href="{{url('product/detail',['id'=>$productdetail->productid])}}"><i class="fa fa-th-large"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="example1_previous"><a
                                                        href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                            </li>
                                            <li class="paginate_button active"><a href="#" aria-controls="example1"
                                                                                  data-dt-idx="1" tabindex="0">1</a>
                                            </li>
                                            <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                            data-dt-idx="2" tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                            data-dt-idx="3" tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                            data-dt-idx="4" tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                            data-dt-idx="5" tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                            data-dt-idx="6" tabindex="0">6</a></li>
                                            <li class="paginate_button next" id="example1_next"><a href="#"
                                                                                                   aria-controls="example1"
                                                                                                   data-dt-idx="7"
                                                                                                   tabindex="0">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection



@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click','.delete',function () {
            var id = $(this).attr('id');
            if(confirm("Are You Sure You want to delete this Product?")){
                $.ajax({
                    url:"{{url('product/delete')}}",
                    type:'post',
                    data:{id:id,"_token": "{{ csrf_token() }}"},
                    success:function () {
                        //alert("success");
                        $("#example1").load(location.href+" #example1>*","");
                        $("#mgs").html("<div class='alert alert-success'>Successfully Deleted</div>");
                    }

                });
            }else{
                return false;
            }
        });
    });
</script>

@endsection
