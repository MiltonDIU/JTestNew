@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                    <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Create Date</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($notices as $item)

                            <tr>
                                <td>{{$item->id}}</td>
                                <td> <a class="list-item-title" href="{{ url('notice/details/' . $item->id.'/'.$item->alias) }}">
                                        {{$item->title}}
                                    </a></td>
                                <td>{{$item->notice_category->title}}</td>
                                <td>
                                    {{$item->created_at->format('d M Y, h:i:s')}}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>



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
                "order": [[ 3, 'desc' ]]

            } );
        } );
        </script>
@endpush
@include('notification.notify')