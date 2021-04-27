<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use DB;

class ChartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function get_chart1_data(Request $request)
    {
        $freq = $request->get('freq');

        switch ($freq) {
            case "1":
                $trips = Trip::whereDate('trip_date', '>=', Carbon::now()->subDays(7))->get();
                break;
            case "2":
                $trips = Trip::whereDate('trip_date', '>=', Carbon::now()->subDays(30))->get();
                break;
            case "3":
                $trips = Trip::whereYear('trip_date', date('Y', strtotime(date('Y-m-d'))))->get();
                break;
            default:
                $trips = Trip::all();
        }

        return response()->json(['trips' => $trips, 'message' => 'All Trips Fetched Successfully', 'status_code' => 200]);
    }

    public function get_chart2_data(Request $request)
    {
        $date_type = $request->get('date_type');
        if ($date_type == 1) {
            $trips = Trip::selectRaw('sum(booking_cost) as cost')->selectRaw('monthname(booking_date) as month')->selectRaw('month(booking_date) as booking_month')->groupBy('booking_month')->get();
        } else {
            $trips = Trip::selectRaw('sum(booking_cost) as cost')->selectRaw('monthname(trip_date) as month')->selectRaw('month(trip_date) as trip_month')->groupBy('trip_month')->get();
        }
        return response()->json(['trips' => $trips, 'message' => 'All Trips Fetched Successfully', 'status_code' => 200]);
    }
}
