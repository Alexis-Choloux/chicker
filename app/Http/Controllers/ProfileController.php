<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }


    // profile edit
    public function edit(User $user)
    {

        if ($user->isNot(auth()->user())) {
            abort(404);
        }

        return view('profile.edit', compact('user'));
    }


    public function update(User $user)
    {

        $attributes = request()->validate([
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'firstName' => ['string', 'required', 'max:255'],
            'lastName' => ['string', 'required', 'max:255'],
            'chickname' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)]
        ]);

        $user->update($attributes);

        return redirect()->back()->with('message', 'Profil mis à jour !');
    }


    // password edit
    public function editPassword(User $user)
    {

        if ($user->isNot(auth()->user())) {
            abort(404);
        }

        return view('profile.edit-password', compact('user'));
    }


    public function updatePassword(Request $request, User $user)
    {

        $attributes = request()->validate([
            'oldPassword' => ['string', 'required', 'min:8', 'max:255'],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        $hashedPassword = $user->password;

        if (Hash::check($request->oldPassword, $hashedPassword)) {

            if (!Hash::check($request->password, $hashedPassword)) {

                $user->password = $attributes['password'];

                $user->save();
                
                return redirect()->back()->with('message', 'Mot de passe modifié');

            } else {
                return redirect()->back()->withErrors('password_error', 'Le nouveau mot de passe doit être différent de l\'ancien !');
                
            }
        } else {
            session()->flash('message', 'Votre mot de passe actuel est erroné !');
            return redirect()->back()->withErrors('password_error', 'Votre mot de passe actuel est erroné !');
        }
    }
}
