<div class="form-group {{ $errors->has('notice_category_id') ? 'has-error' : ''}}">
    {!! Form::label('notice_category_id', 'Notice Category', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-5">
        {!! Form::select('notice_category_id', $notice_categories, null, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('notice_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Notice Title', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
    {!! Form::label('alias', 'Alias', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($notice)){
            if($notice->status == 1){
                $yes = true;
            }
            else  if($notice->status == 0){
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('scripts')

    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script>
        $('textarea').ckeditor({
            language:'es',
            height :200,
        toolbarCanCollapse : true,
            extraPlugins : 'justify',
           /* allowedContent: {
                'p h1': {
                    styles: 'text-align'
                },
                a: {
                    attributes: '!href'
                },
                'strong em': true,
                p: {
                    classes: 'tip'
                }
            },
            disallowedContent:'br'*/
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
