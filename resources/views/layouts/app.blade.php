<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      {{-- <link rel="icon" href="images/fevicon.png" type="image/png" /> --}}
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{URL::asset('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{URL::asset('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{URL::asset('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{URL::asset('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="{{URL::asset('js/semantic.min.css')}}" />


   </head>
   <body class="inner_page login">
    @yield('content')
      <!-- jQuery -->
      <script src="{{URL::asset('js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('js/popper.min.js')}}"></script>
      <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{URL::asset('js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{URL::asset('js/bootstrap-select.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{URL::asset('js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{URL::asset('js/custom.js')}}"></script>
   </body>
</html>
