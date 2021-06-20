
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>AzizulHoque- Ecommerce</title>
    {{-- Bootstrap 4 --}}
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('frontend/images/apple-touch-icon.png')}}">
  
    <link rel="stylesheet" href ="{{asset('frontend/css/all.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    
      <!-- Font Awesome -->
      <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

      @include('wayshop.layouts.header')
      @yield('content')
      @include('wayshop.layouts.footer')



    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('frontend/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('frontend/js/inewsticker.js')}}"></script>
    <script src="{{asset('frontend/js/bootsnav.js.')}}"></script>
    <script src="{{asset('frontend/js/images-loded.min.js')}}"></script>
    <script src="{{asset('frontend/js/isotope.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('frontend/js/contact-form-script.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script> 
    <script>
      $(document).ready(function(){
        $("#selSize").change(function(){
      // alert("test");
    
         var idSize = $(this).val();
         if(idSize==""){
             return false;
         }
         $.ajax({
             type : 'get',
             url : '/get-product-price',
             data : {idSize:idSize},
             success:function(resp){
                  //alert(resp);
              var arr= resp.split('#');
              $("#getPrice").html("Product Price : PKR "+arr[0]);
               //$('#price').val(arr[0]);
             },error:function(){
                 alert("Price Error");
             }
         });
       });
      // $("#billtoship").click(function(){
      //   if(this.checked){
      //     $("#shipping_name").val($("#billing_name").val());
      //     $("#shipping_address").val($("#billing_address").val());
      //     $("#shipping_city").val($("#billing_city").val());
      //     $("#shipping_state").val($("#billing_state").val());
      //     $("#shipping_country").val($("#billing_country").val());
      //     $("#shipping_pincode").val($("#billing_pincode").val());
      //     $("#shipping_mobile").val($("#billing_mobile").val());
      //   }else{
      //     $("#shipping_name").val('');
      //     $("#shipping_address").val('');
      //     $("#shipping_city").val('');
      //     $("#shipping_state").val('');
      //     $("#shipping_country").val('');
      //     $("#shipping_pincode").val('');
      //     $("#shipping_mobile").val('');
      //   }
  
      // });
       });
      // function selectPaymentMethod(){
      //   if($('.stripe').is(':checked') || $('.cod').is(':checked')){
      //     //alert('checked');
      //   }else{
      //     alert('Please Select Payment Method');
      //     return false;
      //   }
      // }
      </script>
</body>

</html>