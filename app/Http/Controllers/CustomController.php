<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function staffList () {
    	$list = DB::table('users')->get();
		return $list;
    }
}
