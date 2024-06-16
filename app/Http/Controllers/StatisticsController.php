<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Screening;
use App\Models\Theater;
use Illuminate\Support\Arr;



class StatisticsController extends Controller
{
    public function index()
    {
        for ($i = 1; $i < 7; $i++) {
            $purchase[$i] = Purchase::whereMonth('date', $i)->whereYear('date', '2024')->count();
            $sale[$i] = Purchase::whereMonth('date', $i)->whereYear('date', '2024')->sum('total_price');
        }

        $purchases = [
            ['Month' => 'January', 'Sales' => $purchase[1], 'Revenue' => $sale[1]],
            ['Month' => 'February', 'Sales' => $purchase[2], 'Revenue' => $sale[2]],
            ['Month' => 'March', 'Sales' => $purchase[3], 'Revenue' => $sale[3]],
            ['Month' => 'April', 'Sales' => $purchase[4], 'Revenue' => $sale[4]],
            ['Month' => 'May', 'Sales' => $purchase[5], 'Revenue' => $sale[5]],
            ['Month' => 'June', 'Sales' => $purchase[6], 'Revenue' => $sale[6]],
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
