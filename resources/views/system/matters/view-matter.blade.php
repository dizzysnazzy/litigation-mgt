@extends('system.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="sidebar-menu">
                <li class="header">Case NAVIGATION</li>

                <li>
                    <a href="/schooladmin/student/exams">
                        <i class="fa fa-tasks"></i> <span>Performance</span>
                    </a>
                </li>
                <li>
                    <a href="/system/matters/view">
                        <i class="fa fa-tasks"></i> <span>Finance</span>
                    </a>
                </li>
                <li>
                    <a href="/schooladmin/student/exams">
                        <i class="fa fa-tasks"></i> <span>Reports</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#case" data-toggle="tab">Case Profile</a></li>
                    <li><a href="#tasks" data-toggle="tab">Tasks</a></li>
                    <li><a href="#events" data-toggle="tab">Events</a></li>
                    <li><a href="#documents" data-toggle="tab">Documents</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="case">
                    <img src="/logo/kalya.png" style="border-radius: 50%;" width="150px">
                    <p class="text-info" style="font-size: 16px;border-bottom: 1px solid #eee;">File Info(Parties):</p>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Case Name</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->matter_name}}</p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Date of Instructions</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->file_date}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Counsel Incharge</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->counsel_incharge}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Opposing Counsel</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->opposing_counsel}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Case Type</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->matter_type}}</p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Clerk Incharge</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->clerk_incharge}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Case Status </label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->matter_status}}</p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Client Name</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->client_name}}</p>
                        </div>
                    </div>
                    <p class="text-info" style="font-size: 16px;border-bottom: 1px solid #eee;">Client Info:</p>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Client Name </label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->client_name}}</p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Client Phone No.</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->client_mobile}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Client Email </label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: {{$case->client_email}}</p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Permanent Address</label>
                        </div>
                        <div class="col-md-3">
                            <p for="">: </p>
                        </div>
                    </div>
            </div>
                <div class="tab-pane" id="tasks">
                    <a class="btn btn-success btn-lg pull-left" href="/system/tasks/{{$case->id}}/new">New Task</a>
                    <br><br><hr style="border-right: 1px solid #F20000;"></hr>

                    <div class="col-md-10">
                        <h4> <span class="badge custom-badge pull-left">Exam Details</span> </h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Unit Name</th>
                            <th>Unit Code</th>
                            <th>Term</th>
                            <th>Cat</th>
                            <th>End Term Score</th>
                            <th>Average</th>
                            </thead>
                            <tbody>

                        </table>
                    </div>
                    <p class="imondfont" align="justify">

                    </p>
                </div>

        </div>
    </div>
@endsection