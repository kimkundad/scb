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

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $Attendee = DB::table('useraccounts')
            ->select(
            'useraccounts.group_user'
            )
            ->where('group_user', 12)
            ->count();

      $Attendee_lim2 = DB::table('groupts')
            ->select(
            'groupts.*'
            )
            ->where('groupts.id', 12)
            ->first();


            $Investor = DB::table('useraccounts')
                  ->select(
                  'useraccounts.group_user'
                  )
                  ->where('group_user', 13)
                  ->count();

            $Investor_lim2 = DB::table('groupts')
                  ->select(
                  'groupts.*'
                  )
                  ->where('groupts.id', 13)
                  ->first();


                  $Media = DB::table('useraccounts')
                        ->select(
                        'useraccounts.group_user'
                        )
                        ->where('group_user', 14)
                        ->count();

                  $Media_lim2 = DB::table('groupts')
                        ->select(
                        'groupts.*'
                        )
                        ->where('groupts.id', 14)
                        ->first();

                        $SCB = DB::table('useraccounts')
                              ->select(
                              'useraccounts.group_user'
                              )
                              ->where('group_user', 15)
                              ->count();

                        $SCB_lim2 = DB::table('groupts')
                              ->select(
                              'groupts.*'
                              )
                              ->where('groupts.id', 15)
                              ->first();

                              $Startup = DB::table('useraccounts')
                                    ->select(
                                    'useraccounts.group_user'
                                    )
                                    ->where('group_user', 16)
                                    ->count();

                              $Startup_lim2 = DB::table('groupts')
                                    ->select(
                                    'groupts.*'
                                    )
                                    ->where('groupts.id', 16)
                                    ->first();


        $Attendee_lim = $Attendee_lim2->limit_group - $Attendee;
        $Investor_lim = $Investor_lim2->limit_group - $Investor;
        $Media_lim = $Media_lim2->limit_group - $Media;
        $SCB_lim = $SCB_lim2->limit_group - $SCB;
        $Startup_lim = $Startup_lim2->limit_group - $Startup;
        //dd($Attendee_lim);
        $data['Attendee'] = $Attendee;
        $data['Attendee_lim'] = $Attendee_lim;

        $data['Investor'] = $Investor;
        $data['Investor_lim'] = $Investor_lim;

        $data['Media'] = $Media;
        $data['Media_lim'] = $Media_lim;


        $data['SCB'] = $SCB;
        $data['SCB_lim'] = $SCB_lim;

        $data['Startup'] = $Startup;
        $data['Startup_lim'] = $Startup_lim;


        $data['header'] = 'Dashboard';
        return view('admin.dashboard.index',$data);
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
        //
    }
}
