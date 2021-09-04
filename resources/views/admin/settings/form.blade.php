<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Site Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Home Content', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::textarea('content', null, ['id'=>'textarea','class' => 'form-control','rows' => '5']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('meta_keyword') ? 'has-error' : ''}}">
    {!! Form::label('meta_keyword', 'Meta Keyword', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('meta_keyword', null, ['class' => 'form-control','rows' => '5']) !!}
        {!! $errors->first('meta_keyword', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : ''}}">
    {!! Form::label('meta_description', 'Meta Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('meta_description', null, ['class' => 'form-control','rows' => '5']) !!}
        {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('copyright') ? 'has-error' : ''}}">
    {!! Form::label('copyright', 'Copyright', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('copyright', null, ['class' => 'form-control']) !!}
        {!! $errors->first('copyright', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('powered') ? 'has-error' : ''}}">
    {!! Form::label('powered', 'Powered', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('powered', null, ['class' => 'form-control']) !!}
        {!! $errors->first('powered', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('powered', 'J-Test Logo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" name="logo" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

        </label>
    </div>
</div>

<div class="form-group">
    {!! Form::label('powered', 'DIU Logo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" name="diu_logo" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

        </label>
    </div>
</div>
<div class="form-group">
    {!! Form::label('powered', 'DIIL Logo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" name="diil_logo" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />

        </label>
    </div>
</div>



<div class="form-group">

    {!! Form::label('powered', 'Signature', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" name="signature" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
        </label>
    </div>
</div>

<div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    {!! Form::label('contact', 'Contact Us', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::textarea('contact', null, ['id'=>'textarea2','class' => 'form-control','rows' => '5']) !!}
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('admit_message') ? 'has-error' : ''}}">
    {!! Form::label('admit_message', 'Admit Card Message', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::textarea('admit_message', null, ['id'=>'admit_message','class' => 'form-control','rows' => '5']) !!}
        {!! $errors->first('admit_message', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#textarea2' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#admit_message' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endpush


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
        </style>
    @endpush


