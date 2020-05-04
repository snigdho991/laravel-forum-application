<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from forum.azyrusthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Apr 2020 17:26:31 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum :: Home Page</title>

        <!-- Bootstrap -->
        <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom -->
        <link href="{{ asset('app/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->

        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('app/font-awesome-4.0.3/css/font-awesome.min.css') }}">

        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app/css/style.css') }}" media="screen" />

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('app/rs-plugin/css/settings.css') }}" media="screen" />

        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"/>

        @yield('styles')

    </head>

    <body>
        <div class="container-fluid">

                @include('includes.slider')
            
                @include('includes.headernav')

                    @yield('content')

                @include('includes.footer')
        </div>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="{{ asset('app/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js') }}"></script>
 

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="{{ asset('app/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('app/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

        <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
        <script type="text/javascript">
            @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}")  
            @endif

            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")  
            @endif

            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}")  
            @endif

            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}")  
            @endif
        </script>


        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">
            
            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 15000,
                            startwidth: 1200,
                            startheight: 278,
                            hideThumbs: 10,
                            fullWidth: "on"
                        });

            });	//ready

        </script>

        <!-- END REVOLUTION SLIDER -->
        <script src="{{ asset('app/js/myjs.js') }}"></script>
        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>

        <script>
            $('.opt').on('click', function() {
                $(location).attr('href', this.value);
                console.log(this.value);
            });
        </script>

        @yield('scripts')

    </body>

<!-- Mirrored from forum.azyrusthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Apr 2020 17:26:47 GMT -->
</html>