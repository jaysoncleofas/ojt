<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ojt;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function departments()
    {
        $departments = DB::table('departments')->select('id', 'name')->get();
        $no = 1;
        return view('departments', compact('departments'))->withNumber($no);
    }

    public function applications()
    {
        $data['applicants'] = Ojt::with('department')->latest()->get();
        return view('applications', $data);
    }
}
