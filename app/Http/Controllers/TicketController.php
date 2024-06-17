<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use App\Models\Seat;
use Illuminate\Http\Request;
use Session;

class TicketController extends Controller
{
    public function purchaseTicket(Request $request, $screeningId)
    {
        $selectedSeats = $request->input('seats');

        Session::put('selectedSeats', $selectedSeats);

        $screening = Screening::findOrFail($screeningId);

        return view('cart.index', [
            'screening' => $screening,
            'selectedSeats' => $selectedSeats,
        ]);
    }
}
