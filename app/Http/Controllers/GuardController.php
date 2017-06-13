<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Validation\Rule;


class GuardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guards = User::all();
        return view('guard.index')->withGuards($guards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:6|max:191',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:191'
        ]);
        Session::flash('success','New Guard Added Successfully');
        $guard = new User;
        $guard->name = $request->name;
        $guard->email = $request->email;
        $guard->password = Hash::make($request->password);
        $guard->save();
        return view('guard.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guard = User::find($id);

        return view('guard.edit')->withGuard($guard);
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



        $this->validate($request,[
          'name'=>'required|min:6|max:191',
          'email' => Rule::unique('users')->ignore($id),
          'password'=>'required|min:6|max:191'
        ]);

        $guard = User::find($id);
        $guard->name = $request->name;
        $guard->email = $request->email;
        $guard->password = Hash::make($request->password);
        $guard->save();
        $guards = User::all();
        return view('guard.index')->withGuards($guards);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guard = User::find($id);
        $guard->delete();

        Session::flash('success','Guard Success Deleted');
        return redirect()->route('guard.index');
    }
}
