<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Visitor;

use Session;
class VisitorController extends Controller
{

    public function index()
    {
        $visitors = Visitor::orderBy('id','desc')->paginate(10);
        return view('visitor.index')->withVisitors($visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.create');
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
          'first_name'=>'required|min:2|max:191',
          'last_name'=>'required|min:2|max:191',
          'contact_num'=>'required|min:11|max:13',
          'company'=>'required|min:3|max:191',
          'purpose'=>'required|min:5|max:191'
        ]);

        $visitor = new Visitor;
        $visitor->first_name = $request->first_name;
        $visitor->last_name = $request->last_name;
        $visitor->contact_num = $request->contact_num;
        $visitor->email = $request->email;
        $visitor->company = $request->company;
        $visitor->purpose = $request->purpose;
        $mytime = Carbon::now();
        $visitor->entry_time = date('Y-m-d H:i:s',$mytime->timestamp);
        $visitor->status = 1;
        $visitor->comment = "";
        $visitor->exit_time = date('Y-m-d H:i:s',$mytime->timestamp) ;
        $visitor->save();
        //Session::flash('success','The Blog was Saved Successfully!!');
        return redirect()->route('visitor.index');
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
        $visitor = Visitor::find($id);
        return view('visitor.edit')->withVisitor($visitor);

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
          'comment' => ' required|min:10|max:255'
        ]);
        $mytime = Carbon::now();
        $visitor = Visitor::find($id);
        $visitor->comment = $request->comment;
        $visitor->exit_time = date('Y-m-d H:i:s',$mytime->timestamp) ;
        $visitor->status = 0;
        $visitor->save();
        Session::flash('success','The Feedback was Saved Successfully!!');
        return redirect()->route('visitor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showComment()
    {
          $comments = Visitor::all();
          return view('visitor.show_comment')->withComments($comments);
    }
}
