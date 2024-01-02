<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class EngineeringWorkControllerForFront extends Controller
{

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $eng_work_items = DB::table('engineering_works')->paginate(9);
        $eng_work = DB::table('page_engineering_works_items')->where('id', 1)->first();

        return view('pages.engineering_Work', compact('eng_work_items','g_setting','eng_work'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $eng_works_detail = DB::table('engineering_works')->where('slug', $slug)->first();
        $service_items = DB::table('engineering_works')->get();
        if(!$eng_works_detail) {
            return abort(404);
        }
        return view('pages.engineering_work_detail', compact('g_setting','eng_works_detail','service_items'));
    }
}
