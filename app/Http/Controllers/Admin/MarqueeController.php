<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageMarquee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class MarqueeController extends Controller
{
    public function edit()
    {
        $marquee = PageMarquee::where('id',1)->first();
        return view('admin.page_setting.page_marquee', compact('marquee'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['detail'] = $request->input('detail');
        $data['status'] = $request->input('status');

        PageMarquee::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Service Page Content is updated successfully!');

    }

}
