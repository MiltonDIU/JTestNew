@extends('theme2.master')

@section('content')

    @include('theme2.breadcrumb',['page'=>'Result Details'])

    <section class="page-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
            <a href="{{url('/result')}}">Search Again</a>
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-bordered">
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
        </section>

@endsection


@push('style')
@endpush

@include('notification.notify')
