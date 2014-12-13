
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
                        <h3 class="box-title">Edit Marketplace's Information</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">
                        {{-- Flash message --}}
                        {{ Session::get('message') }}

                        {{ Form::open(array('route' => 'marketplace_info_update')) }}
                            <input type="hidden" name="marketplace_id" value="{{$marketplaces->id}}" />
                            <div class="form-group">
                                <select name="marketplace_type" class="form-control">
                                    <option value="{{$marketplaces->type}}" @if($marketplaces->type == 'Product') selected="selected" @endif> Products Based </option>
                                    <option value="{{$marketplaces->type}}" @if($marketplaces->type == 'Services') selected="selected" @endif> Services Based </option>
                                </select>
                                @if($errors->has('marketplace_type')) <span class="has-error">{{ $errors->first('marketplace_type') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="@if(Input::old('name')){{Input::old('name')}}@else{{$marketplaces->name}}@endif" placeholder="Name of the marketplace"/>
                                @if($errors->has('name')) <span class="has-error">{{ $errors->first('name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="url" class="form-control" name="url" value="@if(Input::old('url')){{Input::old('url')}}@else{{$marketplaces->url}}@endif"  placeholder="Marketplace's URL"/>
                                @if($errors->has('url')) <span class="has-error">{{ $errors->first('url') }}</span> @endif
                            </div>

                            <div class="box-footer clearfix">
                                <button type="submit" class="pull-right btn btn-primary">Update</button>
                                <button type="reset" class="pull-right btn btn-info" style="margin-right: 5px;">Reset</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    @stop