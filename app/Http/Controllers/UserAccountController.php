<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }
    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'niveau' => 'required'

        ]));
        Auth::login($user);

        return redirect()->route('formation.index');
    }

    public function edit(User $user)
    {
        return inertia(
            'UserAccount/Edit',
            [
                'user_account' => $user
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Check if the password field is included in the request data
        if (!empty($request->input('password'))) {
            // Hash the new password
            $password = Hash::make($request->input('password'));
            $user->password = $password;
        }
        $user->save();
        return redirect()->route('formation.index', ['id' => $id]);
    }


    public function destroy(int $id)

    {
        User::find($id)->delete();
        sleep(1);
        return redirect()->route('formation.index');
    }
}
