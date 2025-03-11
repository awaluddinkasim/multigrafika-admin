<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.account-user', [
            'users' => User::paginate(10)
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return to_route('account.user')->with('success', __('user.created'));
    }

    public function edit(User $user): View
    {
        return view('pages.account-user-edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);


        return to_route('account.user')->with('success', __('user.updated'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return to_route('account.user')->with('success', __('user.deleted'));
    }
}
