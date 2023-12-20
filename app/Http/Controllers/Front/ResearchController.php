<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ResearchController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $researcs_page = DB::table('page_researcs')->where('id', 1)->first();
    	$services = DB::table('services')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();


        return view('pages.research', compact('researcs_page','g_setting','services','page_home'));
    }
}
