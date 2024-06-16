<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ScreeningController extends Controller
{
    //
    public function index(): View
    {
        $screenings = Screening::whereDate('date', '>=', Carbon::today())
            ->orderBy('date')
            ->get();

        return view('screenings.index', compact('screenings'));
    }

    public function edit(Screening $screening)
    {
        return view('screenings.edit', compact('screening'));
    }

    public function update(Request $request, Screening $screening)
    {
        $request->validate([
            'theater_id' => 'required|integer|between:1,8',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
        ]);

        $screening->theater_id = $request->theater_id;
        $screening->date = $request->date;
        $screening->start_time = $request->start_time;
        $screening->save();

        return redirect()->route('screenings')->with('success', 'Screening updated successfully.');
    }

    public function destroy(Screening $screening)
    {
        $screening->delete();

        return redirect()->route('screenings')
            ->with('success', 'Screening deleted successfully.');
    }

    public function buy(Screening $screening)
    {
        $screening->load('movie');

        $seats = Seat::where('theater_id', $screening->theater_id)->get();

        return view('screenings.buy', compact('screening', 'seats'));
    }

    public function purchase(Request $request, Screening $screening)
    {
        $request->validate([
            'seats' => 'required|array|min:1',
            'seats.*' => 'exists:seats,id',
        ]);

        return redirect()->route('screenings')->with('success', 'Tickets purchased successfully.');
    }
}
