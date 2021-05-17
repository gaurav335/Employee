<!DOCTYPE html>
<html lang="en">

<head>
<title>@yield('page_title') | Admin </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
    <meta name="csrf-token" content={{csrf_token()}}>


    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">


</head>
<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @guest @yield('content') @else

        @include('layouts.sidebar')

            @include('layouts.header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            @yield('page_head')

                                <h5 class="page-title">@yield('page_title')</h5>

                        </div>
                        @yield('content')

                    </div>
                </div>
            </div>

    @endguest

    

    <script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js')}}"></script>


        <!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/image.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script> -->

        <!--Morris Chart-->
        <!-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script> -->

        <!-- dashboard -->
        <!-- <script src="{{ asset('assets/pages/dashboard.js') }}"></script> -->

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script> -->

        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>


        <!-- datatable -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.j')}}s"></script>

        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/pages/sweet-alert.init.js') }}"></script>

        <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
        <script>
         $(document).ready(function() {
                $('form').parsley();
            });
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);
            $(document).ready(function () {
                if($("#answer").length > 0){
                    tinymce.init({
                        selector: "textarea#answer",
                        theme: "modern",
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],


                    });
                }
            });
            $('#select_all').on('click', function(){
                if($('.select_row').is(':checked')){
                    $('input[type="checkbox"]').prop('checked', false);
                } else {
                    $('input[type="checkbox"]').prop('checked', true);
                }
            });
        </script>
        @stack('page_scripts')
</body>
</html>
