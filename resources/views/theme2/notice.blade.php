@extends('theme2.master')

@section('content')
    @include('theme2.partials.hero',['page'=>'Notice'])
    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">



            <table id="example" class="mdl-data-table table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Create Date</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($notices as $key=> $item)

                            <tr>
                                <td>{{$key+1}}</td>
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
    </section>


@endsection


@push('style')
        <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/dataTables.material.min.css')}}"/>
        <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
            .list-item-title{color: black; font-size: 14px}
        body, html{font-size: inherit!important;}
        .breadcrumb-item {font-size: 32px!important;}
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
