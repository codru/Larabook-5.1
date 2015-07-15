<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Larabook\Users\LoginUserRequest;
use Laracasts\Flash\Flash;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    /**
     * Show the form for signing in.
     *
     * @return Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LoginUserRequest $request
     * @return Response
     */
    public function store(LoginUserRequest $request)
    {
        // try to sign in
        if (!Auth::attempt($request->only(['email', 'password']))) {
            Flash::message("We were unable to sign you in. Please check your credentials and try again!");

            return redirect()->back()->withInput();
        }

        Flash::message('Welcome back!');
        return redirect()->intended('statuses');
    }

    public function destroy()
    {
        Auth::logout();

        Flash::message('You have now been logged out.');
        return redirect(route('home'));
    }

}
