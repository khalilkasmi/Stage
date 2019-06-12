<?php

namespace App\Http\Controllers;

use App\client;
use App\Reservation;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $users = client::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title("Monthly new Register clients")
            ->elementLabel("Total Users")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);


        $reservations = Reservation::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();
        $chart_res = Charts::database($reservations, 'bar', 'highcharts')
            ->title("Monthly made reservations")
            ->elementLabel("Total Reservations")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);


        return view('voyager::charts',compact('chart','chart_res'));
    }
}
