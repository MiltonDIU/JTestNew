@extends('theme2.master')

@section('content')
    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                        <a class="btn btn-primary form-ap" href="{{url('/uploads/J.TestApplicationFormLatestACLevel.pdf')}}" target="_blank">
                            J.Test Application Form AC Level
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <a class="btn btn-primary form-ap" href="{{url('/uploads/J.TestApplicationFormLatestDELevel.pdf')}}" target="_blank">
                            J.Test Application Form DE Level
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <a class="btn btn-primary form-ap" href="{{url('/uploads/J.TestApplicationFormLatestFGLevel.pdf')}}" target="_blank">
                            J.Test Application Form FG Level
                        </a>
                    </div>
                </div>
            <div class="row logo_row" style="padding-top: 2rem;">
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



                            {!! Form::open(['url' => '/register', 'class' => 'mt-4 mb-4',  'files' => true]) !!}







                            <div class="row mb-3 align-items-center  {{ $errors->has('exam_level_id') ? 'has-error' : ''}}">
                                {!! Form::label('exam_level_id', 'Exam Level',['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                        {!! Form::select('exam_level_id', $examLevels, null, ['placeholder' => 'Please select ...', 'class' => 'form-select', 'required' => 'required']) !!}
                                        {!! $errors->first('exam_level_id', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>




                            <div class="row mb-3 align-items-center  {{ $errors->has('schedule_id') ? 'has-error' : ''}}">
                                {!! Form::label('schedule_id', 'Exam Date',['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    <div class="ci-select">
                                        {!! Form::select('schedule_id',[], null, ['required' => 'required', 'class' => 'form-select','placeholder'=>'Select Exam Level']) !!}
                                        {!! $errors->first('schedule_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>






                            <div class="row mb-3 align-items-center {{ $errors->has('name') ? ' has-error' : '' }} ">
                                {!! Form::label('name', 'Name',['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']); !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center {{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email Address',['class'=>'col-sm-2 col-form-label']) !!}

                                <div class="col-sm-10">
                                    {!! Form::text('email', null, ['class' => 'form-control','id'=>'email_address','required']);!!}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Password',['class'=>'col-sm-2 col-form-label']) !!}

                                <div class="col-sm-10">

                                    {!! Form::password('password', null, ['class' => 'form-control']);!!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  ">
                                {!! Form::label('password_confirmation', 'Confirm Password',['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::password('password_confirmation', null, ['class' => 'form-control','id'=>'password-confirm','required']);!!}
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                {!! Form::label('mobile', 'Mobile',['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">

                                    {!! Form::text('mobile', null, ['class' => 'form-control','required','id'=>'mobile']);!!}
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('father_name') ? ' has-error' : '' }}">
                                {!! Form::label('father_name', "Father's Name",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('father_name', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('father_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center  {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                                {!! Form::label('mother_name', "Mother's Name",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('mother_name', null, ['class' => 'form-control','required']);!!}
                                    @if ($errors->has('mother_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('dob') ? ' has-error' : '' }}">
                                {!! Form::label('dob', "Date of Birth",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10 datefiled">
                                    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'date','placeholder'=>'YYYY-MM-DD',' readonly'=>'readonly','required']);!!}

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('gender') ? ' has-error' : '' }}">
                                {!! Form::label('gender', "Gender",['class'=>'col-sm-2 col-form-label']) !!}
{{--                                <div class="col-sm-10">--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('gender', 'Male', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="male">Male</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('gender', 'Female', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="female">Female</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('gender', 'Others', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="others">Others</label>--}}
{{--                                    </div>--}}


{{--                                    @if ($errors->has('gender'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('gender') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}


                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="others" value="Others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>







                            </div>
                            <div class="row mb-3 align-items-center  {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                {!! Form::label('nationality', "Nationality",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('nationality', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('nationality'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('religion_id') ? 'has-error' : ''}}">

                                {!! Form::label('religion', "Religion",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    <div class="ci-select">
                                        {!! Form::select('religion_id', $religions, null, ['placeholder' => 'Please select ...', 'class' => 'form-select', 'required' => 'required']) !!}
                                        {!! $errors->first('religion_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center  {{ $errors->has('identity') ? ' has-error' : '' }}">

                                {!! Form::label('identity', "NID/Passport/Birth Registration No.",['class'=>'col-sm-2 col-form-label']) !!}


                                <div class="col-sm-4">
                                    {!! Form::text('identity', null, ['class' => 'form-control','required']);!!}

                                    @if ($errors->has('identity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                    @endif
                                </div>
{{--                                <div class="col-sm-6 align-items-center">--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('identity_type', 'NID', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="nid">NID No.</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('identity_type', 'Passport', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="passport">Passport No.</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        {!! Form::radio('identity_type', 'Birth', ['class' => 'form-check-input','required']);!!}--}}
{{--                                        <label class="form-check-label" for="birth-registration-no">Birth Registration No.</label>--}}
{{--                                    </div>--}}
{{--                                    @if ($errors->has('identity_type'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('identity_type') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}


                                <div class="col-sm-6 align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="identity_type" id="nid" value="NID">
                                        <label class="form-check-label" for="nid">NID No.</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="identity_type" id="passport" value="Passport">
                                        <label class="form-check-label" for="passport">Passport No.</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="identity_type" id="birth-registration-no" value="Birth">
                                        <label class="form-check-label" for="birth-registration-no">Birth Registration No.</label>
                                    </div>
                                @if ($errors->has('identity_type'))--}}
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identity_type') }}</strong>
                                    </span>
                                @endif
                                </div>



                                <div class="col-sm-8 offset-2">
                                    <p>Select the type of document you have given and upload that file</p>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center {{ $errors->has('identity_file') ? ' has-error' : '' }}">

                                {!! Form::label('identity_file', "NID/Passport/Birth Registration Attached File",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">


                                        <input class="form-control" type="file" name="identity_file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

                                    @if ($errors->has('identity_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3 align-items-center  {{ $errors->has('address') ? ' has-error' : '' }}">
                                {!! Form::label('address', "Address",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">

                                    {!! Form::textarea('address', null, ['rows' => '5','required','class'=>'form-control']);!!}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="row mb-3 align-items-center  {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                {!! Form::label('avatar', "Picture",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">

                                        <input class="form-control" type="file" name="avatar" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />


                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center  {{ $errors->has('signature') ? ' has-error' : '' }}">
                                {!! Form::label('signature', "Signature",['class'=>'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">

                                        <input class="form-control" type="file" name="signature" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

                                    @if ($errors->has('signature'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('signature') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3 align-items-center">

                                    <button type="submit" class="btn btn-primary text-right">
                                        Register
                                    </button>

                            </div>
                            {!! Form::close() !!}


    </div>
    </section>

@endsection


@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <style>
        #mainNav{
            background: #212529!important;
        }
        .form-ap{width: 100%}





        /*.header{position: relative; background:black}*/
        /*.main-elevated{margin-top:25px;}*/
        /*.logo_row{padding-bottom: 30px}*/

        /*label.file input {position:absolute; width:0; overflow:hidden; opacity:0;}*/
        /*label.file {*/
        /*    width:0%; !* Use for fluid design *!*/
        /*    min-width:200px;*/
        /*    height:30px;*/
        /*    line-height:28px!important;*/
        /*    cursor:pointer;*/
        /*    position:relative;*/
        /*    display:inline-block;*/
        /*    white-space:nowrap;*/
        /*    font-family:sans-serif;*/
        /*    text-align:right;*/
        /*}*/
        /*label.file:before {*/
        /*    content:"No file chosen";*/
        /*    display:block;*/
        /*    position:absolute;*/
        /*    box-sizing:border-box;*/
        /*    width:100%;*/
        /*    height:inherit;*/
        /*    padding:0 84px 0 10px;*/
        /*    border:0px solid #e8eeef;*/
        /*    border-width:2px 0px 2px 2px;*/
        /*    border-radius:3px 0 0 3px;*/
        /*    background-color:#fff;*/
        /*    color:#00C6FF;*/
        /*    font-size:12px;*/
        /*    overflow:hidden;*/
        /*    text-overflow:ellipsis;*/
        /*    text-align:center;*/
        /*    vertical-align:middle;*/
        /*}*/
        /*label.file[title]:not([title=""]):before{*/
        /*    content:attr(title);*/
        /*    color:#162f44;*/
        /*}*/
        /*label.file:after {*/
        /*    content:"BROWSE";*/
        /*    display:inline-block;*/
        /*    position:relative;*/
        /*    box-sizing:border-box;*/
        /*    width:74px;*/
        /*    height:inherit;*/
        /*    padding:0 4px;*/
        /*    border-radius:0 3px 3px 0;*/
        /*    background-color:#00C6FF;*/
        /*    color:#fff;*/
        /*    overflow:hidden;*/
        /*    font-size:9px;*/
        /*    font-weight:bold;*/
        /*    text-overflow:ellipsis;*/
        /*    text-align:center;*/
        /*    vertical-align:middle;*/
        /*}*/
        /*.has-error .field input{*/
        /*    border-color: #a94442;*/
        /*    box-shadow: inset 0 1px 1px*/
        /*}*/
        /*.has-error .field .error-msg{*/
        /*    color: #a94442;*/
        /*}*/
        /*input{height: 30px; padding: 3px 12px;}*/
        /*.form-field-inline{padding-bottom:6px;}*/
        /*.form-field{margin-bottom: 9px;}*/
        /*.field.button{margin-left: 25%}*/
        /*.star{*/
        /*    color: darkred;}*/
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
