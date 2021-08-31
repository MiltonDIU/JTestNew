@extends('theme.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3">
<a href="{{url('/result')}}">Search Again</a>
                <br>
<table>
    <tr>
        <td>Applicant Number :</td><td>{{ $row->student_id }}</td>
        </tr>
    @if($row->is_disqualified==1)
        <tr>
        <td>Score :</td><td>{{ $row->total_score }}</td>
        </tr>
    <tr>
        <td>Evaluation :</td><td>{{ $row->result }}</td>
    </tr>
    <tr>
        <td>Test Level :</td><td>{{ $row->test_level }}</td>
    </tr>
@else
        <tr>
            <td colspan="2"><p style="color: red">{!! $row->comment !!}</p></td>
        </tr>
        @endif
</table>
            </div>
        </div>
    </div>


@endsection


@push('style')
   <style>
        .header{position: relative; background:black}
        .main-elevated{margin-top:25px;}
        .logo_row{padding-bottom: 30px}
        .list-item-title{color: black; font-size: 14px}
    </style>
@endpush

@include('notification.notify')