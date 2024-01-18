<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimerRequest;
use App\Http\Resources\UpdateTimerRequest;
use App\Models\Timer;

class TimerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Timer $timer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timer $timer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimerRequest $request, Timer $timer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timer $timer)
    {
        //
    }
}
