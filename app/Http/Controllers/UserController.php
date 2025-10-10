<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        User::create($input);
        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        $user->load('profile');
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'exclude_if:password,null|min:8',
        ]);

        if (empty($input['password'])) {
            unset($input['password']);
        }
        $user->fill($input);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function updateProfile(User $user, Request $request)
    {
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);

        UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            $input
        );

        return redirect()->route('user.index')->with('success', 'Perfil do usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
