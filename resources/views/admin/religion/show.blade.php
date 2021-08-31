@extends('layouts.master')

@section('content')
   <div class="panel panel-default">
                    <div class="panel-heading">Religion {{ $religion->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/religion') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/religion/' . $religion->id . '/edit') }}" title="Edit Religion"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/religion' . '/' . $religion->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Religion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $religion->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $religion->title }} </td></tr><tr><th> Alias </th><td> {{ $religion->alias }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection
