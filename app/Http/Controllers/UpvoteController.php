<?php

namespace App\Http\Controllers;

use App\Upvote;
use App\Saas;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Saas $saas)
    {
   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function show(Upvote $upvote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function edit(Upvote $upvote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upvote $upvote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upvote $upvote)
    {
        //
    }
}
