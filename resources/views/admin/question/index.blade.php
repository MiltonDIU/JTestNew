@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Exam Question</div>
        <div class="panel-body">

            <a href="{{ url('/' . Config("authorization.route-prefix") . '/question/create') }}" class="btn btn-primary btn-xs" title="Add New Question"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            <br/>
            <br/>
            <div class="table-responsive">

                <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($questions  as $item)
                        <tr>
    <td>{{$item->id}}</td>
    <td>
        <a target="_blank" href="{{url($item->question_url?"$item->question_url":"")}}">{{$item->question_title}}</a> |
        <a target="_blank" href="{{url($item->listening_url?"$item->listening_url":"")}}">{{$item->listening_title}}</a>|
        <a target="_blank" href="{{url($item->answer_url?"$item->answer_url":"")}}">{{$item->answer_title}}</a>
    </td>
    <td>{{$item->is_active}}</td>

<td>
{{--<a href="{{ url('/' . Config("authorization.route-prefix") . 'question/' . $item->id) }}" class="btn btn-success btn-xs"--}}
   {{--title="View Question"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>--}}



<a href="{{ url('/' . Config("authorization.route-prefix") . '/question/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
   title="Edit Question"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>



    {!! Form::open([
        'method'=>'DELETE',
        'url' => ['/' . Config("authorization.route-prefix") . '/question', $item->id],
        'style' => 'display:inline'
    ]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Question" />', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'title' => 'Delete Question',
            'onclick'=>'return confirm("Confirm delete?")'
    )) !!}
    {!! Form::close() !!}

</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/dataTables.material.min.css')}}"/>
    <style>

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{url('assets/datatable/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/datatable/js/dataTables.material.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                columnDefs: [
                    {
                        targets: [ 0, 1, 2 ],
                        className: 'mdl-data-table__cell--non-numeric'
                    }
                ],
                "order": [[ 2, 'desc' ]]
            } );
        } );
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