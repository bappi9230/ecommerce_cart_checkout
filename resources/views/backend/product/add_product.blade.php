@extends('backend.dashboard')
@section('admin')
<div class="container-full">
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content" style="padding-top:0px;">

    <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form method="post" action="{{ route('store_product') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">

                        <div class="row">  <!--start 4th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name"class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('product_name')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Title<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title"  class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('title')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="price" class="form-control" required="" >
                                        <div class="help-block"></div>
                                        @error('price')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div>  <!--end 4th row-->

                        <div class="row">  <!--start 5th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('description')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Main Thumbnail Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="image" type="file" name="product_thumbnail" class="form-control" required="">
                                        <div class="help-block"></div>
                                        @error('product_thumbnail')
                                            <span class="text-danger"> {{$message}} </span>
                                        @enderror
                                        <img  class="row pl-3" src="" id="showImage">
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->



                
                        </div>  <!--end 5th row-->
                    </div><!--end col 12-->
                </div><!--end row-->

                <div class="float-right pt-3">
                    <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
                </div>
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>

@endsection