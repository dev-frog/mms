<?php

namespace App\Http\Controllers;


use App\Models\Member;
use App\Models\Point;
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
        $users =DB::table('members')
        ->join('points','points.member_id','members.id')
        ->select('members.id','members.first_name','members.last_name','members.phone_number','members.email',DB::raw('(sum(points.point) - sum(points.redeem_point)) as total_point'))
        ->groupBy('members.id')
        ->groupBy('members.first_name')
        ->groupBy('members.last_name')
        ->groupBy('members.phone_number')
        ->groupBy('members.email')
        ->orderBy('members.id')
        ->get();

        $total_users = DB::table('members')
        ->get();
        return view('home',['users' =>$users,'total_users' => $total_users]);

    }

    public function get_user($id){
        $user_id = Member::findOrFail($id);
        return $user_id;
    }


    public function update_user_point($id){
        $users =DB::table('members')
        ->join('points','points.member_id','members.id')
        ->select('members.id','members.first_name','members.last_name','members.phone_number','members.card_number','members.email',DB::raw('abs(sum(points.point) - sum(points.redeem_point)) as total_point'))
        ->where('members.id','=',$id)
        ->groupBy('members.id')
        ->groupBy('members.first_name')
        ->groupBy('members.last_name')
        ->groupBy('members.phone_number')
        ->groupBy('members.card_number')
        ->groupBy('members.email')
        ->orderBy('members.id')
        ->get();
        return $users;
    }

    public function update(Request $request){

    
        if ($request->shopping_update >= $request->delete_point_data ){
            $point = new Point();
            $point->shopping = $request->shopping_update;
            $point->redeem_point =  $request->delete_point_data;
            $member = Member::findOrFail($request->member_id_update);
            $member->point()->save($point);
            return redirect()->back()->with('message','Point add successfully');
            

        }else{
            
            $point = new Point();
            $point->shopping = $request->shopping_update;
            $point->redeem_point = $request->shopping_update;
            $member = Member::findOrFail($request->member_id_update);
            $member->point()->save($point);
            return redirect()->back()->with('message','Point add successfully');
            
        }

        

    }

    


}
