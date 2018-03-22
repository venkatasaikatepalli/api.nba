<?php

namespace App\Http\Controllers;

use DB;
use App\academicyear;
use Illuminate\Http\Request;

class AcademicyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $list = DB::table('academicyears')->get();
       return $list;
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
     * @param  \App\academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function show(academicyear $academicyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function edit(academicyear $academicyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, academicyear $academicyear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(academicyear $academicyear)
    {
        //
    }
}
