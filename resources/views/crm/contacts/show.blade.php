@extends('layouts.base')

@section('caption', 'Information about contact')

@section('title', 'Information about contact')


@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <!-- will be used to show any messages -->
            @if(session()->has('message_success'))
                <div class="alert alert-success">
                    <strong>Well done!</strong> {{ session()->get('message_success') }}
                </div>
            @elseif(session()->has('message_danger'))
                <div class="alert alert-danger">
                    <strong>Danger!</strong> {{ session()->get('message_danger') }}
                </div>
            @endif
            <br/>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Basic information</a>
                        </li>
                        <div class="text-right">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                Delete this contact <li class="fa fa-trash-o"></li>
                            </button>
                        </div>

                    </ul>
                    <div class="tab-pane fade active in" id="home">
                        <h4></h4>

                        <table class="table table-striped table-bordered">
                            <tbody class="text-right">
                            <tr>
                                <th>Assigned client</th>
                                <td>{{ $contacts->client->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Assigned employee</th>
                                <td>{{ $contacts->employees->full_name  }}</td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td>{{ $contacts->client->phone  }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $contacts->client->email  }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $contacts->date }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">You want delete this contacts?</h4>
                </div>
                <div class="modal-body">
                    Action will delete permanently this contacts.
                </div>
                <div class="modal-footer">
                    {{ Form::open(array('url' => 'contacts/' . $contacts->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this contact', array('class' => 'btn btn-small btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection