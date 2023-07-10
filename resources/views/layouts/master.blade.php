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
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ URL::asset('css/colors.css') }}" />
    <!-- select bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ URL::asset('css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            @include('layouts.sidebar')
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('layouts.navbar')
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>@yield('title-page')</h2>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                                Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ URL::asset('js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ URL::asset('js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    {{-- <script src="{{ URL::asset('js/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ URL::asset('js/utils.js') }}"></script>
    {{-- <script src="{{ URL::asset('js/analyser.js') }}"></script> --}}
    <!-- nice scrollbar -->
    <script src="{{ URL::asset('js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-d').select2();
        });
        let table = new DataTable('#myTable');
    </script>
    @yield('js')
</body>

</html>
