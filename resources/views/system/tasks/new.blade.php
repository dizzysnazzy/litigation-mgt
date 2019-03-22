@extends('system.dashboard')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Task</li>
    </ol>
    </section>
    <div class="col-md-12">
        <div class="header header-primary text-center">
            <div class="logo-container">
                <img width="200px" src="/logo/kalya.png" class="kalya-logo" />
            </div>
            <hr>
            <p>
                New Task <br>
            </p>
        </div>

        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="/system/task/{{$case->id}}/new">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-2 control-label"> Task Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="first_name" value="{{ old('task_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Task Date</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="task_date" value="{{ old('task_date') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Task Description</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="task_description" value="{{ old('task_description') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </form>

    </div>
@endsection
