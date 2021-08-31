@extends('layouts.master')
@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Title of Notice:  {{ $notice->title }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/notice/' . $notice->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit notice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/notice', $notice->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Notice',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Title of Notice</th>
                                        <td>{{ $notice->title }}</td>
                                    </tr>
                                    <tr>
                                        <th> Created Date </th>
                                        <td> {{ $notice->created_at }} </td>
                                    </tr>
                                    <tr>
                                        <th> Details </th>
                                        <td> {!! $notice->content !!} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection