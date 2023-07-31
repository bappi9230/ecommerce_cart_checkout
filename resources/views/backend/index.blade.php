@extends('backend.dashboard')
@section('admin')
    <div class="container-full">
<section class="content pt-0">
<div class="row">


    <!-- all product view  -->
    <div class="col-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title pl-3">Order<span class="badge badge-pill badge-primary"  style="color: green;">{{ count($ship) }}</span></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Product Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($ship as $key=>$item)
                   <tr>
                        <td>{{ $key+=1 }}</td>
                        <td><img style="width:100px;height:50px;" src="{{ asset($item->Product->product_thumbnail) }}"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->division }}</td>
                        <td>
                            @if($item->status == "pending")
                            <span class="badge badge-pill" style="background-color:green;text-align:center;" >pending</span>
                            @else
                            <span class="badge badge-pill" style="background-color:red;text-align:center;">Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('change_status',$item->id)}}" class="btn btn-info sm" title="Edit" ><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger sm" title="Delete" id="delete" ><i class="fa fa-trash" ></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->


    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

@endsection
