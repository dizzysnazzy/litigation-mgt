<?php

namespace fms\Http\Controllers;

use Illuminate\Http\Request;
use fms\Profile;

class MatterCtrl extends Controller
{
    public function index()
    {
        $advocates = Profile::where('designation', 'advocate')->get();

        return view('system.matters.new', compact('advocates'));
    }

    public function newMatter(Request $request)
    {

    }
}
