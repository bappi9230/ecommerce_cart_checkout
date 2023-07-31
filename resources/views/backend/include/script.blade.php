<!-- Head js -->
<script src="{{ asset('backend/assets/js/head.js') }}"></script>

<!-- Vendor js -->
<script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

<!-- Dashboar 1 init js-->
<script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js') }}"></script>

<!-- App js-->
<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

<!-- Toaster Message -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
//     @if(Session::has('message'))
//     var type = "{{ Session::get('alert-type','info') }}"
//     switch(type){
//         case 'info':
//             toastr.info(" {{ Session::get('message') }} ");
//             break;

//         case 'success':
//             toastr.success(" {{ Session::get('message') }} ");
//             break;

//         case 'warning':
//             toastr.warning(" {{ Session::get('message') }} ");
//             break;

//         case 'error':
//             toastr.error(" {{ Session::get('message') }} ");
//             break;
//     }
//     @endif
// </script>



  <!-- toster.js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                }
            @endif
        </script>



<!-- Sweetalert--->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/sweet_alert.js') }}"></script>
<!-- End Sweetalert--->
