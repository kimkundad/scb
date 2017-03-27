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
     'email_user' => 'required|unique:useraccounts',
     'phone_user' => 'required',
     'position_user' => 'required',
     'company_user' => 'required',
     'group_user' => 'required'
      ]);



      $package = new useraccount();
      $package->name_user = $request['name_user'];
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



        $countobj = DB::table('useraccounts')
         ->select(
            'useraccounts.*'
            )
         ->where('useraccounts.id', $the_id)
         ->first();



        // send email
           $data_toview = array();
         //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
           date_default_timezone_set("Asia/Bangkok");
           $data_toview['data'] = $countobj;
           $data_toview['qrcode'] = $qrcode;
           $data_toview['datatime'] = date("d-m-Y H:i:s");


           $email_sender   = 'event@dvregister.com';
           $email_pass     = 'Event!@#7553';

       /*    $email_sender   = 'info@acmeinvestor.com';
           $email_pass     = 'Iaminfoacmeinvestor';  */
           $email_to       =  $request['email_user'];
           //echo $admins[$idx]['email'];
           // Backup your default mailer
           $backup = \Mail::getSwiftMailer();

           try{

                       //https://accounts.google.com/DisplayUnlockCaptcha
                       // Setup your gmail mailer
                       $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                       $transport->setUsername($email_sender);
                       $transport->setPassword($email_pass);

                       // Any other mailer configuration stuff needed...
                       $gmail = new Swift_Mailer($transport);

                       // Set the mailer as gmail
                       \Mail::setSwiftMailer($gmail);

                       $data['emailto'] = $email_sender;
                       $data['sender'] = $email_to;
                       //Sender dan Reply harus sama

                       Mail::send('mails.index', $data_toview, function($message) use ($data)
                       {
                           $message->from($data['sender'], 'Digital Ventures');
                           $message->to($data['sender'])
                           ->replyTo($data['sender'], 'Digital Ventures.')
                           ->subject('ยืนยันการลงทะเบียน Digital Ventures ของคุณในวันที่ '.date("d-m-Y H:i:s"));

                           //echo 'Confirmation email after registration is completed.';
                       });

           }catch(\Swift_TransportException $e){
               $response = $e->getMessage() ;
               echo $response;

           }


           // Restore your original mailer
           Mail::setSwiftMailer($backup);
           // send email


      return redirect(url('/thx'))->with('success','เพิ่มบัญชีผู้ใช้งานเสร็จเรียบร้อยแล้ว');

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
