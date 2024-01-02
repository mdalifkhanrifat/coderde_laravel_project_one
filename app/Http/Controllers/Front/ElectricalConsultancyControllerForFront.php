<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ElectricalConsultancyControllerForFront extends Controller
{

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $ele_cons_items = DB::table('electrical_consultancies')->paginate(9);
        $ele_cons = DB::table('page_electrical_consultancy_items')->where('id', 1)->first();

        return view('pages.electrical_consultancy', compact('ele_cons_items','g_setting','ele_cons'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $ele_cons_detail = DB::table('electrical_consultancies')->where('slug', $slug)->first();
        $ele_cons_items = DB::table('electrical_consultancies')->get();
        if(!$ele_cons_items) {
            return abort(404);
        }
        return view('pages.electrical_consultancy_detail', compact('g_setting','ele_cons_detail','ele_cons_items'));
    }
}
