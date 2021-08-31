@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="content-wrap">
                    <article class="entry">
                        <div class="entry-content">
                            <div class="row logo_row" >
                                <div class="col-md-3"style="text-align: left;">
                                    <img src="{{url('uploads/logo/'.$settings->diu_logo)}}" alt="logo">
                                </div>
                                <div class="col-md-6"style="text-align: center;">
                                    <img src="{{url('uploads/logo/'.$settings->logo)}}" alt="logo">
                                </div>
                                <div class="col-md-3"style="text-align: right;">
                                    <img src="{{url('uploads/logo/'.$settings->diil_logo)}}" alt="logo">
                                </div>
                            </div>

 {!! Form::open(['url' => '/register', 'class' => 'form-horizontal', 'autocomplete'=>'off', 'files' => true]) !!}


                            <div class="form-field form-field-inline">
                                <label for="job-category">Exam Time</label>
                                <div class="field">
                                    <div class="ci-select">

{!! Form::select('schedule_id', $schedules); !!}

                                    </div>
                                </div>
                            </div>





                            <div class="form-field form-field-inline {{ $errors->has('like_box') ? ' has-error' : '' }}">
                                <label for="job-title">PLEASE TICK ONE OF THE BOXES ON THE RIGHT <span class="star">*</span></label>
                                <div class="form-field">
                                    <label>
                                        <input name="like_box" value="A-D" type="radio" />A-D
                                        <input name="like_box" value="E-F" type="radio" /> E-F
                                    </label>
                                    @if ($errors->has('like_box'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('like_box') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-field form-field-inline{{ $errors->has('name') ? ' has-error' : '' }} ">
                                <label for="name">Name<span class="star">*</span></label>
                                <div class="field">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address<span class="star">*</span></label>

                                <div class="field">
                                    <input id="email_address" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password<span class="star">*</span></label>

                                <div class="field">
                                    <input id="password" type="password" class="form-control" name="password" required>
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="name">Mobile<span class="star">*</span>
                                </label>
                                <div class="field">
                                    <input id="mobile"  type="text" name="mobile">
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('father_name') ? ' has-error' : '' }}">
                                <label for="name">Father's name<span class="star">*</span>
                                </label>
                                <div class="field">
                                    <input type="text" name="father_name">
                                    @if ($errors->has('father_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                                <label for="name">Mothers's name<span class="star">*</span>
                                </label>
                                <div class="field">
                                    <input type="text" name="mother_name">
                                    @if ($errors->has('mother_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="name">Date of Birth*
                                </label>
                                <div class="field datefiled">
                                    <input class="form-control" id="date" name="dob" placeholder="MM/DD/YYYY" type="text"/>
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-field form-field-inline {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="name">Gender*
                                </label>
                                <div class="field">
                                    <label>
                                        <input name="gender" value="Male" type="radio" /> Male

                                        <input name="gender" value="Female" type="radio" /> Female
                                    </label>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label for="name">Nationality*
                                </label>
                                <div class="field">
                                    <input type="text" name="nationality">
                                    @if ($errors->has('nationality'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('religion') ? ' has-error' : '' }}">
                                <label for="job-category">RELIGION</label>
                                <div class="field">
                                    <div class="ci-select">
                                        <select name="religion" id="job-category">
                                            <option value="">Choose a RELIGION </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="others">others</option>
                                        </select>
                                        @if ($errors->has('religion'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('identity') ? ' has-error' : '' }}">
                                <label for="name">NID/PASSPORT/BIRTH REGISTRATION*
                                </label>
                                <div class="field">
                                    <input type="text" name="identity">
                                    @if ($errors->has('identity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-field form-field-inline {{ $errors->has('identity_file') ? ' has-error' : '' }}">
                                <label for="name">NID/PASSPORT/BIRTH REGISTRATION attached file*
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
                                    <textarea  name="address" id="job-description" cols="10" rows="5"></textarea>
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
                "mask": "99999-999999"
            });
        });

    </script>


@endpush

@include('notification.notify')