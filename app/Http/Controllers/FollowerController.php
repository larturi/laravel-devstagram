<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
       // Usuarios a los que sigue el usuario logueado
       if(auth()->user()) {
          $siguiendoUsers =  auth()->user()->following;
       } else {
          $siguiendoUsers = [];
       }

       // Usuarios a los no que sigue el usuario logueado
       if(auth()->user()) {
          $arrayUsersIdsFollowing = Follower::where('follower_id', auth()->user()->id)
                ->select('user_id')
                ->get();
          $allUsers = User::whereNotIn('id', $arrayUsersIdsFollowing)
                    ->whereNot('id', auth()->user()->id)
                    ->get();
       } else {
          $allUsers = [];
       }

       return view('users.index', compact('siguiendoUsers', 'allUsers'));
    }

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
