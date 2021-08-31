<?php /*?>
<div class="form-group {{ $errors->has('schedule_id') ? 'has-error' : ''}}">
    {!! Form::label('schedule_id', 'Exam Schedule', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-5">
        {!! Form::select('schedule_id', $schedules, null, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('schedule_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php */?>

<div class="form-group{{ $errors->has('result_file') ? 'has-error' : ''}}">

    {!! Form::label('result', 'Result File', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" value="{{ $result->result_file or ''}}" name="result_file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
        </label>
        @if ($errors->has('result_file'))
            <span class="help-block">
                                        {{ $errors->first('result_file') }}
                                    </span>
        @endif
    </div>
</div>
<?php /*?>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($result)){
            if($result->status == 1){
                $yes = true;
            }
            else  if($result->status == 0){
                $no = true;
            }
        }
        ?>
        {!! Form::radio('status', '1', $yes,['class' => 'col-md-1']) !!} <label class="col-md-2">Yes</label>
        {!! Form::radio('status', '0', $no, ['class' => 'col-md-1']) !!} <label class="col-md-2">No</label>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
 <?php */?>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Upload' }}">
    </div>
</div>

@push('styles')
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
.help-block{color: darkred}
    </style>
@endpush
@include('notification.notify')