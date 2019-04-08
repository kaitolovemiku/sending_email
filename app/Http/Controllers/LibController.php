<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Session;
use App\Lib;
use Auth;

class LibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emails/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 1234;
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
            'receiver_email' => 'required|email',
            'receiver_name' => 'required',
            'sender_email' => 'required',
            'sender_name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $lib = new Lib;
        $lib->receiver_email = $request->receiver_email;
        $lib->receiver_name = $request->receiver_name;
        $lib->sender_email = $request->sender_email;
        $lib->sender_name = $request->sender_name;
        $lib->appointment_date= $request->appointment_date;
        $lib->appointment_room = $request->appointment_room;
        $lib->subject = $request->subject;
        $lib->message = $request->content;
        $lib->status = 'Pending';

        $data = array(
            
            'receiver_email' => $lib->email_receiver,
            'receiver_name' => $lib->receiver_name,
            'sender_email' => $lib->sender_email,
            'sender_name' => $lib->sender_name, 
            'appointment_date' => $lib->appointment_date,
            'appointment_room' => $lib->appointment_room,
            'subject' => $lib->subject,
            'message' => $lib->message, 
            'status' => 'Pending'

        );

        Mail::send('emails.email' , $data , function($message) use($lib) {
            
            $message->to($lib->receiver_email, $lib->receiver_name)
                    ->subject($lib->subject);
            $message->from($lib->sender_email , $lib->sender_name);

        });
        
        // $lib->save();

        return back()->with('success', 'Send email success!!');

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
