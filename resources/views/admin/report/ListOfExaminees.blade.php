@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Student List</div>
        <div class="panel-body">



            <div class="table-scrollable table-scrollable-borderless">


                <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Registration Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>English</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Country</th>
                        <th>Identification Card No.</th>
                    </tr>
                    </thead>
<?php $i=1;?>
                    <tbody>
                    @foreach($studentLists as $student)
                        @php
                            $date = new \Carbon\Carbon($student->user->profile->dob);
                        @endphp
                      <tr>
                          <td>
                              {{$student->role_number}}
                          </td>
                          <td>
                              {{$student->user->name}}
                          </td>
                          <td>
                              {{$student->user->email}}
                          </td>
                          <td>
                              {{$student->user->mobile}}
                          </td>
                          <td>
                              {{strtoupper($student->user->name)}}
                          </td>

                          <td>{{  $date->year   }}</td>
                          <td>{{  $date->month   }}</td>
                          <td>{{  $date->day   }}</td>

                          <td>
                              {{$student->user->profile->nationality}}
                          </td>

                          <td>
                              {{$student->user->profile->identity}}
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>


@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('assets/datatable/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/datatable/js/dataTables.material.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            } );
        } );

    </script>
@endpush