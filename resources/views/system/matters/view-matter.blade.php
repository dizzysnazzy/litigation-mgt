@extends('system.dashboard')

@push('js')
    <script src="{{ asset('fullcalendar/packages/core/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/packages/daygrid/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->task_name }}',
                        start : '{{ $task->task_date }}'
                    },
                    @endforeach
                ]
            })
        });
    </script>
@endpush
@push('css')
    <link href="{{ asset('fullcalendar/packages/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('fullcalendar/packages/daygrid/main.css') }}" rel='stylesheet' />
@endpush

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
                    <a class="btn btn-success btn-lg pull-left" href="/system/task/{{$case->id}}/new">New Task</a>
                    <br><br><hr style="border-right: 1px solid #F20000;"></hr>

                    <div class="col-md-10">
                        <div id='calendar'></div>
                    </div>
                </div>

        </div>
    </div>
@endsection