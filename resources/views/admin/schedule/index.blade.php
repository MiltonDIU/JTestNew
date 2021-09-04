@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Exam Schedules</div>
        <div class="panel-body">

            <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule/create') }}" class="btn btn-primary btn-xs" title="Add New Role"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            <br/>
            <br/>
            <div class="table-responsive">

                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th> Title</th>
                        <th> Exam Level</th>
                        <th> Exam Date</th>
                        <th> Student</th>
                        <th> Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->exam_level->title }}</td>
                            <td>{{ $item->exam_date }}</td>
                            <td>

{{--@foreach($exam_level as $exam)
    <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/report/exam-level/$exam->id/schedule/$item->id/$item->alias") }}'>
    {{$exam->title}}({{ $item->user_schedule->where('exam_level_id',$exam->id)->count() }})
    </a>
@endforeach--}}

    <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/report/exam-level/$item->exam_level_id/schedule/$item->id/$item->alias") }}'>
        {{$item->exam_level->title}}({{ $item->user_schedule->where('exam_level_id',$item->exam_level_id)->count() }})
    </a>

                                @if($item->user_schedule->where('exam_level_id',$item->exam_level_id)->count()>50)

                                <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/report/exam-level/$item->exam_level_id/schedule/$item->id/$item->alias/admit-and-profile") }}'>
                                   Admit and Profile
                                </a>
@endif



                            </td>
                            <td>
<button id="status{{$item->id}}" type="button" name="status"  data-idea_id="{{$item->id}}" class="btn btn-xs btn-info status">

    @if($item->status==1)
        Active
        @else
    Not Active
        @endif
</button>
                            </td>

                            <td>
                                <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule/' . $item->id) }}" class="btn btn-success btn-xs"
                                   title="View Role"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                <a href="{{ url('/' . Config("authorization.route-prefix") . '/schedule/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                                   title="Edit Role"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>


                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/' . Config("authorization.route-prefix") . '/schedule', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Exam Schedule" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Schedule',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{ $schedules->links() }}
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).on('click','.status',function () {
            var idea_id = $(this).data("idea_id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:"post",
                url:'/admin/exam-schedule-status',
                data:{
                    'idea_id':idea_id,
                },
                dataType:"text",
                success:function (data) {
                    //console.log(data);
                    //$('.status').html("Not Active");
                    $('#status'+idea_id).html(data);
                }
            });
            //$(this).closest('tr').remove();
        })
    </script>
    @endpush

@include('notification.notify')
