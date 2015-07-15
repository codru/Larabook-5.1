<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Larabook\Statuses\PublishStatusJob;
use Larabook\Statuses\SaveStatusRequest;
use Larabook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;

class StatusesController extends Controller
{
    protected $repository;

    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->repository->getAllForUser(Auth::user());

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveStatusRequest $request
     * @return Response
     */
    public function store(SaveStatusRequest $request)
    {
        $this->dispatchFrom(
            PublishStatusJob::class,
            $request
        );

        Flash::message('Your status has been updated!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
