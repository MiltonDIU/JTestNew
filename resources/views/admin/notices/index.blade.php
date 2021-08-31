@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Exam Notice</div>
        <div class="panel-body">

            <a href="{{ url('/' . Config("authorization.route-prefix") . '/notice/create') }}" class="btn btn-primary btn-xs" title="Add New Notice"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            <br/>
            <br/>
            <div class="table-responsive">

                <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Create Date</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($notices as $item)
                        <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->title}}</td>
    <td>{{$item->created_at}}</td>
    <td>{{$item->status}}</td>
    <td>{{$item->notice_category->title}}</td>
<td>
<a href="{{ url('/' . Config("authorization.route-prefix") . '/notice/' . $item->id) }}" class="btn btn-success btn-xs"
   title="View Notice"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>



<a href="{{ url('/' . Config("authorization.route-prefix") . '/notice/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
   title="Edit Notice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>



    {!! Form::open([
        'method'=>'DELETE',
        'url' => ['/' . Config("authorization.route-prefix") . '/notice', $item->id],
        'style' => 'display:inline'
    ]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Notice" />', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'title' => 'Delete Notice',
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