<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Storage;

class UserPhoto extends Controller
{
    public function pict()
    {    
        $username = Auth::user()->id;
        $user = Auth::user(); //list user
        $data = [
            'title'   => 'Change Photo & Password',
            'user'    => $user,
            'content' => 'admin/user/foto'
        ];
        
        return view('admin/layout/wrapper', $data);
    }

    public function pict_edit(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'old_password' => 'required|string|min:6',
        ];

        if ($request->hasFile('photo')) {
            $rules['photo'] = 'image|file|max:1024';
        }

        if ($request->filled('new_password')) {
            $rules['new_password'] = 'required|string|min:6';
        }

        $validatedData = $request->validate($rules);

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }
            if ($request->hasFile('photo')) {
                $fileName = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension(); // Generate a unique filename
                $path = 'public/user/';

                if ($user->photo) {
                    Storage::delete($path . $user->photo);
                }

                $request->file('photo')->storeAs($path, $fileName);
                $validatedData['photo'] = $fileName; 
            }
            if ($request->filled('new_password')) {
                $validatedData['password'] = Hash::make($request->input('new_password')); // Hash the new password
            }
            $user->update($validatedData); 
            return redirect()->back()->withSuccess('Sukses');
    }
}
