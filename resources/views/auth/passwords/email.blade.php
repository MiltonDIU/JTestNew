@extends('theme2.master')

@section('content')
    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                {!! Form::open(['url' => '/password/email', 'class' => 'col-sm-6 mt-4',  'files' => true]) !!}
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
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn col-sm-12 btn-primary mb-3">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
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
