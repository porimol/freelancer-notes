
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
        <!-- Main content -->
        <section class="content invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Report Generated Filter By From Date To Date and Client
                        <small class="pull-right"><code>FROM : {{$from}} TO : {{$to}}</code></small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <strong>Client's Information</strong>
                    <address>
                        Name : {{$client->name}}<br/>
                        Skype : {{$client->skype}}<br/>
                        Email : {{$client->email}}<br/>
                        Marketplace : {{$client->market_place}}<br/>
                        Country : {{$client->country}}<br/>
                    </address>
                </div><!-- /.col -->

                <div class="col-sm-4 invoice-col">
                    <strong>Marketplace's Information</strong>
                    <address>
                        Marketplace : {{$marketplace->name}}<br/>
                    </address>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    @if($report_result)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>MARKETPLACES</th>
                                <th>PROJECTS</th>
                                <th>BEGINNING DATE</th>
                                <th>DELIVERY DATE</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;?>
                            @foreach($report_result as $reports)
                            <tr>
                                <td>{{$reports->marketplace}}</td>
                                <td>{{$reports->project_name}}</td>
                                <td>{{$reports->started_date}}</td>
                                <td>{{$reports->delivery_date}}</td>
                                <td>$ {{$reports->budget}}</td>
                            </tr>
                            <?php $total = $total+$reports->budget;?>
                            @endforeach
                            <tr>
                                <td colspan="4">Total earned</td>
                                <td>$ {{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                        <h1 style="text-align: center; color: #ff0000">Sorry, I don't have found any result for your desired date.</h1>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <button class="btn btn-info pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <!--<button class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>-->
                </div>
            </div>
        </section>
        <!-- /.content -->
    @stop