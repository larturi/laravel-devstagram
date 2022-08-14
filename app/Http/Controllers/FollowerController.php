<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        $follower = auth()->user()->id;

        // Verificar que no este siguiendo al usuario
        $existsRelation = Follower::where('user_id', $user->id)
                                  ->where('follower_id', $follower)
                                  ->get();

        if(count($existsRelation) == 0 ) {
            // El usuario autenticado sigue a $user
            $user->followers()->attach($follower);
            return back();
        } else {
            return back()->with('message', 'Ya estas siguiendo al usuario');
        }
    }

    public function destroy(User $user)
    {
        $follower = auth()->user()->id;

        // El usuario autenticado deja de seguir a $user
        $user->followers()->detach($follower);
        return back();
    }
}
