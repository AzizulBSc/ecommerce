<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:09:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')-Admin/AZIZUL HOQUE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <!-- Start Global Mandatory Style
         =====================================================================-->
    <!-- jquery-ui css -->
    <link href="{{ asset('admin/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Data toggle css -->
    <link href="{{ asset('admin/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Data toggle css -->
    <!-- Bootstrap -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap rtl -->
    <link href="{{ asset('admin/bootstrap-rtl/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Lobipanel css -->
    <link href="{{ asset('admin/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="{{ asset('admin/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{ asset('admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Pe-icon -->
    <link href="{{ asset('admin/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
    <!-- Themify icons -->
    <link href="{{ asset('admin/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- End Global Mandatory Style====================================================-->
    <!-- Start page Label Plugins 
         =====================================================================-->
    <!-- Emojionearea -->
    <link href="{{ asset('admin/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Monthly css -->
    <link href="{{ asset('admin/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css" />
    <!-- End page Label Plugins 
         =====================================================================-->
    <!-- Start Theme Layout Style
         =====================================================================-->
    <!-- Theme style -->
    <link href="{{ asset('admin/dist/css/stylecrm.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <link href="{{ asset('admin/dist/css/stylecrm-rtl.css') }}" rel="stylesheet" type="text/css" />
    <!-- End Theme Layout Style
         =====================================================================-->
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap rtl -->
    <link href="{{ asset('admin/bootstrap-rtl/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Pe-icon-7-stroke -->
    <link href="{{ asset('admin/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
    <!-- style css -->
    <link href="{{ asset('admin/dist/css/stylecrm.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style rtl -->
    <link href="{{ asset('admin/dist/css/stylecrm-rtl.css') }}" rel="stylesheet" type="text/css" />


    <!--update css-->
    {{--
    <link href="{{ asset('admin/dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{--
    <link href="{{ asset('admin/dist/css/font-awesome.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('admin/dist/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    {{--
    <link href="{{ asset('admin/dist/css/style.css') }}" rel="stylesheet"> --}}

    <!--update csss-->
</head>

<body class="hold-transition sidebar-mini">
    <!--preloader-->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @yield('content')
        @include('admin.layouts.footer')
    </div>

    <!-- /.wrapper -->
    <!-- Start Core Plugins
         =====================================================================-->
    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jQuery/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <!-- jquery-ui -->
    <script src="{{ asset('admin/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- lobipanel -->
    <script src="{{ asset('admin/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
    <!-- Pace js -->
    <script src="{{ asset('admin/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"> </script>
    <!-- FastClick -->
    <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <!-- CRMadmin frame -->
    <script src="{{ asset('admin/dist/js/custom.js') }}" type="text/javascript"></script>
    <!-- End Core Plugins
         =====================================================================-->
    <!-- Start Page Lavel Plugins
         =====================================================================-->
    <!-- ChartJs JavaScript -->
    <script src="{{ asset('admin/plugins/chartJs/Chart.min.js') }}" type="text/javascript"></script>
    <!-- Counter js -->
    <script src="{{ asset('admin/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <!-- Monthly js -->
    <script src="{{ asset('admin/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
    <!-- End Page Lavel Plugins
         =====================================================================-->
    <!-- Start Theme label Script
         =====================================================================-->
    <!-- Dashboard js -->
    <script src="{{ asset('admin/dist/js/dashboard.js') }}" type="text/javascript"></script>

    <!--update js-->

    {{-- <script type="text/javascript"
        src="{{ asset('admin/dist/js/jquery-3.3.1 .js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/dist/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/dist/js/script.js') }}"></script>

    <!--update js-->
    <!--data Toggle js-->
    <script type="text/javascript" src="{{ asset('admin/plugins/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    <!--enddata Toggle js-->
    <!-- End Theme label Script
         =====================================================================-->
  {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}} --}}
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  } );
  </script>
    <<script>
        $(document).ready( function () {
        $('#table_id').DataTable({
              "paging":false,
        
        });
        $(this).closest('td').attr('id');

        //Update Customer Status
        $(".CustomerStatus").change(function(){
           var id = $(this).attr('rel');
           if($(this).prop("checked")==true){
              $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type : 'post',
                 url : '/admin/update-customer-status',
                 data : {status:'1',id:id},
                 success:function(data){
                    $("#message_success").show();
                    setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                 },error:function(){
                    alert("Error");
                 }
              });
 
           }else{
             $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type : 'post',
                 url : '/admin/update-customer-status',
                 data : {status:'0',id:id},
                 success:function(resp){
                    $("#message_error").show();
                    setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                 },error:function(){
                    alert("Error");
                 }
              });
           }
          });
        
        //Update Product Status
        $(".ProductStatus").change(function(){
         var id = $(this).attr('rel');
         if($(this).prop("checked")==true){
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-product-status',
               data : {status:'1',id:id},
               success:function(data){
                  $("#message_success").show();
                  setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });

         }else{
           $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-product-status',
               data : {status:'0',id:id},
               success:function(data){
                  $("#message_error").show();
                  setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });
         }
        });
        
        //Update Coupons Status
        $(".CouponStatus").change(function(){
           var id = $(this).attr('rel');
           if($(this).prop("checked")==true){
              $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type : 'post',
                 url : '/admin/update-coupon-status',
                 data : {status:'1',id:id},
                 success:function(data){
                    $("#message_success").show();
                    setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                 },error:function(){
                    alert("Error");
                 }
              });
 
           }else{
             $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type : 'post',
                 url : '/admin/update-coupon-status',
                 data : {status:'0',id:id},
                 success:function(resp){
                    $("#message_error").show();
                    setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                 },error:function(){
                    alert("Error");
                 }
              });
           }
          });
        //Update Product featured Status
        $(".featuredProducts").change(function(){
         var id = $(this).attr('rel');
         if($(this).prop("checked")==true){
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-featured-product-status',
               data : {status:'1',id:id},
               success:function(data){
                  $("#message_success").show();
                  setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });

         }else{
           $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-featured-product-status',
               data : {status:'0',id:id},
               success:function(resp){
                  $("#message_error").show();
                  setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });
         }
        });
          //Update Category Status
        $(".CategoryStatus").change(function(){
           
         var id = $(this).attr('rel');
         if($(this).prop("checked")==true){
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-category-status',
               data : {status:'1',id:id},
               success:function(data){
                  $("#message_success").show();
                  setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });

         }else{
           $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-category-status',
               data : {status:'0',id:id},
               success:function(resp){
                  $("#message_error").show();
                  setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });
         }
         
        });
           //Update Banner Status
           $(".BannerStatus").change(function(){
         var id = $(this).attr('rel');
         if($(this).prop("checked")==true){
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-banner-status',
               data : {status:'1',id:id},
               success:function(data){
                  $("#message_success").show();
                  setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });

         }else{
           $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type : 'post',
               url : '/admin/update-banner-status',
               data : {status:'0',id:id},
               success:function(resp){
                  $("#message_error").show();
                  setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
               },error:function(){
                  alert("Error");
               }
            });
         }
        });

        //Add Remove Fields Dynamically
        $(document).ready(function(){
   var maxField = 10; //Input fields increment limitation
   var addButton = $('.add_button'); //Add button selector
   var wrapper = $('.field_wrapper'); //Input field wrapper
   var fieldHTML = '<div style="display:flex;"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="size[]" id="size" placeholder="Size" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="price[]" id="price" placeholder="Price" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><a href="javascript:void(0);" class="remove_button btn btn-danger" style="width:120px;margin-right:5px;margin-top:5px;">X</a></div>'; //New input field html 
   var x = 1; //Initial field counter is 1
   
   //Once add button is clicked
   $(addButton).click(function(){
       //Check maximum number of input fields
       if(x < maxField){ 
           x++; //Increment field counter
           $(wrapper).append(fieldHTML); //Add field html
       }
   });
   
   //Once remove button is clicked
   $(wrapper).on('click', '.remove_button', function(e){
       e.preventDefault();
       $(this).parent('div').remove(); //Remove field html
       x--; //Decrement field counter
   });
});
     });
        </script>
     <script>
        function dash() {
        // single bar chart
        var ctx = document.getElementById("singelBarChart");
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
        datasets: [
        {
        label: "My First dataset",
        data: [40, 55, 75, 81, 56, 55, 40],
        borderColor: "rgba(0, 150, 136, 0.8)",
        width: "1",
        borderWidth: "0",
        backgroundColor: "rgba(0, 150, 136, 0.8)"
        }
        ]
        },
        options: {
        scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
        }
        }
        });
              //monthly calender
              $('#m_calendar').monthly({
                mode: 'event',
                //jsonUrl: 'events.json',
                //dataType: 'json'
                xmlUrl: 'events.xml'
            });
        
        //bar chart
        var ctx = document.getElementById("barChart");
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
        datasets: [
        {
        label: "My First dataset",
        data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
        borderColor: "rgba(0, 150, 136, 0.8)",
        width: "1",
        borderWidth: "0",
        backgroundColor: "rgba(0, 150, 136, 0.8)"
        },
        {
        label: "My Second dataset",
        data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
        borderColor: "rgba(51, 51, 51, 0.55)",
        width: "1",
        borderWidth: "0",
        backgroundColor: "rgba(51, 51, 51, 0.55)"
        }
        ]
        },
        options: {
        scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
        }
        }
        });
            //counter
            $('.count-number').counterUp({
                delay: 10,
                time: 5000
            });
        }
        dash();         
     </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js"></script>
     @include('sweetalert::alert')
</body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->

</html>
