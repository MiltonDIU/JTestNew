@extends('layouts.master')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Home Settings:  {{ $settings->title }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/' . Config("authorization.route-prefix") . '/settings/' . $settings->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Settings"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Site Title</th>
                                        <td>{{ $settings->title }}</td>
                                    </tr>
                                    <tr>
                                        <th> Logo </th>
                                        <td> <img src="{{url('uploads/logo/'.$settings->logo)}}" alt="logo"></td>
                                    </tr>
                                    <tr>
                                        <th> DIU Logo </th>
                                        <td><img src="{{url('uploads/logo/'.$settings->diu_logo)}}" alt="logo"></td>
                                    </tr>
                                    <tr>
                                        <th> DIIL Logo </th>
                                        <td> <img src="{{url('uploads/logo/'.$settings->diil_logo)}}" alt="logo"></td>
                                    </tr>
                                    <tr>
                                        <th> Signature </th>
                                        <td> <img src="{{url('uploads/signature/'.$settings->signature)}}" width="120" alt="logo"></td>
                                    </tr>

                                    <tr>
                                        <th> Home Content </th>
                                        <td> {!! $settings->content  !!} </td>
                                    </tr>

                                    <tr>
                                        <th> Copyright </th>
                                        <td> {{ $settings->copyright }} </td>
                                    </tr>
                                    <tr>
                                        <th>Powered </th>
                                        <td> {{ $settings->powered }} </td>
                                    </tr>
                                    <tr>
                                        <th> Meta Keyword </th>
                                        <td> {{ $settings->meta_keyword }} </td>
                                    </tr>
                                    <tr>
                                        <th> Meta Description </th>
                                        <td> {{ $settings->meta_description }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection
@push('scripts')
@endpush
