<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
       dd($request->all());

        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_type' => 'required|integer|in:1,2,3',
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

        try {
            dd($request->all());
            Event::create([
                'event_name' => $request->event_name,
                'event_type' => $request->event_type,
                'event_venue' => $request->event_venue,
                'event_date' => $request->event_date,
                'morning_in_start' => $request->morning_in_start,
                'morning_in_end' => $request->morning_in_end,
                'morning_out_start' => $request->morning_out_start,
                'morning_out_end' => $request->morning_out_end,
                'afternoon_in_start' => $request->afternoon_in_start,
                'afternoon_in_end' => $request->afternoon_in_end,
                'afternoon_out_start' => $request->afternoon_out_start,
                'afternoon_out_end' => $request->afternoon_out_end,
                'user_id' => $request->user_id
            ]);

            return redirect()->back()->with('success', 'Event added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        
    }
}
