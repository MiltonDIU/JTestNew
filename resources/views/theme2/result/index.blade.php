@extends('theme2.master')

@section('content')

    @include('theme2.breadcrumb',['page'=>'Result'])

    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">



                @if(Session::has('notification'))
                    <div class="alert alert-info fade in alert-dismissable">
                        {{Session::get('notification.message')}}
                    </div>
                @endif

{!! Form::open(['url' => '/result-view', 'class' => 'form-horizontal', 'files' => true]) !!}
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-12">
                            <label class="help-block">All Field are Required</label>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-md-4 col-sm-12 col-form-label">Test Year</label>
                        <div class="form-group col-md-8 col-sm-12">
                            <select id="testYear" name="testYear" class="form-select">
                                @for($i=date("Y");$i>=2009;$i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            {!! $errors->first('testYear', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="dob" class="col-md-4 col-sm-12 col-form-label">Registration Number</label>
                    <div class="form-group col-md-8 col-sm-12">
                        {!! Form::text('studentId', null, ['class' => 'form-control','id'=>'studentId']) !!}
                        {!! $errors->first('studentId', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
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
                        <div class="form-group col-md-2 col-sm-12">
                            <label for="inputZip">Day</label>

                            {!! Form::text('dobDay', null, ['class' => 'form-control','id'=>'dobDay']) !!}
                            {!! $errors->first('dobDay', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="dob" class="col-md-4 col-form-label"></label>
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="submit" name="submit"  value="Grade search execution" class="btn btn-primary text-right"/>
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
    </section>


@endsection


@push('style')
@endpush
@push('script')

@endpush
@include('notification.notify')
