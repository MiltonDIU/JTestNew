@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-md-8 col-md-offset-2 ">

                {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal',  'files' => true]) !!}

                <div class="content-wrap">
                    <article class="entry">
                        <div class="entry-content">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>

                        </div>
                    </article>

                    {!! Form::close() !!}

                </div>
            </div>

        </div></div>
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