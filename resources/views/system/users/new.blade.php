@extends('system.dashboard')

@section('content')
<div class="col-md-10 col-md-offset-1 content-center">
    <div class="">
        <form class="form" method="POST" action="/system/new_user">
          {{ csrf_field() }}
            <div class="header header-primary text-center">
                <div class="logo-container">
                    <img width="200px" src="/logo/kalya.png" class="kalya-logo" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name..." required>
                </div>
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons text_caps-small"></i>
                    </span>
                    <input type="text" name="last_name" placeholder="Last Name..." class="form-control" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                    <input type="text" name="category_of_freelance" class="form-control" placeholder="Category of Freelance...">
                </div>
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons text_caps-small"></i>
                    </span>
                    <input type="number" name="years_of_experience" placeholder="experience..." class="form-control" / required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="col-md-6 input-group form-group-no-border input-lg">
                    <span class="input-group-addon">
                        <i class="now-ui-icons text_caps-small"></i>
                    </span>
                    <input type="text" name="phone" placeholder="Phone Number...." class="form-control" required>
                </div>
            </div>
            <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block"> Apply</button>
            </div>
        </form>
    </div>
</div>
@endsection
