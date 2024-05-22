<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function listData() {
        $users = User::all();
        return view('listdata', compact('users'));
    }

    public function Delete($id) {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('user.data')->with(['delete' => 'User has been delete']);
    }

    public function Createuser(Request $req) {
        $req->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|min:8'
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();

        return redirect()->route('user.data')->with(['success' => 'User create successfuly!']);
    }

    public function Edituser($id) {
        $user = User::findOrFail($id);
        return view('edit' ,compact('user'));
    }

    public function updateUser(Request $req, $id) {
        $user = User::findOrFail($id);
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->save();

        return redirect()->route('user.data')->with('User has been updated!');
    }
}
