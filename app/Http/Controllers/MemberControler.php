<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\DataTables\MemberDataTable;

class MemberControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MemberDataTable $dataTable)
    {
        // $members = Member::paginate(10);
        // return view('members.memberlist')->with('members',$members);
        return $dataTable->render('members.memberlist');
        // return DataTables::of(Member::query())->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' =>'required|numeric',
            'email' => 'required',
            'card_number' => 'required'
        ]);

        //process the data and submit it
        $member = new Member();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;
        $member->card_number = $request->card_number;


        // if successful we want to redirect
        if ($member->save()){
            // return redirect()->route('create');
            return redirect()->back()->with('message','Member add successfully');

        }else{
            return redirect()->back()->with('failed','Member Can\'t  Created');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
