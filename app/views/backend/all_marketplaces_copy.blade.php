
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
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Clients information</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="clients_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>TYPE</th>
                                    <th>NAME</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_marketplaces as $marketplace)
                                <tr>
                                    <td>{{ $marketplace->name }}</td>
                                    <td>{{ $marketplace->type }}</td>
                                    <td>{{ $marketplace->url }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


            <?php
            //$chunk = array_chunk($all_marketplaces, 4);
             //foreach ($chunk as $index => $marketplaces):
                 //foreach ($marketplaces as $key=> $marketplace):
                    //echo $marketplace->name;
                    //echo $key;
                    //echo '<pre>';
                    //print_r($marketplaces);
                    //echo '</pre>';
                //endforeach;
            //endforeach;

            ?>


            @foreach ($all_marketplaces as $marketplace)
                <div class="col-md-4">
                    <!-- Success box -->
                    <div class="box box-solid box-info">
                        <div class="box-header">
                            <h3 class="box-title">{{ strtoupper($marketplace->name) }}</h3>
                            <div class="box-tools pull-right">
                                <button data-widget="collapse" class="btn btn-info btn-sm"><i class="fa fa-minus"></i></button>
                                <button data-widget="remove" class="btn btn-info btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                           <label>Type : {{ $marketplace->type }}</label><br/>
                           <label>Type : {{ $marketplace->url }}</label>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            @endforeach
    @stop