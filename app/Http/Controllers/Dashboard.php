<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;


class Dashboard extends Controller
{
    public function DashboardAdmin(){
        $users = User::all();

        return inertia('Dashboard/DashboardAdmin',[
            'users' => $users,


        ]
        );

    }
    public function DashboardUser(){
        $user = Auth::user();
        $formations = $user->formations()->get();
        return inertia(
            'Dashboard/DashboardUser',[
                'formations' => $formations,
            ]
        );
    }
    public function FormationForEachUser(User $user){
        $formations = $user->formations()->get();
        return inertia(
            'Dashboard/CourseForUser',[
                'formations' => $formations,
            ]
        );
    }
}
