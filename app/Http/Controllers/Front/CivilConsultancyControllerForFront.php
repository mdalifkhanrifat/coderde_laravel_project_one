<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CivilConsultancyControllerForFront extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $civil_cons_items = DB::table('civil_consultancies')->paginate(9);
        $civil_cons = DB::table('page_civil_consultancy_items')->where('id', 1)->first();

        return view('pages.civil_consultancy', compact('civil_cons_items','g_setting','civil_cons'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $civil_cons_detail = DB::table('civil_consultancies')->where('slug', $slug)->first();
        $civil_cons_items = DB::table('civil_consultancies')->get();
        if(!$civil_cons_detail) {
            return abort(404);
        }
        return view('pages.civil_consultancy_detail', compact('g_setting','civil_cons_detail','civil_cons_items'));
    }
}
