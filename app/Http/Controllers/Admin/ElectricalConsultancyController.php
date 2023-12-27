<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElectricalConsultancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ElectricalConsultancyController extends Controller
{
    public function index()
    {
        $electrical_consultancy = ElectricalConsultancy::all();
        return view('admin.electrical-consultancy.index', compact('electrical_consultancy'));
    }

    public function create()
    {
        return view('admin.electrical-consultancy.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
       $electrical_consultancy = new ElectricalConsultancy();
        $data = $request->only($electrical_consultancy->getFillable());

        $request->validate([
            'name' => 'required|unique:engineering_works',
            'slug' => 'unique:engineering_works',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'engineering_works'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'engineering_work-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        // dd($data);

        $engineering_work->fill($data)->save();
        return redirect()->route('admin.engineering-work.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $engineering_work = ElectricalConsultancy::findOrFail($id);
        return view('admin.electrical-consultancy.edit', compact('engineering_work'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $engineering_work = ElectricalConsultancy::findOrFail($id);
        $data = $request->only($engineering_work->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('engineering_works')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('engineering_works')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$engineering_work->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('engineering_works')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('engineering_works')->ignore($id),
                ]
            ]);
            $data['photo'] = $engineering_work->photo;
        }

        // dd($data);

        $engineering_work->fill($data)->save();
        return redirect()->route('admin.engineering-work.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $engineering_work = ElectricalConsultancy::findOrFail($id);
        unlink(public_path('uploads/'.$engineering_work->photo));
        $engineering_work->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
