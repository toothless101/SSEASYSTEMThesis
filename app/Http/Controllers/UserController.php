<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function dashboard(){
        return view('admin/dashboard');
    }

    //Officer CRUD
    public function officer(){
        $users = User::latest()->get();
        return view('admin.officer', compact('users')); //passin the user data to the view 
    }

    
    //ADD OFFICER/USER
    public function createOfficer(Request $request)
    {
      //dd($request->all());    

       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'username'=> 'required|string|max:255',
            'password' => 'required|string|min:6',
            'usertype' => 'required|integer|in:1,2', //1-admin, 2-officer
            'user_img' => 'nullable|image|max:2048'

        ]);

        $filename = null;
        if($request->hasFile('user_img')){
            $filename = time().'.'.$request->user_img->extension();
           $request->user_img->move(public_path('images'), $filename);
       }

       try {
             User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'usertype' => $request->usertype,
                'user_img' => $filename,
            ]);
        
          return redirect()->back()->with('success', 'User added successfully!');
        } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Error: ' . $e->getMessage());        
        
           
        }

    }

}