@extends('layouts.master')

@section('content')
   <div class="panel panel-default">
                    <div class="panel-heading">Contact {{ $contact->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/contact') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/contact/' . $contact->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/contact' . '/' . $contact->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contact->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $contact->name }} </td></tr><tr><th> Email </th><td> {{ $contact->email }} </td></tr><tr><th> Mobile </th><td> {{ $contact->mobile }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection
