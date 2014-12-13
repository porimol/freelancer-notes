
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
                        <h3 class="box-title">Client's Information</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>
                    <div class="box-body">
                        {{ Form::open(array('route' => 'save_client')) }}
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
                                <input type="text" class="form-control" name="name" value="{{ Input::old('name') }}" placeholder="Client's name"/>
                                @if($errors->has('name')) <span class="has-error">{{ $errors->first('name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" value="{{ Input::old('email') }}"  placeholder="Client's email address"/>
                                @if($errors->has('email')) <span class="has-error">{{ $errors->first('email') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="skype" value="{{ Input::old('skype') }}"  placeholder="Client's skype id"/>
                                @if($errors->has('skype')) <span class="has-error">{{ $errors->first('skype') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="country" value="{{ Input::old('country') }}"  placeholder="Client's country"/>
                                @if($errors->has('country')) <span class="has-error">{{ $errors->first('country') }}</span> @endif
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