<?php

namespace App\Http\Controllers;

use App\Models\Seeds;
use Illuminate\Http\Request;

class SeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seeds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seeds  $seeds
     * @return \Illuminate\Http\Response
     */
    public function show(Seeds $seeds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seeds  $seeds
     * @return \Illuminate\Http\Response
     */
    public function edit(Seeds $seeds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seeds  $seeds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seeds $seeds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seeds  $seeds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seeds $seeds)
    {
        //
    }
}
