@extends('layouts.master')
@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Title of Exam Schedule:  {{ $schedule->title }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule/' . $schedule->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Role"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/schedule', $schedule->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Schedule',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Exam Date</th>
                                        <td>{{ $schedule->exam_date }}</td>
                                    </tr>
                                    <tr>
                                        <th> Exam Duration </th>
                                        <td> {{ $schedule->exam_duration }} </td>
                                    </tr>
                                    <tr>
                                        <th> Exam Venue </th>
                                        <td> {{ $schedule->exam_venue }} </td>
                                    </tr>
                                    <tr>
                                        <th> Admit Card </th>
                                        <td> {{ $schedule->admit }} </td>
                                    </tr>
                                    <tr>
                                        <th> Total Registration for this Exam </th>
                                        <td> {{ $schedule->user_schedule->count() }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection