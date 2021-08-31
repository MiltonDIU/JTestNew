@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Exam Level {{ $exam_level->id }}</div>
        <div class="panel-body">

            <a href="{{ url('/admin/exam-level') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/exam-level/' . $exam_level->id . '/edit') }}" title="Edit ExamLevel"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

            <form method="POST" action="{{ url('admin/exam-level' . '/' . $exam_level->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-xs" title="Delete ExamLevel" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
            </form>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>ID</th><td>{{ $exam_level->id }}</td>
                    </tr>
                    <tr>
                        <th> Title </th>
                        <td> {{ $exam_level->title }} </td>
                    </tr>
                    <tr>
                        <th> Exam level code </th>
                        <td> {{ $exam_level->exam_level_code }} </td>
                    </tr>
                    <tr>
                        <th> Alias </th>
                        <td> {{ $exam_level->alias }} </td>
                    </tr>
                    <tr>
                        <th> Status </th>
                        <td> {{ $exam_level->status }} </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
