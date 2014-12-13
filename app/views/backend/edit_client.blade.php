
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

                        {{ Form::open(array('route' => 'client_info_update')) }}
                            <input type="hidden" name="client_id" value="{{$client_info->id}}" />
                            <div class="form-group">
                                <select name="marketplace" class="form-control">
                                    @foreach($marketplaces as $marketplace)
                                    <option value="{{$marketplace->name}}" @if($client_info->market_place == $marketplace->name) selected="selected" @endif> {{ $marketplace->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('marketplace')) <span class="has-error">{{ $errors->first('marketplace') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="@if(Input::old('name')){{Input::old('name')}}@else{{$client_info->name}}@endif" placeholder="Client's name"/>
                                @if($errors->has('name')) <span class="has-error">{{ $errors->first('name') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" value="@if(Input::old('email')){{Input::old('email')}}@else{{$client_info->email}}@endif"  placeholder="Client's email address"/>
                                @if($errors->has('email')) <span class="has-error">{{ $errors->first('email') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="skype" value="@if(Input::old('skype')){{Input::old('skype')}}@else{{ $client_info->skype}}@endif"  placeholder="Client's skype id"/>
                                @if($errors->has('skype')) <span class="has-error">{{ $errors->first('skype') }}</span> @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="country" value="@if(Input::old('country')){{Input::old('country')}}@else{{$client_info->country}} @endif"  placeholder="Client's country"/>
                                @if($errors->has('country')) <span class="has-error">{{ $errors->first('country') }}</span> @endif
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