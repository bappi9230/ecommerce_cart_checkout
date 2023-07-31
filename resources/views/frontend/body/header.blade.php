<nav class="navbar navbar-light" style="background-color: #5aa1e8;">
  <a class="navbar-brand pl-5" style="color: white;" href="{{url('/')}}">Home</a>
   <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row ">

    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row ">
          <!-- ======================== SHOPPING CART DROPDOWN ================================ -->

        <div class="btn-group">
  <button type="button" class="btn btn-secondary btn-lg dropdown-toggle"  style="width: 200px; background-color: #5aa1e8;outline-color:#5aa1e8
 !important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <span>Cart</span>
     <span class="badge badge-pill">
        <span class="value" id="cartQty"></span>
     </span>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <li>
        <div id="miniCart" style="margin-left:50px;width:250px"></div>
      <div class="clearfix cart-total">
        <div class="pull-right">
            <span class="total-price" style="margin-left: 30px;">
                <span class="text">Sub Total</span>
                <span class="sign">price :</span>
                <span class='price' id="cartTotal"></span>
            </span>
        </div>
        <div class="clearfix"></div>
        <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
      <!-- /.cart-total-->

    </li>
  </div>
</div>

          <!-- ================================ SHOPPING CART DROPDOWN : END========================= -->

        </div>

</nav>