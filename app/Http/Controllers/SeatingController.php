<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class SeatingController extends Controller
{
    public function index()
    {
        return view('seating.lookup');
    }

    public function search(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'phone'     => 'required|string|max:20',
        ]);

        // Clean phone number
        $phone = preg_replace('/[^0-9]/', '', $request->phone);

        $guest = Guest::where('last_name', 'LIKE', '%' . trim($request->last_name) . '%')
            ->where(function ($query) use ($phone) {
                $query->where('phone', 'LIKE', '%' . $phone . '%')
                      ->orWhere('phone', 'LIKE', '%' . substr($phone, -10) . '%');
            })
            ->first();

        if (!$guest) {
            return back()
                ->with('error', 'Sorry, we could not find your seat. Please check your Last Name and Phone Number.')
                ->withInput();
        }

        return view('seating.result', compact('guest'));
    }
}