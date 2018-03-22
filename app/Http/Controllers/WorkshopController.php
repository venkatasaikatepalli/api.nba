<?php

namespace App\Http\Controllers;

use App\workshop;
use DB;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class WorkshopController extends Controller
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
        $workshops = DB::table('workshops')->where('staff_id', $this->user->id)->get();
        return $workshops;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'des' => 'required',
            'venue' => 'required',
            'from'=> 'required',
            'to'=> 'required',
            'des'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // Workshop::create([
        //     'title' => $request->get('title'),
        //     'des' => $request->get('des'),
        // ]);
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'des' => 'required',
            'venue' => 'required',
            'from'=> 'required',
            'to'=> 'required',
            'des'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // Workshop::create([
        //     'title' => $request->get('title'),
        //     'des' => $request->get('des'),
        // ]);
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(workshop $workshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(workshop $workshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, workshop $workshop)
    {   
        DB::table('workshops')->where('id', $workshop->id)->update([
            'title' => $workshop['title']
            ]where('id', $workshop->id)->);
        $data = DB::table('workshops')->where('id', $workshop->id)->get();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(workshop $workshop)
    {
        //
    }
}
