@extends('layouts.master')

@section('content')

 <div class="panel panel-default">
                    <div class="panel-heading">Result</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/result/create') }}" class="btn btn-success btn-sm" title="Add New Result">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table id="result" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Level</th>
                                        <th>Total Score</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                               <tr>
                                   <td>{{$result->student_id}}</td>
                                   <td>{{$result->name}}</td>
                                   <td>{{$result->dob_day}}/{{$result->dob_month}}/{{$result->dob_year}}</td>
                                   <td>{{$result->test_level}}</td>
                                   <td>{{$result->total_score}}</td>
                                   <td>{{$result->result}}</td>
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
@endpush
@push('scripts')
    <script type="text/javascript" src="{{url('assets/datatable/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/datatable/js/dataTables.material.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#result').DataTable( {
                columnDefs: [
                    {
                        targets: [ 0, 1, 2 ],
                        className: 'mdl-data-table__cell--non-numeric',

                    }
                ],
                "order": [[ 2, 'desc' ]]

            } );
        } );
    </script>
@endpush