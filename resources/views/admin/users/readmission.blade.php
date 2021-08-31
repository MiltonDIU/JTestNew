@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Student List</div>
        <div class="panel-body">
            <div class="table-scrollable table-scrollable-borderless">
                <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Identity Number</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Photo</th>
                        <th>Readmission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $student)
                        <tr>
                            <td>{{$student->profile->identity}}</td>
                            <td><a href="{{ url('/' . Config("authorization.route-prefix") . '/profile/'.$student->id) }}" class="btn btn-success btn-xs"
                                   title="View">{{$student->name}}</a></td>
                            <td>{{$student->mobile}}</td>
                            <td><img width="50" src="{{url('uploads/avatar/'.$student->profile->avatar)}}" alt="{{$student->profile->role_number}}"> </td>

<td>
    {!! Form::open(['url' => '/readmission', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::select('exam_level_id', $examLevels, null, ['placeholder' => 'Please select ...', 'class' => 'form-control exam_level_id', 'required' => 'required','rel'=>$student->id]) !!}
        {!! $errors->first('exam_level_id', '<p class="help-block">:message</p>') !!}
    </div>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="form-group">
        {!! Form::select('schedule_id',[], null, ['class' => 'form-control','id'=>'schedule_id'.$student->id,'required' => 'required','placeholder'=>'Select Exam Level']) !!}
        {!! $errors->first('schedule_id', '<p class="help-block">:message</p>') !!}
    </div>
    &nbsp;
    &nbsp;
    {!! Form::hidden('user_id', $student->id, ['class' => 'form-control']);!!}

    <button type="submit" class="btn btn-default">Submit</button>

    {{Form::close()}}
</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@include('notification.notify')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/dataTables.material.min.css')}}"/>

    <style>

        .email-send{display: none}
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
        $('.exam_level_id').change(function(){
            var exam_level_id = $(this).val();
            var student_id = $(this).attr('rel');
            var schedule_id = "#schedule_id"+student_id;
            console.log(student_id);
            if(exam_level_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-schedule')}}/"+exam_level_id,
                    success:function(res){
                        if(res){
                            console.log(res);
                            if (res.length != 0){
                                $(schedule_id).empty();
                            }else {
                                $(schedule_id).empty();
                                $(schedule_id).append('<option value="">Select another exam level</option>')
                            }
                            $.each(res,function(key,value){
                                $(schedule_id).append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    }
                });
            }
        });
    </script>
@endpush