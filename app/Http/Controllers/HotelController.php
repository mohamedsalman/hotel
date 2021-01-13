<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hotel;
class HotelController extends Controller
{
    //
    public function index()
    {
        $hotels = hotel::all();

        return view('hotel.index', compact('hotels'));
    }
    public function create()
    {
        return view('hotel.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        Hotel::create($request->all());

        return redirect()->route('hotel.index')
            ->with('success', 'hotel created successfully.');
    }
    public function show()
    {
        return view('hotel.show', compact('hotel'));
    }
    public function edit()
    {
        return view('hotel.edit', compact('hotel'));
    }
    public function update(Request $request, hotel $hotel)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);
        $hotel->update($request->all());

        return redirect()->route('hotel.index')
            ->with('success', 'Hotel updated successfully');
    }
    public function destroy(hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotel.index')
            ->with('success', 'Hotel deleted successfully');
    }
}
