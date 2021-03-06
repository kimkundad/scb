<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\useraccount;
use App\Groupt;
use App\qrcord;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Session;

class UseraccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objs = DB::table('useraccounts')
            ->select(
            'useraccounts.*',
            'useraccounts.id as Aid',
            'groupts.*',
            'qrcords.qrcode as Qid',
            'qrcords.*'
            )
            ->leftjoin('groupts', 'useraccounts.group_user', '=', 'groupts.id')
            ->leftjoin('qrcords', 'useraccounts.id', '=', 'qrcords.user_id')
            ->get();

          //  dd($objs->group_name);


      $data['objs'] = $objs;
      $data['datahead'] = "รายชื่อในระบบทั้งหมด";
      $data['i'] = $i = 0;
      return view('admin.formuser.user', $data);
    }


    public function loadQR()
    {
      $attendee  = DB::table('useraccounts')
            ->select(
            'useraccounts.*',
            'useraccounts.id as Aid',
            'groupts.*',
            'qrcords.qrcode as Qid',
            'qrcords.*'
            )
            ->leftjoin('groupts', 'useraccounts.group_user', '=', 'groupts.id')
            ->leftjoin('qrcords', 'useraccounts.id', '=', 'qrcords.user_id')
            ->where('useraccounts.group_user', 16)
            ->get();

      //dd($attendee);


      $data['attendee'] = $attendee;
      $data['datahead'] = "รายชื่อในระบบทั้งหมด";
      $data['i'] = $i = 0;
      return view('admin.formuser.loadqr', $data);
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
        //
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

      $group = Groupt::all();
      $data['group'] = $group;
      $objs = useraccount::find($id);
    $data['objs'] = $objs;
    $data['header'] = 'แก้ไขข้อมูลผู้ลงทะเบียน';
    $data['url'] = url('admin/user/'.$id);
    $data['method'] = "put";
    return view('admin.formuser.edit',$data);
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
      $this->validate($request, [
     'name_user' => 'required',
     'ser_name' => 'required',
     'email_user' => 'required',
     'phone_user' => 'required',
     'position_user' => 'required',
     'company_user' => 'required',
     'group_user' => 'required'
      ]);

     $package = useraccount::find($id);
     $package->name_user = $request['name_user'];
     $package->ser_name = $request['ser_name'];
     $package->email_user = $request['email_user'];
     $package->phone_user = $request['phone_user'];
     $package->position_user = $request['position_user'];
     $package->company_user = $request['company_user'];
     $package->group_user = $request['group_user'];
     $package->save();

     return redirect(url('admin/user/'.$id.'/edit'))->with('success_user_edit','แก้ไขข้อมูลสำเร็จแล้วค่ะ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = useraccount::find($id);
      $obj->delete();
      $objs = DB::table('qrcords')
            ->select(
            'qrcords.*'
            )
            ->where('user_id', $id)
            ->delete();
      return redirect(url('admin/user'))->with('delete','Delete successful');
    }
}
