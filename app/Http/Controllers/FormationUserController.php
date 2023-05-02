<?php

namespace App\Http\Controllers;
/** @var \App\Models\User $user **/
use App\Models\User;
use App\Models\Formation;
use Auth;
use Illuminate\Http\Request;

class FormationUserController extends Controller
{
    
    public function addFormationToUser(Formation $formation)

    {        

        $user = Auth::user();
        $user->formations()->attach($formation->id);

    }
}
