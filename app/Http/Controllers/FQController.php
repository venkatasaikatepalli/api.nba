<?php

namespace App\Http\Controllers;

use DB;
use JWTAuth;
use App\reports\FQ;
use Illuminate\Http\Request;

class FQController extends Controller
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
        $data = DB::table('users')->select('qualification', DB::raw('count(*) as total'))
                 ->groupBy('qualification')
                 ->get();
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
     * @param  \App\reports\FQ  $FQ
     * @return \Illuminate\Http\Response
     */
    public function show(FQ $FQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reports\FQ  $FQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FQ $FQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reports\FQ  $FQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FQ $FQ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reports\FQ  $FQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FQ $FQ)
    {
        //
    }
}
