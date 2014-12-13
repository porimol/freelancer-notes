
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
                        <table id="gridtableview" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>SKYPE</th>
                                    <th>MARKETPLACE</th>
                                    <th>COUNTRY</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->skype }}</td>
                                    <td>{{ $client->market_place }}</td>
                                    <td>{{ $client->country }}</td>
                                    <td><a href="{{ URL::to('clients/'.$client->id) }}"> Edit</a> | <a href="{{ URL::to("clients/delete/{$client->id}") }}" onclick="return ConfirmDelete()"><span style="color: red;"> Delete</span></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$all_clients->links()}}
                    </div>
                </div>
            </div>
        </div>
    @stop