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
            'name' => 'required|unique:electrical_consultancies',
            'slug' => 'unique:electrical_consultancies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }
        $statement = DB::select("SHOW TABLE STATUS LIKE 'engineering_works'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $key = random_int(100000, 999999);
        $final_name = 'electrical_consultancy_'.$key.'-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $electrical_consultancy->fill($data)->save();
        return redirect()->route('admin.electrical-consultancy.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $electrical_consultancy = ElectricalConsultancy::findOrFail($id);
        return view('admin.electrical-consultancy.edit', compact('electrical_consultancy'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $electrical_consultancy = ElectricalConsultancy::findOrFail($id);
        $data = $request->only($electrical_consultancy->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('electrical_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('electrical_consultancies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$electrical_consultancy->photo));
            $ext = $request->file('photo')->extension();
            $key = random_int(100000, 999999);
            $final_name = 'electrical_consultancy_'.$key.'-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('electrical_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('electrical_consultancies')->ignore($id),
                ]
            ]);
            $data['photo'] = $electrical_consultancy->photo;
        }

        // dd($data);

        $electrical_consultancy->fill($data)->save();
        return redirect()->route('admin.electrical-consultancy.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $electrical_consultancy = ElectricalConsultancy::findOrFail($id);
        unlink(public_path('uploads/'.$electrical_consultancy->photo));
        $electrical_consultancy->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
