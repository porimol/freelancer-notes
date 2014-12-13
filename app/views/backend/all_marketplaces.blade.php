
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



            function UniqueRandomNumbers($min, $max) {
                $numbers = range($min, $max);
                shuffle($numbers);
                $test = array_slice($numbers, 0);
                return $test;
            }
            //$tot = UniqueRandomNumbers(1,5);
            ?>
            @foreach ($all_marketplaces as $index=> $marketplace)
                <?php
                $key = rand(0,5);
                ?>
                <div class="col-md-4">
                    <!-- Success box -->
                    <div class="box box-solid
                    @if($key == 0):
                        box-primary
                    @elseif($key == 1)
                        box-info
                    @elseif($key == 2)
                        box-danger
                    @elseif($key == 3)
                        box-success
                    @else
                        box-warning
                    @endif
                    ">
                        <div class="box-header">
                            <h3 class="box-title">{{ strtoupper($marketplace->name) }}</h3>
                            <div class="box-tools pull-right">
                                <button data-widget="collapse" class="btn
                                @if($key == 0):
                                     btn-primary
                                @elseif($key == 1)
                                     btn-info
                                @elseif($key == 2)
                                     btn-danger
                                @elseif($key == 3)
                                     btn-success
                                @else
                                     btn-warning
                                @endif
                                 btn-sm"><i class="fa fa-minus"></i></button>
                                <button data-widget="remove" class="btn
                                 @if($key == 0):
                                      btn-primary
                                 @elseif($key == 1)
                                      btn-info
                                 @elseif($key == 2)
                                      btn-danger
                                 @elseif($key == 3)
                                      btn-success
                                 @else
                                      btn-warning
                                 @endif
                                 btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                           <label>Type : {{ $marketplace->type }}</label><br/>
                           <label>Marketplace : {{ $marketplace->name }}</label><br/>
                           <label>URL : {{ $marketplace->url }}</label>
                           <p>Action : <a href="{{ URL::to("marketplaces/{$marketplace->id}") }}"> Edit</a> | <a href="{{ URL::to("marketplaces/delete/{$marketplace->id}") }}" onclick="return ConfirmDelete()"><span style="color: red;"> Delete</span></a></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                {{$all_marketplaces->links()}}
            </div>
        </div>

    @stop