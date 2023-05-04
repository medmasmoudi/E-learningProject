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
        if ($formation->nbrOfSpots != 0) {
        $user = Auth::user();
        if (!$user->formations->contains($formation->id)) {
            $formation->nbrOfSpots --;
            $formation->save();
            $user->formations()->attach($formation->id);
        }}}
    public function removeFormationFromUser(Formation $formation)

        {   

            $user = Auth::user();
                $formation->nbrOfSpots ++;
                $formation->save();
                $user->formations()->detach($formation->id);
            }
    public function removeUser(Formation $formation, User $user){
        $user->formations()->detach($formation->id);

    }
}
