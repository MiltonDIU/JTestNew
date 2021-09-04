<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
{{--        <input class="form-control" name="title" type="text" id="title" value="{{ $exam_level ?? ''->title or ''}}" >--}}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
    <label for="alias" class="col-md-4 control-label">{{ 'Alias' }}</label>
    <div class="col-md-6">
{{--        <input class="form-control" name="alias" type="text" id="alias" value="{{ $exam_level ?? ''->alias or ''}}" >--}}
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_level_code') ? 'has-error' : ''}}">
    <label for="alias" class="col-md-4 control-label">{{ 'Exam Level Code' }}</label>
    <div class="col-md-6">
{{--        <input class="form-control" name="exam_level_code" type="text" id="exam_level_code" value="{{ $exam_level ?? ''->exam_level_code or ''}}" >--}}
        {!! Form::text('exam_level_code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exam_level_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Published', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($exam_level)){
            if($exam_level->status == 1){
                $yes = true;
            }
            else  if($exam_level->status == 0){
                $no = true;
            }
        }
        ?>
        {!! Form::radio('status', '1', $yes,['class' => 'col-md-1']) !!} <label class="col-md-2">Yes</label>
        {!! Form::radio('status', '0', $no, ['class' => 'col-md-1']) !!} <label class="col-md-2">No</label>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>


@push('scripts')
    <script>
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
