@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit </div>
        <div class="panel-body">


            {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['/' . Config("authorization.route-prefix") . '/user-activity', $user->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
                {!! Form::label('name', 'Name',['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']); !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'E-Mail Address',['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control','id'=>'email_address','required']);!!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                {!! Form::label('mobile', 'Mobile',['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('mobile', null, ['class' => 'form-control','required','id'=>'mobile']);!!}
                    @if ($errors->has('mobile'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('father_name') ? ' has-error' : '' }}">
                {!! Form::label('father_name', "Father's name",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('father_name', $user->profile->father_name, ['class' => 'form-control','required']);!!}
                    @if ($errors->has('father_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                {!! Form::label('mother_name', "Mother's name",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('mother_name', $user->profile->mother_name, ['class' => 'form-control','required']);!!}
                    @if ($errors->has('mother_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">

                {!! Form::label('mother_name', "Date of Birth",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6 datefiled">
                    {!! Form::text('dob', $user->profile->dob, ['class' => 'form-control','pleceholder'=>'YYYY-MM-DD','required']);!!}
                    @if ($errors->has('dob'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                {!! Form::label('gender', "Gender",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
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
            <div class="form-group {{ $errors->has('nationality') ? ' has-error' : '' }}">
                {!! Form::label('nationality', "Nationality",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('nationality', $user->profile->nationality, ['class' => 'form-control','required']);!!}
                    @if ($errors->has('nationality'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('religion_id') ? 'has-error' : ''}}">
                {!! Form::label('religion_id', "Religion",['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('religion_id', $religions, $user->profile->religion_id, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('religion_id', '<p class="help-block">:message</p>') !!}
                    </div>
            </div>
            <div class="form-group {{ $errors->has('identity') ? ' has-error' : '' }}">
                {!! Form::label('identity', "NID/Passport/Birth Registration No.",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('identity', $user->profile->identity, ['class' => 'form-control','required']);!!}
                    @if ($errors->has('identity'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('identity_file') ? ' has-error' : '' }}">
                {!! Form::label('identity_file', "NID/Passport/Birth Registration Attached File",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::file('identity_file', null, ['class' => 'form-control']);!!}
                    @if ($errors->has('identity_file'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('identity_file') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                {!! Form::label('identity_file', "Address",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::textarea('address', $user->profile->address, ['rows' => '5','required']);!!}
                    @if ($errors->has('address'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>









            <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                {!! Form::label('avatar', "Profile Picture",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::file('avatar', null, ['class' => 'form-control']);!!}
                    @if ($errors->has('avatar'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('signature') ? ' has-error' : '' }}">
                {!! Form::label('signature', "Signature",['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::file('signature', null, ['class' => 'form-control']);!!}
                    @if ($errors->has('signature'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('signature') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection
@include('notification.notify')
@push('styles')
    <style>
        input[type="checkbox"], input[type="radio"]{margin: 10px 0 0;}
    </style>
    @endpush