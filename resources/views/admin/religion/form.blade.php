<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $religion->title or ''}}" >
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('alias') ? 'has-error' : ''}}">
    <label for="alias" class="col-md-4 control-label">{{ 'Alias' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="alias" type="text" id="alias" value="{{ $religion->alias or ''}}" >
        {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
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

@include('notification.notify')