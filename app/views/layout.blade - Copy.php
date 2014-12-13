<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $title }} :: OOIS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        {{--  Morris chart --}}
        {{ HTML::style('assets/css/morris/morris.css') }}
        {{-- jvectormap --}}
        {{ HTML::style('assets/css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        {{-- Date Picker --}}
        {{ HTML::style('assets/css/datepicker/datepicker3.css') }}
        {{-- Daterange picker --}}
        {{ HTML::style('assets/css/daterangepicker/daterangepicker-bs3.css') }}
        {{-- bootstrap wysihtml5 - text editor --}}
        {{ HTML::style('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        {{-- Theme style --}}
        {{ HTML::style('assets/css/AdminLTE.css') }}

        {{-- Style css --}}
        {{ HTML::style('assets/css/style.css') }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="skin-blue">
        @section('topbar')
            {{-- topbar content starts --}}
        @show
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            @section('left_menubar')
                {{-- left menubar content starts --}}
            @show

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @section('body')
                        {{-- topbar content starts --}}
                    @show
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- add new calendar event modal -->

        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
        {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        {{ HTML::script('//code.jquery.com/ui/1.11.1/jquery-ui.min.js') }}
        {{-- Morris.js charts --}}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
        {{ HTML::script('assets/js/plugins/morris/morris.min.js" type="text/javascript') }}
        {{-- Sparkline --}}
        {{ HTML::script('asstes/js/plugins/sparkline/jquery.sparkline.min.js') }}
        {{-- jvectormap --}}
        {{ HTML::script('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
        {{ HTML::script('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
        {{-- jQuery Knob Chart --}}
        {{ HTML::script('assets/js/plugins/jqueryKnob/jquery.knob.js') }}
        {{-- daterangepicker --}}
        {{ HTML::script('assets/js/plugins/daterangepicker/daterangepicker.js') }}
        {{-- datepicker --}}
        {{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
        {{-- Bootstrap WYSIHTML5 --}}
        {{ HTML::script('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
        {{-- iCheck --}}
        {{ HTML::script('assets/js/plugins/iCheck/icheck.min.js') }}
        {{-- AdminLTE App --}}
        {{ HTML::script('assets/js/AdminLTE/app.js') }}
        {{-- AdminLTE dashboard demo (This is only for demo purposes) --}}
        {{ HTML::script('assets/js/AdminLTE/dashboard.js') }}
        {{-- AdminLTE for demo purposes --}}
        {{ HTML::script('assets/js/AdminLTE/demo.js') }}
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#clients_table').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
