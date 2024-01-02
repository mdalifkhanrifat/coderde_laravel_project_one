<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ArchitecturalConsultancyControllerForFront extends Controller
{

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $arc_cons_items = DB::table('architectural_consultancies')->paginate(9);
        $arc_cons = DB::table('page_architectural_consultancy_items')->where('id', 1)->first();

        return view('pages.architecture_consultancy', compact('arc_cons_items','g_setting','arc_cons'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $arc_cons_detail = DB::table('architectural_consultancies')->where('slug', $slug)->first();
        $arc_cons_items = DB::table('architectural_consultancies')->get();
        if(!$arc_cons_detail) {
            return abort(404);
        }
        return view('pages.architecture_consultancy_detail', compact('g_setting','arc_cons_detail','arc_cons_items'));
    }
}
