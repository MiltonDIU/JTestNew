@extends('theme2.master')

@section('content')



    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <form class="col-sm-6 mt-4" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
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


                    <div class="mb-3 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-form-label" for="password">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                    </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn col-sm-12 btn-primary mb-3">
                            Reset Password
                        </button>
                    </div>
                </div>
                </form>
            </div>
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
