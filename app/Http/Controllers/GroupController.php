<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Groupt;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Groupt
        $objs = Groupt::all();
        $data['objs'] = $objs;
        $data['datahead'] = "รายชื่อกลุ่ม";
        $data['i'] = $i = 0;
        return view('admin.group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['method'] = "post";
      $data['url'] = url('admin/group');
      $data['header'] = "เพิ่มกลุ่ม";
      return view('admin.group.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $package = new Groupt();
     $package->group_name = $request['name'];
     $package->limit_group = $request['limit_group'];
     $package->save();
     return redirect(url('admin/group'))->with('success','เพิ่ม'.$request['name'].' เสร็จเรียบร้อยแล้ว');
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
      $obj = Groupt::find($id);
      $data['url'] = url('admin/group/'.$id);
      $data['header'] = "แก้ไขกลุ่ม";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.group.edit', $data);
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
      $package = Groupt::find($id);
       $package->group_name = $request['name'];
       $package->limit_group = $request['limit_group'];
       $package->save();
       return redirect(url('admin/group'))->with('success_edit','Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = Groupt::find($id);
      $obj->delete();
      return redirect(url('admin/group'))->with('delete','Delete successful');
    }
}
