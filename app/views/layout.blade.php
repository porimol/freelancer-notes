    {{-- Header --}}
    @include('includes.header')

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
                        <small>{{ucfirst(Request::segment(1))}}</small><code style="font-size: 15px;"> Alpha V1.0.0</code>
                        @if (Session::has('flash_message'))
                            <span style="margin-left:18%; color: #ff0000">{{ Session::get('flash_message') }}</span>
                        @endif
                        @if (Session::has('success_message'))
                            <span style="margin-left:18%; color: #008000">{{ Session::get('success_message') }}</span>
                        @endif
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">{{ucfirst(Request::segment(1))}}</li>
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
    {{-- Footer --}}
    @include('includes.footer')