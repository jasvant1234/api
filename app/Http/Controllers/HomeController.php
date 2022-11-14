<?php

namespace App\Http\Controllers;

use App\Mail\MyTestmail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $auth =Auth::user();
        if($auth->role == 'admin')
        {
            $users = User::all();
            return view('home', compact('users'));

        }
        else {
            return view('userdashboard');
        }
    }
    public function test()
    {
        return view('test');
    }
    public function notification()
    {

       // $notifications = auth()->user();

        $notifications = Notification::where('read_at',null)->where('id','!=',1)->get();
     //   dd($notifications);


        $allnotifications = Notification::orderBy('id', 'DESC')->where('read_at','!=',null)->where('id','!=',1)->get();
       // dd($allnotifications);

        Notification::whereNull('read_at')->update(['read_at' => date('Y-m-d H:i:s')]);

        return view('notification', compact('notifications','allnotifications'));
    }
    public function mail()
    {
       return view('mail');
    }
    public  function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
        ]);
        $data = $request->all();
        \App\Models\Mail::create($data);
        Mail::to($data['email'])->send(new MyTestmail($data));

//        Mail::send('mail_template',$data,function ($message) use ($data)
//        {
//
//            $message->to($data['email'])
//                ->subject($data['subject']);
//
//        });

        return back()->with(['success' => 'Mail Send SuccessFully']);



    }

}
