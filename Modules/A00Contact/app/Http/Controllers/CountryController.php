<?php

namespace Modules\A00Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('a00contact::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $timezones = timezone_identifiers_list();
        $guessedTimezone = User::guessUserTimezoneUsingAPI($request->ip());
        return view('a00contact::create', compact('timezones', 'guessedTimezone'));
    }

    // https://laraveldaily.com/lesson/laravel-user-timezones/user-timezone-in-registration
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'timezone' => ['required', Rule::in(array_flip(timezone_identifiers_list()))]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'timezone' => timezone_identifiers_list()[$request->input('timezone', 'UTC')]
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('a00contact::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('a00contact::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
