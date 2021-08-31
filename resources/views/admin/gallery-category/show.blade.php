@extends('layouts.master')

@section('content')
   <div class="panel panel-default">
                    <div class="panel-heading">Notice Category : {{ $galleryCategory->title }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/gallery-category') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/gallery-category/' . $galleryCategory->id . '/edit') }}" title="Edit NoticeCategory"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/gallery-category' . '/' . $galleryCategory->id) }}" accept-charset="UTF-8" style="display:inline">
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
                                        <th>ID</th><td>{{ $galleryCategory->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Image</th><td>{{ $galleryCategory->gallery->count() }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $galleryCategory->title }} </td></tr><tr><th> Alias </th><td> {{ $galleryCategory->slug }} </td></tr><tr><th> Is Active </th>
                                        <td> {{ $galleryCategory->is_active?"Yes":"No" }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            @foreach($galleryCategory->gallery as $gallery)

                                <div class="col-md-2">
                                    <img style="width: 100%" src="{{url($gallery->url)}}" alt="{{$gallery->title}}">
                                </div>
                                @endforeach
                        </div>

                    </div>
                </div>

@endsection
