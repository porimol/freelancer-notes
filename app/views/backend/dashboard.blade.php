    @extends('layout')
    {{-- top bar --}}
    @section('topbar')
        @include('includes.topbar')
    @stop
    {{-- end top bar --}}
    
    @section('left_menubar')
        @include('includes.left_menubar')
    @stop

    @section('body')
        <script type="text/javascript">

            /*
            function replacer(key, value) {
            if (typeof value === "string") {
                return undefined;
            }
                return value;
            }
            var foo = <?php echo json_encode($jsondata); ?>;
            var jsonString = JSON.stringify(foo, replacer);
            console.log(jsonString);
            */

            $(function() {
                "use strict";
                //BAR CHART
                var bar = new Morris.Bar({
                    element: 'bar-chart',
                    resize: true,
                    data: 
                    {{json_encode($jsondata)}},
                    barColors: ['#f56954', '#00C0EF'],
                    xkey: 'month',
                    ykeys: ['clients', 'income'],
                    labels: ['Total Clients', 'Total Income'],
                    hideHover: 'auto'
                });
            });
        </script>

        <?php
            foreach($projectsinfo as $value):
                $total_ptoject = $value->total_ptoject;
                $completed_ptoject = $value->completed_ptoject;
                $total_client = $value->clients;
                $total_budget = $value->budget;
            endforeach;
        ?>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{$total_ptoject}}
                        </h3>
                        <p>
                            Total Project
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ URL::route('all_project') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{$completed_ptoject}}
                        </h3>
                        <p>
                            Completed Project
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ URL::route('all_project') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            {{$total_client}}
                        </h3>
                        <p>
                            Total Clients
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{URL::route('all_client')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            $ {{$total_budget}}
                        </h3>
                        <p>
                            Total Amount
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{URL::route('report')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable"> 
                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Yearly Bar Chart</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="bar-chart" style="height: 300px;"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section><!-- /.col-lg-12 -->
        </div><!-- /.row (main row) -->
    @stop