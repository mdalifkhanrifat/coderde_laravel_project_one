<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ArchitecturalWorksControllerForFront extends Controller
{

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $arc_work_items = DB::table('architectural_works')->paginate(9);
        $arc_work = DB::table('page_architectural_works_items')->where('id', 1)->first();

        return view('pages.architectural_works', compact('arc_work_items', 'g_setting', 'arc_work'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $arc_works_detail = DB::table('architectural_works')->where('slug', $slug)->first();
        $architectural_items = DB::table('architectural_works')->get();

        if (!$arc_works_detail) {
            return abort(404);
        }

        return view('pages.architectural_work_detail', compact('g_setting', 'arc_works_detail', 'architectural_items'));
    }
}
