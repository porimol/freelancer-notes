
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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Generate Your Desired Report</h3>
                        </div>
                        <div class="box-body">
                            {{ Form::open(array('route' => 'show-report')) }}
                                <div class="form-group">
                                    <select name="marketplace" class="form-control">
                                        <option value="0"> Select marketplace </option>
                                        @foreach($marketplaces as $key=> $marketplace)
                                            <option value="{{$marketplace->id}}"> {{ $marketplace->name }} </option>
                                        @endforeach
                                    </select><!-- /.form-control -->
                                    @if($errors->has('marketplace')) <span class="has-error">{{ $errors->first('marketplace') }}</span> @endif
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <select name="client" class="form-control">
                                        <option value="0"> Select client </option>
                                        @foreach($clients as $key=> $client)
                                            <option value="{{$client->id}}"> {{ $client->name }} </option>
                                        @endforeach
                                    </select><!-- /.form-control -->
                                    @if($errors->has('client')) <span class="has-error">{{ $errors->first('client') }}</span> @endif
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <input type="text" name="from_date" id="dpd1" value="{{Input::old('from_date')}}" class="form-control" placeholder="Report from the date" />
                                    @if($errors->has('from_date')) <span class="has-error">{{ $errors->first('from_date') }}</span> @endif
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <input type="text" name="to_date" id="dpd2" value="{{Input::old('to_date')}}" class="form-control"  placeholder="Report to the date" />
                                    @if($errors->has('to_date')) <span class="has-error">{{ $errors->first('to_date') }}</span> @endif
                                </div><!-- /.form-group -->

                                <div class="box-footer clearfix">
                                    <button type="reset" class="pull-right btn btn-info" style="margin-left: 5px;">Reset</button>
                                    <button type="submit" class="pull-right btn btn-primary">Generate</button>
                                </div>
                            {{ Form::close() }}
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    @stop