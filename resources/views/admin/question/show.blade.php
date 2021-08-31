@extends('layouts.master')
@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Title of Question:  {{ $question->title }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/' . Config("authorization.route-prefix") . 'question/' . $question->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Question"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/question/', $question->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Question',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Title of Question</th>
                                        <td>{{ $question->title }}</td>
                                    </tr>
                                    <tr>
                                        <th> Created Date </th>
                                        <td> {{ $question->created_at }} </td>
                                    </tr>
                                    <tr>
                                        <th> Details </th>
                                        <td> {!! $question->content !!} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection