<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use App\Lib;

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
        $emails = Lib::latest()->paginate(5);
  
        return view('home',compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function show(Request $request)
    {
        $data = Lib::find($request->home);
        return view('lib.show',compact('data'));
    }

    public function destroy(Lib $lib)
    {
        $lib->delete();
  
        return redirect()->route('home')
                        ->with('success','Email deleted successfully');
    }
}
