<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\useraccount;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

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
      $obj = useraccount::find($id);
      $obj->delete();
      return redirect(url('admin/user'))->with('delete','Delete successful');
    }
}
