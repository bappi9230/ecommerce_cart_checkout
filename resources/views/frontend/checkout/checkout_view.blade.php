@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <form class="register-form" role="form" method="post" action="{{ route('checkout.store') }}">
                    @csrf

                <div class="row">

                    <div class="col-md-7">
                        <h4 class="checkout-subtitle"><b> Shipping Address </b></h4>
                            <div class="col-md-6 pt-3">

                                <div class="form-group">
                                    <h5>Customer Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                                                        <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Customer Phone<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control" required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                                                        <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="email" class="form-control" required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                                                        <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Division<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="division" class="form-control" required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                                                        <div class="col-md-6">
                                <div class="form-group">
                                    <h5>District<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district" class="form-control" required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Description</h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                    </div>

                    <div class="col-md-5">

                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="list-group">
                                             @foreach($carts as $item)
                                            <li class="list-group-item"><h4> <strong>Name:</strong> <span>{{ $item->name }}</span> </h4> </li>
                                            <li class="list-group-item"><strong>image:</strong> <img style="width: 150px;height: 120px" src="{{asset($item->image)}}"></li>
                                            <li class="list-group-item"><strong>Price:</strong> <span>{{ $item->price }}</span></li>
                                            <li class="list-group-item"><strong>Quantity:</strong> <span>{{ $item->qty }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                        <div class="text-xs-right pt-5">
                                            <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
