@extends('theme2.master')

@section('content')
    <!-- Hero -->
        @include('theme2.breadcrumb',['page'=>'J.TEST Syllabus'])
    <section class="page-section" style="padding-top: 8rem;">
        <div class="container">
            <div class="row justify-content-center align-items-center">


                    <p style="text-align: center"><a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/E-F-Syllabus-Listening.zip">E-F Syllabus Listening</a> |
                        <a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/J.Test%20A-D%20Level%20Syllabus.pdf" target="_blank">J.Test A-D Level Syllabus</a> |
             <a href="https://daffodilvarsity.edu.bd/sub/dil/pdf/J.Test%20E-F%20Level%20Syllabus.pdf" target="_blank">J.Test E-F Level Syllabus</a>          </p>


            </div>
        </div>
    </section>
@endsection
@push('style')
    <style>

    </style>

@endpush

@include('notification.notify')
