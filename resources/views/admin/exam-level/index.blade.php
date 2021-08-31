@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Exam level</div>
        <div class="panel-body">
            <a href="{{ url('/admin/exam-level/create') }}" class="btn btn-success btn-sm" title="Add New ExamLevel">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

            <form method="GET" action="{{ url('/admin/exam-level') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
            </form>

            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>#</th><th>Title</th><th>Exam level code</th><th>Alias</th><th>Status</th><th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exam_level as $item)
                        <tr>
                            <td>{{ $loop->iteration or $item->id }}</td>
                            <td>{{ $item->title }}</td><td>{{ $item->exam_level_code }}</td><td>{{ $item->alias }}</td><td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ url('/admin/exam-level/' . $item->id) }}" title="View ExamLevel"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/admin/exam-level/' . $item->id . '/edit') }}" title="Edit ExamLevel"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/admin/exam-level' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete ExamLevel" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $exam_level->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>

@endsection

@include('notification.notify')