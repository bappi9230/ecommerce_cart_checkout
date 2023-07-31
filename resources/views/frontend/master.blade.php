<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.include.css')
</head>
<body class="cnt-home" style="background-color: #ADD8E6;" >

@include('frontend.body.header')


@yield('content')

@include('frontend.include.script')

<!--=========================CART Modal View================================= -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 15rem;">
                            <img src=" " class="card-img-top" alt="no image" style="height: 150px; width: 100px;" id="pimage">
                        </div>
                    </div><!-- end col 4 -->
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Product Price: <strong class="text-success"><span id="price"></span></strong></li>
                        </ul>
                    </div><!-- end col 4 -->

                    <div class="col-md-4" id="colorArea">
                        <div class="form-group">
                            <label for="qty">Product Quantity</label>
                              <input type="number" id="qty" value="1" min="1">
                        </div>
                    </div><!-- end col 4 -->
                </div><!-- end row -->
            </div>
            <input type="hidden" id="product_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addToCart()" >Add To Cart</button>
            </div>
        </div>
    </div>
</div>


<!--===========================END CART Modal View============================== -->


<script type="text/javascript">

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })


    // <!--========================Start Product View with Modal ================================== -->

    function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                $('#pname').text(data.product.product_name);
                $('#price').text(data.product.price);
                $('#pimage').attr('src','/'+data.product.product_thumbnail);
                $('#product_id').val(id);
                $('#qty').val(1);

            }
        })
    }

// <!--===========================END CART Modal View============================== -->



//<!--===========================ADD TO CART============================== -->

    function addToCart(){

        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var price = $('#price').text()
        var quantity = $('#qty').val();
        $.ajax({
            type: "post",
            dataType: 'json',
            data:{
                product_name, quantity, price
            },
            url:'/cart/data/store/'+id,
            success:function(data){

                addMiniCart();
                $('#closeModal').click();
                console.log(data);

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }// End Message
            }
        })
    }

//<!--===========================END ADD TO CART============================== -->
</script>

<!--===========================ADD Mini CART============================== -->
    <script type="text/javascript">
        function addMiniCart(){
            $.ajax({
                type:'GET',
                url:'/product/mini/cart',
                dataType:'json',
                success:function (response) {
                    console.log(response);

                    $('span[id="cartTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = "";
                    $.each(response.carts, function(key,value){

                        miniCart += `
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                       <div class="image"> <a href="detail.html">
                          <img src="/${value.options.image}" alt=""></a>
                       </div>
                    </div>
                    <div class="col-xs-7">
                      <p class="name"><a href="index.php?page-detail">${value.name}</a></p>
                      <div class="price"><span>$</span>${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit"  style="margin-left: 10px; outline: none !important;" id="${ value.rowId}" onclick="miniCartRemove(this.id)" ><i class="fa fa-trash" ></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                    });
                    $('#miniCart').html(miniCart);

                }
            })
       }
        addMiniCart();
         //Remove mini cart
        function miniCartRemove(rowId){
            $.ajax({
                type:'GET',
                url:'/minicart/product-remove/'+rowId,
                dataType:'json',
                success:function (data){
                    addMiniCart();
                    console.log(data);

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }// End Message
                }

            })
        }
    </script>

</body>
</html>
