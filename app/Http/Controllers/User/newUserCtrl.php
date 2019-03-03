<?php

namespace fms\Http\Controllers\User;

use Illuminate\Http\Request;
use fms\Http\Controllers\Controller;
use fms\Profile;

class newUserCtrl extends Controller
{
    public function newUser()
    {
        return view('system.users.new');
    }
}
