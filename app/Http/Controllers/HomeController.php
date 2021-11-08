<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
        return view('home');
    }

    public function store(Request $request)
    {
        if ($request->expectsJson()) {
            
            $this->validate($request, [
                'date' => 'required',
                'range_start' => 'required',
                'range_end' => 'required',
                'fio' => 'required',
                'phone' => 'required',
                'diet' => 'required',
                'schedule' => 'required',
                'day1' => 'required',
                'day2' => 'required',
                'day3' => 'required',
                'day4' => 'required',
                'day5' => 'required',
                'day6' => 'required',
                'day7' => 'required',
                'comment' => 'required'
            ]);
     
            $order = Order::create($request->all());

            return 'Ok';
        }
    }  

    public function list()
    {
        $orders = Order::all();

        /*$period = new DatePeriod(
             new DateTime('2010-10-01'),
             new DateInterval('P1D'),
             new DateTime('2010-10-05')
        ); */  
             
        return view('list', compact('orders'));
    }       
}
