<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $galleryCategory->title ?? ''}}" >
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="alias" class="col-md-4 control-label">{{ 'Alias' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ $galleryCategory->slug ?? ''}}" >
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    {!! Form::label('is_active', 'Is Active', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($galleryCategory)){
            if($galleryCategory->is_active == 1){
                $yes = true;
            }
            else  if($galleryCategory->is_active == 0){
                $no = true;
            }
        }
        ?>
        {!! Form::radio('is_active', '1', $yes,['class' => 'col-md-1']) !!} <label class="col-md-2">Yes</label>
        {!! Form::radio('is_active', '0', $no, ['class' => 'col-md-1']) !!} <label class="col-md-2">No</label>
        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>



@push('scripts')
    <script>
        //title and name convert to slug value auto
        $(document).ready(function(){
            $("#name").keyup(function(e){
                var name = $(this).val().trim().toLowerCase().replace(/\s+/g, '-').replace(/\//g,'-');

                $('#slug').val(name);
            });
            $("#title").keyup(function(e){

                var title = $(this).val().trim().toLowerCase().replace(/\s+/g, '-').replace(/\//g,'-');
                $('#slug').val(title);
            });
        });
    </script>
@endpush
