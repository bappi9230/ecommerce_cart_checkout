<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->

        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{ route('admin') }}" >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <!--========= Start employee manage ==================-->


                <li>
                    <a href="#product" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Product</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all_product') }}">All Product</a>
                            </li>
                            <li>
                                <a href="{{ route('add_product') }}">Add Product</a>
                            </li>
                        
                        </ul>
                    </div>
                </li>
             
                <!--========= end employee manage ==================-->


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
