
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
                        <h3 class="box-title">Projects information</h3>
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
                                    <th>PROJECT</th>
                                    <th>BUDGET</th>
                                    <th>STARTED DATE</th>
                                    <th>DELIVERY DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->email }}</td>
                                    <td>{{ $project->skype }}</td>
                                    <td>{{ $project->market_place }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->budget }}</td>
                                    <td>{{ $project->started_date }}</td>
                                    <td>{{ $project->delivery_date }}</td>
                                    <td><a href="{{ URL::to("projects/{$project->id}") }}"> Edit</a> | <a href="{{ URL::to("projects/delete/{$project->id}") }}" onclick="return ConfirmDelete()"><span style="color: red;"> Delete</span></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$all_projects->links()}}
                    </div>
                </div>
            </div>
        </div>
    @stop