<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $contact->name ?? ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $contact->email ?? ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="col-md-4 control-label">{{ 'Mobile' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="mobile" type="text" id="mobile" value="{{ $contact->mobile ?? ''}}" >
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
    <label for="designation" class="col-md-4 control-label">{{ 'Designation' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ $contact->designation ?? ''}}" >
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('avatar') ? 'has-error' : ''}}">

    {!! Form::label('result', 'Contact Person Pic', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        <label class="file" title="">
            <input type="file" value="{{ $contact->avatar ?? ''}}" name="avatar" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
        </label>
    </div>
</div>




<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ $contact->address ?? ''}}</textarea>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
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
    </style>
@endpush
