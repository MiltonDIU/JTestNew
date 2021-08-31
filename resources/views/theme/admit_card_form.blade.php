@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if(Session::has('notification'))
                    <div class="alert alert-info fade in alert-dismissable">
                        {{Session::get('notification.message')}}
                    </div>

                @endif

                {!! Form::open(['url' => '/admit-download', 'class' => 'form-horizontal', 'files' => true]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <label class="help-block">All Field are Required</label>
                    </div>
                </div>
                <div class="row">
                    <label for="dob" class="col-md-4 col-sm-12 col-form-label">Identity Number(Passport/Birth Certificate Number)</label>
                    <div class="form-group col-md-6 col-sm-12">
                        {!! Form::text('identity', null, ['class' => 'form-control','id'=>'identity']) !!}
                        {!! $errors->first('identity', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row">
                    <label for="dob" class="col-md-4 col-sm-12 col-form-label">Date of Birth</label>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="inputZip">Year</label>

                        {!! Form::text('dobYear', null, ['class' => 'form-control','id'=>'dobYear']) !!}
                        {!! $errors->first('dobYear', '<p class="help-block">:message</p>') !!}

                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="inputZip">Month</label>
                        {!! Form::text('dobMonth', null, ['class' => 'form-control','id'=>'dobMonth']) !!}
                        {!! $errors->first('dobMonth', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="inputZip">Day</label>

                        {!! Form::text('dobDay', null, ['class' => 'form-control','id'=>'dobDay']) !!}
                        {!! $errors->first('dobDay', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row">
                    <label for="dob" class="col-md-4 col-form-label"></label>
                    <div class="form-group col-md-6 col-sm-12">
                        <input type="submit" name="submit"  value="Admit Card Download" class="btn btn-primary"/>
                        <!---<input id="getUser"  value="Grade search execution" class="btn btn-primary"/>--->
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div id="resultOk"></div>
                    </div>
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
        .form-control{width: 95%;}
        .help-block{color: red}
        @media only screen and (max-width: 767px) {
            .row{padding: 0px 10px; margin: 0px}
            .col-sm-12{width: 100%;
                float: left;}
        }
    </style>
@endpush
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>

    </script>
@endpush
@include('notification.notify')