@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
                    <div class="panel-heading">Edit Gallery Category #{{ $galleryCategory->tilte }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/gallery-category') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/gallery-category/' . $galleryCategory->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.gallery-category.form', ['submitButtonText' => 'Update'])

                        </form>

                    </div>
                </div>

@endsection
