@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12" style="text-align: right">
            <!--<a class="btn btn-primary" style="background: red; text-transform: capitalize;" target="_blank" href="{{url('/uploads/J.TestApplicationFormLatest.pdf')}}">Download Offline Registration Form</a> -->
                <a class="btn btn-primary" style="background: red; margin-left: 20px; text-transform: capitalize;" target="_blank" href="{{url('/uploads/J.TestApplicationFormLatestACLevel.pdf')}}">J.Test Application Form  AC Level</a>
                <a class="btn btn-primary" style="background: red; margin-left: 20px;text-transform: capitalize;" target="_blank" href="{{url('/uploads/J.TestApplicationFormLatestDELevel.pdf')}}">J.Test Application Form  DE Level</a>
                <a class="btn btn-primary" style="background: red; margin-left: 20px;text-transform: capitalize; " target="_blank" href="{{url('/uploads/J.TestApplicationFormLatestFGLevel.pdf')}}">J.Test Application Form  FG Level</a>



            </div>
            <div class="col-xs-12">
                <div class="content-wrap">
                    <article class="entry">
                        <div class="entry-content">
                            <div class="row logo_row" >
                                <div class="col-md-3"style="text-align: left;">
                                    <img src="{{url('uploads/logo/'.Settings::config()['diu_logo'])}}" alt="logo">
                                </div>
                                <div class="col-md-6"style="text-align: center;">
                                    <img src="{{url('uploads/logo/'.Settings::config()['logo'])}}" alt="logo">
                                </div>
                                <div class="col-md-3"style="text-align: right;">
                                    <img src="{{url('uploads/logo/'.Settings::config()['diil_logo'])}}" alt="logo">
                                </div>
                            </div>

                            {!! Form::open(['url' => '/register', 'class' => 'form-horizontal',  'files' => true]) !!}

                            <div class="form-field form-field-inline {{ $errors->has('exam_level_id') ? 'has-error' : ''}}">
                                {!! Form::label('exam_level_id', 'Exam Level') !!}
                                <div class="field">
                                    <div class="ci-select">
                                        {!! Form::select('exam_level_id', $examLevels, null, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                        {!! $errors->first('exam_level_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('schedule_id') ? 'has-error' : ''}}">
                                {!! Form::label('schedule_id', 'Exam Date') !!}
                                <div class="field">
                                    <div class="ci-select">
                                        {!! Form::select('schedule_id',[], null, ['required' => 'required','placeholder'=>'Select Exam Level']) !!}
                                        {!! $errors->first('schedule_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>






                            <div class="form-field form-field-inline{{ $errors->has('name') ? ' has-error' : '' }} ">
                                <label for="name">Name</label>
                                <div class="field">
                                    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']); !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address</label>

                                <div class="field">
                                    {!! Form::text('email', null, ['class' => 'form-control','id'=>'email_address','required']);!!}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>

                                <div class="field">

                                    {!! Form::password('password', null, ['class' => 'form-control']);!!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline ">
                                <label for="password-confirm">Confirm Password</label>
                                <div class="field">
                                    {!! Form::password('password_confirmation', null, ['class' => 'form-control','id'=>'password-confirm','required']);!!}
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="name">Mobile
                                </label>
                                <div class="field">

                                    {!! Form::text('mobile', null, ['class' => 'form-control','required','id'=>'mobile']);!!}
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('father_name') ? ' has-error' : '' }}">
                                <label for="name">Father's name
                                </label>
                                <div class="field">
                                    {!! Form::text('father_name', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('father_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                                <label for="name">Mother's name
                                </label>
                                <div class="field">
                                    {!! Form::text('mother_name', null, ['class' => 'form-control','required']);!!}
                                    @if ($errors->has('mother_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="name">Date of Birth
                                </label>
                                <div class="field datefiled">
                                    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'date','placeholder'=>'YYYY-MM-DD',' readonly'=>'readonly','required']);!!}

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="name">Gender
                                </label>
                                <div class="field">

                                    {!! Form::radio('gender', 'Male', ['class' => 'form-control','required']);!!}&nbspMale &nbsp&nbsp&nbsp
                                    {!! Form::radio('gender', 'Female', ['class' => 'form-control','required']);!!}&nbspFemale&nbsp&nbsp&nbsp
                                    {!! Form::radio('gender', 'Others', ['class' => 'form-control','required']);!!}&nbspOthers


                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label for="name">Nationality
                                </label>
                                <div class="field">
                                    {!! Form::text('nationality', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('nationality'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('religion_id') ? 'has-error' : ''}}">
                                {!! Form::label('religion_id', 'Religion') !!}
                                <div class="field">
                                    <div class="ci-select">
                                        {!! Form::select('religion_id', $religions, null, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                        {!! $errors->first('religion_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('identity') ? ' has-error' : '' }}">
                                <label for="name">NID/Passport/Birth Registration No.
                                </label>
                                <div class="field col-md-3" style="padding-left:0px">
                                    {!! Form::text('identity', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('identity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="field col-md-5">

                                    {!! Form::radio('identity_type', 'NID', ['class' => 'form-control','required']);!!}&nbsp NID &nbsp&nbsp&nbsp
                                    {!! Form::radio('identity_type', 'Passport', ['class' => 'form-control','required']);!!}&nbsp Passport&nbsp&nbsp&nbsp
                                    {!! Form::radio('identity_type', 'Birth', ['class' => 'form-control','required']);!!}&nbsp Birth Certificate


                                    @if ($errors->has('identity_type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity_type') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="field col-md-10 col-md-offset-4">
                                    <p>Select the type of document you have given and upload that file</p>
                                </div>
                            </div>


                            <div class="form-field form-field-inline {{ $errors->has('identity_file') ? ' has-error' : '' }}">
                                <label for="name">NID/Passport/Birth Registration Attached File
                                </label>
                                <div class="field">
                                    <label class="file" title="">
                                        <input type="file" name="identity_file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
                                    </label>
                                    @if ($errors->has('identity_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-field form-field-inline {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="job-description">Address</label>
                                <div class="field">
                                    {!! Form::textarea('address', null, ['rows' => '5','required']);!!}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="job-contact">Picture</label>
                                <div class="field">
                                    <label class="file" title="">
                                        <input type="file" name="avatar" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

                                    </label>
                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('signature') ? ' has-error' : '' }}">
                                <label for="job-contact">Signature</label>
                                <div class="field">
                                    <label class="file" title="">
                                        <input type="file" name="signature" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
                                    </label>
                                    @if ($errors->has('signature'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('signature') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-field form-field-inline {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="field">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}

        label.file input {position:absolute; width:0; overflow:hidden; opacity:0;}
        label.file {
            width:0%; /* Use for fluid design */
            min-width:200px;
            height:30px;
            line-height:28px!important;
            cursor:pointer;
            position:relative;
            display:inline-block;
            white-space:nowrap;
            font-family:sans-serif;
            text-align:right;
        }
        label.file:before {
            content:"No file chosen";
            display:block;
            position:absolute;
            box-sizing:border-box;
            width:100%;
            height:inherit;
            padding:0 84px 0 10px;
            border:0px solid #e8eeef;
            border-width:2px 0px 2px 2px;
            border-radius:3px 0 0 3px;
            background-color:#fff;
            color:#00C6FF;
            font-size:12px;
            overflow:hidden;
            text-overflow:ellipsis;
            text-align:center;
            vertical-align:middle;
        }
        label.file[title]:not([title=""]):before{
            content:attr(title);
            color:#162f44;
        }
        label.file:after {
            content:"BROWSE";
            display:inline-block;
            position:relative;
            box-sizing:border-box;
            width:74px;
            height:inherit;
            padding:0 4px;
            border-radius:0 3px 3px 0;
            background-color:#00C6FF;
            color:#fff;
            overflow:hidden;
            font-size:9px;
            font-weight:bold;
            text-overflow:ellipsis;
            text-align:center;
            vertical-align:middle;
        }
        .has-error .field input{
            border-color: #a94442;
            box-shadow: inset 0 1px 1px
        }
        .has-error .field .error-msg{
            color: #a94442;
        }
        input{height: 30px; padding: 3px 12px;}
        .form-field-inline{padding-bottom:6px;}
        .form-field{margin-bottom: 9px;}
        .field.button{margin-left: 25%}
        .star{
            color: darkred;}
    </style>
@endpush
@push('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="{{url('assets/inputmask/jquery.inputmask.bundle.js')}}" charset="utf-8"></script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="dob"]'); //our date input has the name "date"
            var container=$('#page form').length>0 ? $('#page form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        });

        $(document).ready(function(){
            $("#email_address").inputmask({
                mask: "*{1,30}[.*{1,30}][.*{1,30}][.*{1,30}]@*{1,30}[.*{2,6}][.*{1,2}]",
                greedy: false,
            });

            $("#mobile").inputmask({
                "mask": "9999999999999"
            });
        });


        $('#exam_level_id').change(function(){
            var exam_level_id = $(this).val();
            if(exam_level_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-schedule-list')}}?exam_level_id="+exam_level_id,
                    success:function(res){
                        if(res){
                            $("#schedule_id").empty();
                            //$("#schedule_id").append('<option value="">Select Exam Schedule</option>');
                            $.each(res,function(key,value){
                                $("#schedule_id").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#schedule_id").empty();
                        }
                    }
                });
            }else{
                $("#schedule_id").empty();
            }
        });

    </script>


@endpush

@include('notification.notify')
