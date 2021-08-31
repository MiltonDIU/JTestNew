@extends('layouts.master')
@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Title of Gallery:  {{ $gallery->title }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/' . Config("authorization.route-prefix") . 'gallery/' . $gallery->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Gallery"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/gallery', $gallery->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Gallery',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Title of Gallery</th>
                                        <td>{{ $gallery->title }}</td>
                                    </tr>
                                    <tr>
                                        <th> Created Date </th>
                                        <td> {{ $gallery->created_at }} </td>
                                    </tr>
                                    <tr>
                                        <th> Details </th>
                                        <td> {!! $gallery->content !!} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection