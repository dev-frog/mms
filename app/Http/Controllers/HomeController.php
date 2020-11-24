<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = DB::table('members')
        // ->join('points','points.member_id','members.id')
        // ->get();

        $users =DB::table('members')
        ->join('points','points.member_id','members.id')
        // ->selectRaw('sum(points.point) as total_point')
        ->select('members.id','members.first_name','members.last_name','members.phone_number','members.email',DB::raw('sum(points.point) as total_point'))
        ->groupBy('members.id')
        ->groupBy('members.first_name')
        ->groupBy('members.last_name')
        ->groupBy('members.phone_number')
        ->groupBy('members.email')
        ->orderBy('members.id')
        ->get();

        $total_users = DB::table('members')
        ->get();

        $max = $users->max('total_point');





        return view('home',['users' =>$users,'total_users' => $total_users,'max' => $max]);

    }

    public function edit($id){


    }
}
