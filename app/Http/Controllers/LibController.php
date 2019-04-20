<?php

namespace App\Http\Controllers;
use App\Order;
use Google_Service_Calendar;
use Google_Client;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Session;
use App\Lib;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Notification;
use App\Notifications\SendEmails;
use App\Mail\EmailTest;
use Illuminate\Foundation\Auth\User;
use App\Mail\SendAppointmentMail;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Mail\SendAppointmentStatusMail;
use Spatie\GoogleCalendar\Event;

class LibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Lib::latest()->paginate(5);
  
        return view('home',compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'receiver_name' => 'required',
            'receiver_email' => 'required|email',
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'appointment_date' => 'required',
            'appointment_room' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $lib = new Lib;
        $lib->receiver_email = $request->receiver_email;
        $lib->receiver_name = $request->receiver_name;
        $lib->sender_email = $request->sender_email;
        $lib->sender_name = $request->sender_name;
        $lib->appointment_date = $request->appointment_date;
        $lib->appointment_room = $request->appointment_room;
        $lib->subject = $request->subject;
        $lib->message = $request->message;
        $lib->status = 'Pending';
        $lib->token = Str::random(32);

        $data = array(

            'receiver_name' => $lib->receiver_name,
            'receiver_email' => $lib->receiver_email,
            'sender_name' => $lib->sender_name,
            'sender_email' => $lib->sender_email,
            'appointment_date' => $lib->appointment_date,
            'appointment_room' => $lib->appointment_room,
            'subject' => $lib->subject,
            'message01' => $lib->message,
            'status' => 'Pending',
            'token' => $lib->token
        );
        
        // Notification::send($users, new SendEmails());

        // Send mail section.
        $objData = new \stdClass();
        $objData->receiver_name = $lib->receiver_name;
        $objData->receiver_email = $lib->receiver_email;
        $objData->sender_name = $lib->sender_name;
        $objData->sender_email = $lib->sender_email;
        $objData->appointment_date = $lib->appointment_date;
        // Carbon::parse($lib->appointment_date)->format("d/m/Y H:i");
        $objData->time = Carbon::parse($lib->appointment_date)->format("d/m/Y H:i");
        $objData->today = Carbon::now()->format("d/m/Y");
        $objData->appointment_room = $lib->appointment_room;
        $objData->subject = $lib->subject;
        $objData->message01 = $lib->message;
        $objData->status = 'Pending';
        $objData->token = $lib->token;
        
        Mail::to($lib->receiver_email, $lib->receiver_name)->send(new SendAppointmentMail($objData));
        // Mail::send('lib.email', $data, function ($message) use ($lib) {

        //     $message->to($lib->receiver_email, $lib->receiver_name)
        //             ->subject($lib->subject);
        //     $message->from($lib->sender_email, $lib->sender_name);

        // });

        $lib->save();

        return back()->with('success', 'Email has been sent successfully.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($token, $status)
    {
        if (empty($token) || empty($status)) {
            abort(500);
        }

        $lib  = Lib::query()->where("token", $token)->first();
        $lib->update(['status' => $status]);
        /*session_start();
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);*/
        $event = new Event;

        $event->name = join(" ", [$lib->subject, "at", $lib->appointment_room]);
        $event->startDateTime = $this->updateDateFormat($lib->appointment_date);
        $event->endDateTime = $this->updateDateFormat($lib->appointment_date)->addHour(3);
        $event->addAttendee(['email' => $lib->receiver_email]);
        $event->addAttendee(['email' => $lib->sender_email]);

        $event->save();

        Mail::to($lib->sender_email, $lib->sender_name)->send(new SendAppointmentStatusMail($lib));

        return redirect('/')->with('success', 'Email saved in database and sent to student successfully.');

    }
    
    private function updateDateFormat($timestamp)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Asia/Bangkok');
        $date->setTimezone('UTC+7');   
        return $date;
    }

    public function show(Lib $lib)
    {
        return view('lib.show',compact('emails'));
    }

    public function destroy(Lib $lib)
    {
        $lib->delete();
  
        return redirect()->route('lib')
                        ->with('success','Email deleted successfully');
    }
}
