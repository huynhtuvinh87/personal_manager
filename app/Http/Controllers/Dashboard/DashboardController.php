<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Tasks\CollectMoneyTask;
use App\Http\Controllers\Dashboard\Tasks\SpendingMoneyTask;

class DashboardController extends Controller
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
        $collect = app(CollectMoneyTask::class)->handle();
        $spending = app(SpendingMoneyTask::class)->handle();
        return view('dashboard.index', ['collect' => $collect, 'spending' => $spending]);
    }
}
