@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-md-8 col-md-offset-2 ">

                {!! Form::open(['url' => '/login', 'class' => 'form-horizontal',  'files' => true]) !!}

                <div class="content-wrap">
                    <article class="entry">
                        <div class="entry-content">
                            <div class="form-field form-field-inline{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address</label>

                                <div class="field">
                                    {!! Form::email('email', null, ['class' => 'form-control','required'=>'required']); !!}

                                @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>

                                <div class="field">

                                    {!! Form::password('password', null, ['class' => 'form-control','required'=>'required']); !!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-field form-field-inline">
                                <div class="field">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-field form-field-inline">
                                <label for="login">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button></label>
                                <div class="field">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>






                        </div>
                    </article>
                </div>
                {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection


@push('style')
    <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
        .list-item-title{color: black; font-size: 14px}
        .content-wrap{padding: 30px;box-shadow: 2px 2px 5px 2px #888888;}
    </style>
@endpush

@include('notification.notify')