<?php

namespace App\Http\Controllers;

use DB;
use JWTAuth;
use App\reports\sfr;
use Illuminate\Http\Request;

class SfrController extends Controller
{   
    public function __construct() {

        $this->middleware('auth');
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sfrs')->get();
        return $data;
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
     * @param  \App\reports\sfr  $sfr
     * @return \Illuminate\Http\Response
     */
    public function show(sfr $sfr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reports\sfr  $sfr
     * @return \Illuminate\Http\Response
     */
    public function edit(sfr $sfr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reports\sfr  $sfr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sfr $sfr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reports\sfr  $sfr
     * @return \Illuminate\Http\Response
     */
    public function destroy(sfr $sfr)
    {
        //
    }
}
