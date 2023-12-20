<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ElectricalConsultancyController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $ele_cons_page = DB::table('page_electrical_consultancys')->where('id', 1)->first();
    	$services = DB::table('services')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();


        return view('pages.electrical_consultancy', compact('ele_cons_page','g_setting','services','page_home'));
    }
}
