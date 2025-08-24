<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $user->update(['role' => $request->get('role')]);

        return redirect()->route('admin.dashboard')->with('message', "Update user's role succesfully");
    }
}
