
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-pencil"></i>
                        <h3 class="box-title">Project's Information</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">
                        {{ Form::open(array('route' => 'save_project')) }}
                            <div class="form-group">
                                <select name="marketplace" class="form-control">
                                    <option value="0"> Select client </option>
                                    @foreach($marketplaces as $key=> $market)
                                    <option value="{{$market->id}}" @if(Input::old('marketplace') == $market->id) seleceted="selected" @endif> {{ $market->name }} </option>
                                    @endforeach
                                </select>
                                @if($errors->has('marketplace')) <span class="has-error">{{ $errors->first('marketplace') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <select name="client_id" class="form-control">
                                    <option value="0"> Select client </option>
                                    @foreach($clients as $key=> $client)
                                    <option value="{{$client->id}}" @if(Input::old('project_name') == $client->id) seleceted="selected" @endif> {{ $client->name }} </option>
                                    @endforeach
                                </select>
                                @if($errors->has('client_id')) <span class="has-error">{{ $errors->first('client_id') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="project_name" value="{{ Input::old('project_name') }}"  placeholder="Project's name"/>
                                @if($errors->has('project_name')) <span class="has-error">{{ $errors->first('project_name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="budget" value="{{ Input::old('budget') }}"  placeholder="Project budget"/>
                                @if($errors->has('budget')) <span class="has-error">{{ $errors->first('budget') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="started_date" id="dpd1" value="{{ Input::old('started_date') }}"  placeholder="Project start date"/>
                                @if($errors->has('started_date')) <span class="has-error">{{ $errors->first('started_date') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="delivery_date" id="dpd2" value="{{ Input::old('delivery_date') }}"  placeholder="Project delivery date"/>
                                @if($errors->has('delivery_date')) <span class="has-error">{{ $errors->first('delivery_date') }}</span> @endif
                            </div>

                            <div class="box-footer clearfix">
                                <button class="pull-right btn btn-primary">Save</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    @stop