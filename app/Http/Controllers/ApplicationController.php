<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ojt;
use App\Department;
use Auth;
use App\Http\Requests\storeOjtRequest;

class ApplicationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['no'] = 1;
        $data['applicants'] = Ojt::with('department')->where('deploy', 0)->get();
        return view('applications.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::orderBy('name', 'asc')->get();
        return view('applications.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeOjtRequest $request)
    {
        $user = Auth::user();

        // dd($request->all());

        $ojt = $user->ojts()->create([
          'first_name'         => $request->first_name,
          'last_name'          => $request->last_name,
          'm_i'                => $request->m_i,
          'bday'               => $request->bday,
          'gender'             => $request->gender,
          'address'            => $request->address,
          'course'             => $request->course,
          'school'             => $request->school,
          'department_id'      => $request->department_id,
          'no_hrs'             => $request->no_hrs,
          'start_date'         => $request->start_date,
          'endo'               => $request->endo,
          'access_pass_app'    => $request->has('access_pass_app'),
          'school_endorsement' => $request->has('school_endorsement'),
          'brgy_police'        => $request->has('brgy_police'),
          'dole'               => $request->has('dole'),
          'cv'                 => $request->has('cv'),
          'pic2x2'             => $request->has('pic2x2')
        ]);

        return redirect()->route('applications.show', $ojt->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['applicant'] = Ojt::findOrFail($id);
        return view('applications.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['applicant'] = Ojt::findOrFail($id);
        $data['departments'] = Department::orderBy('name', 'asc')->whereNotIn('id', array($data['applicant']->department_id))->get();
        return view('applications.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //($request->has('published') ? true : false);
        $ojt                     = Ojt::findOrFail($id);
        $ojt->first_name         = $request->first_name;
        $ojt->last_name          = $request->last_name;
        $ojt->m_i                = $request->m_i;
        $ojt->bday               = $request->bday;
        $ojt->gender             = $request->gender;
        $ojt->address            = $request->address;
        $ojt->course             = $request->course;
        $ojt->school             = $request->school;
        $ojt->department_id      = $request->department_id;
        $ojt->no_hrs             = $request->no_hrs;
        $ojt->start_date         = $request->start_date;
        $ojt->endo               = $request->endo;
        $ojt->access_pass_app    = ($request->has('access_pass_app') ? true : false);
        $ojt->school_endorsement = ($request->has('school_endorsement') ? true : false);
        $ojt->brgy_police        = ($request->has('brgy_police') ? true : false);
        $ojt->dole               = ($request->has('dole') ? true : false);
        $ojt->cv                 = ($request->has('cv') ? true : false);
        $ojt->pic2x2             = ($request->has('pic2x2') ? true : false);
        $ojt->save();

        return redirect()->route('applications.show', $ojt->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ojt = Ojt::find($id);
        $ojt->delete();

        session()->flash('success', 'Success!');
        return redirect()->route('applications.index');
    }
}
