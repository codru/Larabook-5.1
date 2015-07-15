<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Larabook\Registration\RegisterUserJob;
use Larabook\Registration\SaveUserRequest;
use Laracasts\Flash\Flash;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show a form to register the user
     * @return Response
     */
    public function create()
    {
        return view('registration.create');
    }


    /**
     * Create a new Larabook user
     * @param SaveUserRequest $request
     * @return string
     */
    public function store(SaveUserRequest $request)
    {

        $user = $this->dispatchFrom(RegisterUserJob::class, $request);

        Auth::login($user);

        Flash::overlay("Glad to have you as a new Larabook member!");
        return redirect(route('home'));
    }
}
