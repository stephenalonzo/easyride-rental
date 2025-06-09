<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthentication;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistration $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        
        $user = User::create($validated);
        $user->assignRole('user');

        return redirect('/login');
    }

    public function authenticate(UserAuthentication $request) {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
