<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $trips = Trip::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('start_location', 'like', '%' . $request->search . '%')
            ->get();
        return view('home', compact('trips'));
    }

    public function store(Request $request)
    {
        $trip = new Trip();
        $trip->title = $request->title;
        $trip->description = $request->description;
        $trip->start_date = $request->start_date;
        $trip->end_date = $request->end_date;
        $trip->start_location = $request->start_location;
        $trip->end_location = $request->end_location;
        $trip->vehicle = $request->vehicle;
        $trip->emoji = $request->emoji;
        $trip->user_id = auth()->id();
        $trip->save();
        return redirect()->route('home');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('home');
    }
}
