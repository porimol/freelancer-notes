
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
                        {{ Form::open(array('route' => 'passchange')) }}
                            <input type="hidden" name="user_id" value="{{Sentry::getUser()->id}}"/>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" value="{{Input::old('password')}}" placeholder="New password"/>
                                @if($errors->has('password')) <span class="has-error">{{ $errors->first('password') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_pass" value="{{Input::old('last_name')}}"  placeholder="Confirm password"/>
                                @if($errors->has('confirm_pass')) <span class="has-error">{{ $errors->first('confirm_pass') }}</span> @endif
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