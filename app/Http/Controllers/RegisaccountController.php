<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\useraccount;
use App\Groupt;
use App\qrcord;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;


class RegisaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register()
    {
      $objs = Groupt::all();
      $data['objs'] = $objs;
      return view('auth.register', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
     'name_user' => 'required',
     'ser_name' => 'required',
     'email_user' => 'required|unique:useraccounts',
     'phone_user' => 'required|unique:useraccounts',
     'position_user' => 'required',
     'company_user' => 'required',
     'group_user' => 'required'
      ]);

      $group_user = $request->get('group_user');

      $getlimit = DB::table('groupts')
        ->select(
          'groupts.*'
          )
        ->where('groupts.id', $group_user)
        ->get();

      $count_user_get = DB::table('useraccounts')
          ->select(
            'useraccounts.*'
            )
          ->where('useraccounts.group_user', $group_user)
          ->count();

      $limit_groups = $getlimit->limit_group;

      if($count_user_get <= $limit_groups){



        $package = new useraccount();
        $package->name_user = $request['name_user'];
        $package->ser_name = $request['ser_name'];
        $package->email_user = $request['email_user'];
        $package->phone_user = $request['phone_user'];
        $package->position_user = $request['position_user'];
        $package->company_user = $request['company_user'];
        $package->group_user = $request['group_user'];
        $package->status_user = 1;
        $package->save();
        $the_id = $package->id;

          $qrcode = "DV-00".$the_id;
          $package = new qrcord();
          $package->user_id = $the_id;
          $package->qrcode = $qrcode;
          $package->save();

          $countobj = DB::table('useraccounts')
           ->select(
              'useraccounts.*'
              )
           ->where('useraccounts.id', $the_id)
           ->get();

           foreach ($countobj as $user) {

        $data_toview['qrcode'] = $qrcode;

        Mail::send('mails.index', $data_toview, function ($m) use ($user){
            $m->from('event@dvregister.com', 'DVAb0 Demo Day Confirmation Email.');

            $m->to($user->email_user, 'DVAb0 Demo Day Confirmation Email.')->subject('Confirmation for DVAb0 Demo Day : WHERE THE NEXT BIG THINGS HAPPEN');
        });

        }
        return redirect(url('/event_success'))->with('success','เพิ่มบัญชีผู้ใช้งานเสร็จเรียบร้อยแล้ว');




      }else{



        $package = new useraccount();
        $package->name_user = $request['name_user'];
        $package->ser_name = $request['ser_name'];
        $package->email_user = $request['email_user'];
        $package->phone_user = $request['phone_user'];
        $package->position_user = $request['position_user'];
        $package->company_user = $request['company_user'];
        $package->group_user = $request['group_user'];
        $package->save();
        $the_id = $package->id;

          $qrcode = "DV-00".$the_id;
          $package = new qrcord();
          $package->user_id = $the_id;
          $package->qrcode = $qrcode;
          $package->save();

      /*    $countobj = DB::table('useraccounts')
           ->select(
              'useraccounts.*'
              )
           ->where('useraccounts.id', $the_id)
           ->get(); */

        /*   foreach ($countobj as $user) {

        $data_toview['qrcode'] = $qrcode;

        Mail::send('mails.index', $data_toview, function ($m) use ($user){
            $m->from('event@dvregister.com', 'DVAb0 Demo Day Confirmation Email.');

            $m->to($user->email_user, 'DVAb0 Demo Day Confirmation Email.')->subject('Confirmation for DVAb0 Demo Day : WHERE THE NEXT BIG THINGS HAPPEN');
        });

      } */
        return redirect(url('/event_full'));



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
