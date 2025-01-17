<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function event()
    {
        $users = User::all();

        // Pass the users data to the view
        return view('admin.event', compact('users'));
    }

    public function createEvent(Request $request)
    {
       

        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_type' => 'required|integer|in:1,2',
            'event_venue' => 'required|string|max:255',
            'event_date' => 'required|date',
            'morning_in_start' => 'nullable|date_format:H:i',
            'morning_in_end' => 'nullable|date_format:H:i',
            'morning_out_start' => 'nullable|date_format:H:i',
            'morning_out_end' => 'nullable|date_format:H:i',
            'afternoon_in_start' => 'nullable|date_format:H:i',
            'afternoon_in_end' => 'nullable|date_format:H:i',
            'afternoon_out_start' => 'nullable|date_format:H:i',
            'afternoon_out_end' => 'nullable|date_format:H:i',
            'user_id' => 'required|integer|exists:users,id'
        ]);


        
    }
}
