@extends('theme2.master')

@section('content')

    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                    {!! Form::open(['url' => '/login', 'class' => 'col-sm-6 mt-4',  'files' => true]) !!}
                    <div class="mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-form-label" for="email">Email Address</label>
                        {!! Form::email('email', null, ['class' => 'form-control','required'=>'required']); !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-form-label" for="password">Password</label>
                        <input class="form-control" name="password" type="password" id="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="d-flex mb-3">
                        <div class="form-check me-5">
                            <input type="checkbox" class="form-check-input"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember-me">
                                Remember Me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>

                    <input class="btn col-sm-12 btn-primary mb-3" type="submit" value="Login">

                    <p>Don't have an account? <a href="{{url('register')}}">Register here</a></p>
                {!! Form::close() !!}
            </div>
        </div>
    </section>



@endsection


@push('style')
    <style>
        #mainNav{
            background: #212529!important;
        }
    </style>

@endpush

@include('notification.notify')
