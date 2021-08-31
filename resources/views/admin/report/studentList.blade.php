@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Student List</div>
        <div class="panel-body">

            <p style="color: green;font-size: 20px;font-weight: bold">
                @if(Session::has('status'))
                    {{Session::get('status')}}
                @endif
            </p>
@if(isset($userSchedule[0]))
            <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/student-list-download/exam-level/".$userSchedule[0]->exam_level_id."/schedule/".$userSchedule[0]->schedule_id."/download") }}'>
               Seat Plan PDF
            </a>
                <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/signature-sheet/exam-level/".$userSchedule[0]->exam_level_id."/schedule/".$userSchedule[0]->schedule_id."/download") }}'>
                    Student Signature
                </a>

                <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/student-list-profile/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6).'/download') }}'>
                   Download Student Profile List
                </a>

                <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/student-list-admit/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6).'/download') }}'>
                   Download Admit
                </a>
                <button class="email_send_from btn btn-success">
                    Email Send
                </button>
 <a class="btn btn-success " href='{{ url("/" . Config("authorization.route-prefix") . "/list-of-examinees/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6).'/download') }}'>
                    List of examinees
                </a>

<!--
                <a class="btn btn-success  " href='{{ url("/" . Config("authorization.route-prefix") . "/email-send/exam-level/".Request::segment(4).'/schedule/'.Request::segment(6)) }}'>
                   Email Send
                </a>

                -->



    @else
    Not Data Found!
@endif

            <div class="email-send col-md-6">
                <br>
                <br>
                {!! Form::open([
                 'method' => 'post',
                 'url' => ['/' . Config("authorization.route-prefix") . '/email-send'],
                 'class' => 'form-horizontal',
                 'files' => false
             ]) !!}
                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                    {!! Form::label('subject', 'Subject', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('cosubjectntent', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                    {!! Form::label('message', 'Message', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                {!! Form::hidden('exam_level', Request::segment(4)) !!}
                {!! Form::hidden('schedule', Request::segment(6)) !!}

                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit("Send", ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>



            <div class="table-scrollable table-scrollable-borderless">

                @if(isset($userSchedule[0]))
    <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Paid</th>

                    @if(\App\Schedule::ifRefund($userSchedule[0]->schedule_id)==1)
                    <th>Refund</th>
@endif
                    <th>Photo</th>

                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($userSchedule as $student)
                <tr>
                    <td>{{$student->role_number}}</td>



                    <td><a href="{{ url('/' . Config("authorization.route-prefix") . '/profile/'.$student->user->id) }}" class="btn btn-success btn-xs"
                           title="View">{{$student->user->name}}</a></td>
                    <td>{{$student->user->email}}</td>
                    <td>{{$student->user->mobile}}</td>
                    <td>

{!! Form::open([
                 'method' => 'post',
                 'url' => ['/' . Config("authorization.route-prefix") . '/student-paid-status'],
                 'class' => 'form-horizontal',
                 'files' => false
             ]) !!}

{!! Form::hidden('id',$student->id) !!}
{!! Form::hidden('schedule_id',$student->schedule_id) !!}
{!! Form::hidden('exam_level_id',$student->exam_level_id) !!}
{!! Form::hidden('exam_code',$student->schedule->exam_code) !!}


                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit($student->status==1 ? "Yes" : "No", ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}
                    </td>
                    @if(\App\Schedule::ifRefund($userSchedule[0]->schedule_id)==1)
                    <td>
{{--                        Refund form --}}

                        @if($student->if_refund==0 and $student->if_next_exam==0)
                        {!! Form::open([
                                         'method' => 'post',
                                         'url' => ['/' . Config("authorization.route-prefix") . '/student-refund'],
                                         'class' => 'form-horizontal',
                                         'files' => false,
                                         'onsubmit' =>"return myFunction()"
                                     ]) !!}

                        {!! Form::hidden('id',$student->id) !!}
                        {!! Form::hidden('schedule_id',$student->schedule_id) !!}
                        {!! Form::hidden('exam_level_id',$student->exam_level_id) !!}
                        {!! Form::hidden('exam_code',$student->schedule->exam_code) !!}
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit("Refund", ['class' => 'btn btn-primary'])  !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
{{--                        end refund form--}}

                        ||
{{--                        next exam button--}}
                        <button type="button" data-id="{{$student->id}}" class="btn btn-success openBtn">next exam</button>

{{--                    end next exam button--}}
                        @else
                            @if($student->if_next_exam!=0)
                                Student take next exam
                                @else
                                Student take refund
                                @endif
                        @endif

                    </td>






                    @endif
                    <td><img width="50" src="{{url('uploads/avatar/'.$student->user->profile->avatar)}}" alt="{{$student->role_number}}"> </td>

                 <?php /*?>   <td>
                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/profile/'.$student->user->id.'/exam-level/'.$student->exam_level_id.'/schedule/'.$student->schedule_id.'/download') }}" class="btn btn-success btn-xs"
                           title="View">Download</a>

                    </td>
<?php */?>
                    <td>
                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/profile/'.$student->user->id) }}" class="btn btn-success btn-xs"
                           title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/profile/' . $student->user->id . '/edit') }}" class="btn btn-primary btn-xs"
                           title="Edit Pofile"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>


                    </td>
                </tr>
@endforeach

                </tbody>
            </table>

                @endif


    </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal with Dynamic Content</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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
        $('.openBtn').on('click',function(){
            var id = $(this).attr('data-id');
            var url ="http://localhost:8000/next-exam/"+id;
            $('.modal-body').load(url,function(){
                $('#myModal').modal({show:true});
            });
        });
    </script>

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
            var user_id = $(this).data("user_id");
            $.ajax({
                method:"post",
                url:'/admin/student-paid-status',
                data:{
                    'user_id':user_id,
                },
                dataType:"text",
                success:function (data) {
                    console.log(data);
                    $('.status').html("No");
                    $('#status'+user_id).html("Yes");
                }
            });
            //$(this).closest('tr').remove();
        })

        $(document).ready(function(){
            $(".email_send_from").click(function(){
                $(".email-send").toggle("slow");
            });
        });

    </script>

    <script>
        function myFunction() {
            var inputValue = prompt("Are you sure refund this student?, please type 'refund':", "");
            if (inputValue == "refund") {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endpush