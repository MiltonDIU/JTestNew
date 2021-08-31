@extends('layouts.master')

@section('content')
   <div class="panel panel-default">
                    <div class="panel-heading">Notice Category {{ $noticecategory->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/notice-category') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/notice-category/' . $noticecategory->id . '/edit') }}" title="Edit NoticeCategory"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/notice-category' . '/' . $noticecategory->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete NoticeCategory" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $noticecategory->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $noticecategory->title }} </td></tr><tr><th> Alias </th><td> {{ $noticecategory->alias }} </td></tr><tr><th> Status </th><td> {{ $noticecategory->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection
