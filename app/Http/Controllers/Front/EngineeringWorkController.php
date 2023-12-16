<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class EngineeringWorkController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $eng_work = DB::table('page_eng_work_items')->where('id', 1)->first();
        return view('pages.engineering_Work', compact('eng_work','g_setting'));
    }
}
