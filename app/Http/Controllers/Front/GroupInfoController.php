<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class GroupInfoController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $group_info = DB::table('page_group_info_items')->where('id', 1)->first(); 
        return view('pages.group_info', compact('group_info','g_setting'));
    }
}