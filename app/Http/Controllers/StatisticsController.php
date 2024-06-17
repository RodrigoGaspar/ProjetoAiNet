<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Screening;
use App\Models\Theater;
use Illuminate\Support\Arr;



class StatisticsController extends Controller
{
    public function index()
    {
        for ($i = 1; $i <= 12; $i++) {
            $sales[$i] = Purchase::whereMonth('date', $i)->whereYear('date', '2023')->count();
            $revenues[$i] = Purchase::whereMonth('date', $i)->whereYear('date', '2023')->sum('total_price');
        }

        $purchases = [
            ['Month' => 'January', 'Sales' => $sales[1], 'Revenue' => $revenues[1]],
            ['Month' => 'February', 'Sales' => $sales[2], 'Revenue' => $revenues[2]],
            ['Month' => 'March', 'Sales' => $sales[3], 'Revenue' => $revenues[3]],
            ['Month' => 'April', 'Sales' => $sales[4], 'Revenue' => $revenues[4]],
            ['Month' => 'May', 'Sales' => $sales[5], 'Revenue' => $revenues[5]],
            ['Month' => 'June', 'Sales' => $sales[6], 'Revenue' => $revenues[6]],
            ['Month' => 'July', 'Sales' => $sales[7], 'Revenue' => $revenues[7]],
            ['Month' => 'August', 'Sales' => $sales[8], 'Revenue' => $revenues[8]]
        ];

        $maxTheaters = Theater::count();

        for ($i = 1; $i <= $maxTheaters; $i++) {
            $theater[$i] = Theater::select('name')->Where('id', '=', $i)->first();
            $screenings[$i] = Screening::Where('theater_id', '=', $i)->count();
        }

        $sessions = [
            ['Theater' => $theater[1]->name, 'Screenings' => $screenings[1]],
            ['Theater' => $theater[2]->name, 'Screenings' => $screenings[2]],
            ['Theater' => $theater[3]->name, 'Screenings' => $screenings[3]],
            ['Theater' => $theater[4]->name, 'Screenings' => $screenings[4]],
            ['Theater' => $theater[5]->name, 'Screenings' => $screenings[5]],
            ['Theater' => $theater[6]->name, 'Screenings' => $screenings[6]],
            ['Theater' => $theater[7]->name, 'Screenings' => $screenings[7]],
            ['Theater' => $theater[8]->name, 'Screenings' => $screenings[8]],
        ];

        return view('statistics.index', ['purchases' => $purchases], ['sessions' => $sessions]);
    }
}
