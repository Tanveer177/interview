<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardControlle extends Controller
{
    //
    public function edit($id){
        $user = User::find($id);
        return view('dashboard.edit', compact('user'));

    }
    public function update(Request $request , $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('dashboard')->with('success','User updated successfully');
    }
}
