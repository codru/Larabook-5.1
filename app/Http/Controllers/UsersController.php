<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Larabook\Users\UserRepository;

class UsersController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->repository->getPaginated();

        return view('users.index', compact('users'));
    }

    public function show($username)
    {
        $user = $this->repository->findByUsername($username);

        return view('users.show', compact('user'));
    }


}
