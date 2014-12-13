
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
                        <h3 class="box-title">Updte your profile information</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">
                        {{ Form::open(array('route' => 'prof_update')) }}
                            <input type="hidden" name="user_id" value="{{Sentry::getUser()->id}}"/>
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" value="@if(Input::old('first_name')){{Input::old('first_name')}}@else{{Sentry::getUser()->first_name}}@endif" placeholder="Your first name"/>
                                @if($errors->has('first_name')) <span class="has-error">{{ $errors->first('first_name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" value="@if(Input::old('last_name')){{Input::old('last_name')}}@else{{Sentry::getUser()->last_name}}@endif"  placeholder="Your last name"/>
                                @if($errors->has('last_name')) <span class="has-error">{{ $errors->first('last_name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="@if(Input::old('email')){{Input::old('email')}}@else{{Sentry::getUser()->email}}@endif" placeholder="Your email"/>
                                @if($errors->has('email')) <span class="has-error">{{ $errors->first('email') }}</span> @endif
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