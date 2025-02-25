<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('pages.account-admin', [
            'admins' => Admin::paginate(10)
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);

        Admin::create($data);

        return to_route('account.admin');
    }

    public function edit(Admin $admin): View
    {
        return view('pages.account-admin-edit', [
            'admin' => $admin
        ]);
    }

    public function update(Request $request, Admin $admin): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string'],
        ]);

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return to_route('account.admin');
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        return to_route('account.admin');
    }
}
