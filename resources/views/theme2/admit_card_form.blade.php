@extends('theme2.master')

@section('content')

    @include('theme2.partials.hero',['page'=>'Admit Card'])
    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                @if(Session::has('notification'))
                    <div class="alert alert-info fade in alert-dismissable">
                        {{Session::get('notification.message')}}
                    </div>
@endif
                    {!! Form::open(['url' => '/admit-download', 'class' => 'col-sm-8 col-md-8 mt-6', 'files' => true]) !!}
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
                        <div class="form-group col-md-2 col-sm-12">
                            <label for="inputZip">Day</label>

                            {!! Form::text('dobDay', null, ['class' => 'form-control','id'=>'dobDay']) !!}
                            {!! $errors->first('dobDay', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <br>
                    <div class="row pd-30">
                        <label for="submit" class="col-md-4 col-form-label"></label>
                        <div class="form-group col-md-8 col-sm-12">
                            <input type="submit" name="submit"  value="Admit Card Download" class="btn col-sm-12 btn-primary mb-3"/>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endpush
@include('notification.notify')
