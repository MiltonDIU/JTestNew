<div class="form-group {{ $errors->has('gallery_category_id') ? 'has-error' : ''}}">
    {!! Form::label('gallery_category_id', 'Gallery Category', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-5">
        {!! Form::select('gallery_category_id', $gallery_categories, null, ['placeholder' => 'Please select ...', 'class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('gallery_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Gallery Title', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group{{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'Select Image', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" value="{{ $result->result_file ?? ''}}" name="url" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
        </label>
        @if ($errors->has('url'))
        <span class="help-block">
            {{ $errors->first('url') }}
        </span>
        @endif
    </div>
</div>






<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Is Active', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <?php
        $yes=$no='';
        if(isset($gallery)){
            if($gallery->is_active == 1){
                $yes = true;
            }
            else  if($gallery->is_active == 0){
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
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
