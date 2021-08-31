<div class="form-group {{ $errors->has('exam_level_id') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Exam Level', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('exam_level_id',$examLevels,null, ['class' => 'form-control', 'placeholder' => 'Select Exam Level', 'required'=>true ]) !!}
        {!! $errors->first('exam_level_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Exam Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title_code') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Exam Title Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title_code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
    {!! Form::label('alias', 'Alias', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_date') ? 'has-error' : ''}}">
    {!! Form::label('exam_date', 'Exam Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6 input-group date" id="datetimepicker2">
        {!! Form::text('exam_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exam_date', '<p class="help-block">:message</p>') !!}
        <span class="input-group-addon">
			<span class="glyphicon glyphicon-calendar"></span>
		</span>
    </div>
</div>

<div class="form-group {{ $errors->has('exam_duration') ? 'has-error' : ''}}">
    {!! Form::label('exam_duration', 'Exam Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('exam_duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exam_duration', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_venue') ? 'has-error' : ''}}">
    {!! Form::label('exam_venue', 'Exam Venue', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('exam_venue', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exam_venue', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_venue_code') ? 'has-error' : ''}}">
    {!! Form::label('exam_venue_code', 'Exam Venue Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('exam_venue_code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exam_venue_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--
<div class="form-group {{ $errors->has('exam_code') ? 'has-error' : ''}}">
    {!! Form::label('exam_code', 'Exam Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('exam_code', null, ['class' => 'form-control','id'=>'exam_schedule_code']) !!}
        <span class="help-block"> 1383890000 </span>
        {!! $errors->first('exam_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
--}}




<div class="form-group {{ $errors->has('admit') ? 'has-error' : ''}}">
    {!! Form::label('admit', 'Admit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($schedule)){
            if($schedule->admit == 1){
                $yes = true;
            }
            else  if($schedule->admit == 0){
                $no = true;
            }
        }
        ?>
        {!! Form::radio('admit', '1', $yes,['class' => 'col-md-1']) !!} <label class="col-md-2">Yes</label>
        {!! Form::radio('admit', '0', $no, ['class' => 'col-md-1']) !!} <label class="col-md-2">No</label>
        {!! $errors->first('admit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('if_refund') ? 'has-error' : ''}}">
    {!! Form::label('if_refund', 'Refund Policy Active This Exam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($schedule)){
            if($schedule->if_refund == 1){
                $yes = true;
            }
            else  if($schedule->if_refund == 0){
                $no = true;
            }
        }
        ?>
        {!! Form::radio('if_refund', '1', $yes,['class' => 'col-md-1']) !!} <label class="col-md-2">Yes</label>
        {!! Form::radio('if_refund', '0', $no, ['class' => 'col-md-1']) !!} <label class="col-md-2">No</label>
        {!! $errors->first('if_refund', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@push('scripts_plugins')
    <script src="{{url('assets/admin/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>

@endpush
@push('scripts')

    <script src="{{url('assets/date/moment-with-locales.js')}}"></script>
    <script src="{{url('assets/date/bootstrap-datetimepicker.js')}}"></script>


    <script>
        var FormInputMask = function () {
            var handleInputMasks = function () {
                $("#exam_schedule_code").inputmask("mask", {
                    "mask": "99999990000"
                }); //specifying fn & options
            };
            return {
                //main function to initiate the module
                init: function () {
                    handleInputMasks();
                }
            };
        }();
        if (App.isAngularJsApp() === false) {
            jQuery(document).ready(function() {
                FormInputMask.init(); // init metronic core componets
            });
        }
        $(function () {
            $('#datetimepicker2').datetimepicker({
                //daysOfWeekDisabled: [0, 6],
                //minDate:new Date(),
                format:'YYYY-MM-DD H:m:s',
            });
        });

        var convertName2Alias = function () {
            var title = $(this).val().trim().toLowerCase().replace(/\s+/g, '-');
            var alias = $('#alias').val();
            if (alias == '') {
                $('#alias').val(title);
            }
        };
        $(function () {
            $('#title').on('change', convertName2Alias);
        });
    </script>
@endpush

@push('styles')
    <link href="{{url('assets/date/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <style>
        .input-group[class*="col-"]{padding-left: 15px;
            padding-right: 15px;}
    </style>

@endpush
