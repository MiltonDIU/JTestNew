@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
                    <div class="panel-heading">Result {{ $result->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/result') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/result/' . $result->id . '/edit') }}" title="Edit Result"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/result' . '/' . $result->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Result" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>

                                    <tr><th> Schedule </th><td> {{ $result->schedule->title }} </td>
                                    </tr><tr><th> Result File </th>

                                        <td >
                                            <object data="{{url('uploads/results/'.$result->result)}}" type="application/pdf" width="100%" height="500px">



                                                <a href="{{url('uploads/results/'.$result->result)}}">Downloads</a>

                                            </object>


                                        </td></tr>



                                    <tr><th> Status </th><td> {{ $result->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
