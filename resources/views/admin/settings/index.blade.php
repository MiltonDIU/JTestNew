@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Exam Schedules</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                    <tr>

                        <th> Title</th>

                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $item)
                        <tr>

                            <td>{{ $item->title }}</td>

                            <td>
                                <a href="{{ url('/' . Config("authorization.route-prefix") . '/settings/' . $item->id) }}" class="btn btn-success btn-xs"
                                   title="View Settings"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                <a href="{{ url('/' . Config("authorization.route-prefix") . '/settings/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                                   title="Edit Settings"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                @if($item->id > 2)
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/' . Config("authorization.route-prefix") . '/settings', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Exam Settings" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Settings',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).on('click','.status',function () {


            var idea_id = $(this).data("idea_id");
            $.ajax({
                method:"post",
                url:'/admin/exam-schedule-status',
                data:{
                    'idea_id':idea_id,
                },
                dataType:"text",
                success:function (data) {
                    //console.log(data);
                    $('.status').html("Not Active");
                    $('#status'+idea_id).html("Active");
                }
            });
            //$(this).closest('tr').remove();
        })

    </script>
    @endpush

@include('notification.notify')