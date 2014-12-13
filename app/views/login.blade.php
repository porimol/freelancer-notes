    {{-- Header --}}
    @include('includes.header')

    <body class="skin-blue">
        <div class="form-box" id="login-box">
        

            <div class="header">Sign In</div>
            {{ Form::open(array('route' => 'check-auth')) }}
                <div class="body bg-gray">
                    {{-- Display flash message --}}
                    @if (Session::has('flash_message'))
                        <span style="margin-left:18%; color: #ff0000">{{ Session::get('flash_message') }}</span>
                    @endif

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="User email"/>
                        @if($errors->has('login_errors')) <span class="has-error">{{ $errors->first('email') }}</span> @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="User password"/>
                    </div>
                </div>

                <div class="footer">                                                               
                    <button type="submit" name="submitbtn" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                    
                    <a href="#" class="text-center">Register a new membership</a>
                </div>
            {{ Form::close() }}
        </div>
    {{-- Footer --}}
    @include('includes.footer')