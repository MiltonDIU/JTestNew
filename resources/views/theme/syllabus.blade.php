@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12" >

                <div style="margin:0 auto;">
                     <h3 align="left"><strong>J.TEST Syllabus:</strong></h3>
		 
			<ul>
			    <li><a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/E-F-Syllabus-Listening.zip">E-F Syllabus Listening</a></li>  
			  <li><a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/J.Test%20A-D%20Level%20Syllabus.pdf" target="_blank">J.Test A-D Level Syllabus</a></li>  
			  <li><a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/J.Test%20E-F%20Level%20Syllabus.pdf" target="_blank">J.Test E-F Level Syllabus</a>          </li>
		  </ul>
                </div>
		 
		
              
            </div>
        </div>
    </div>


@endsection


@push('style')
        <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/dataTables.material.min.css')}}"/>
        <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
            .list-item-title{color: black; font-size: 14px}
    </style>
@endpush
@push('script')
    <script type="text/javascript" src="{{url('assets/datatable/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/datatable/js/dataTables.material.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
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
@include('notification.notify')