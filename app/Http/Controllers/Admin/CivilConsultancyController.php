<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilConsultancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class CivilConsultancyController extends Controller
{
    public function index()
    {
        $civil_consultancy = CivilConsultancy::all();
        return view('admin.civil-consultancy.index', compact('civil_consultancy'));
    }

    public function create()
    {
        return view('admin.civil-consultancy.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $civil_consultancy = new CivilConsultancy();
        $data = $request->only($civil_consultancy->getFillable());

        $request->validate([
            'name' => 'required|unique:civil_consultancies',
            'slug' => 'unique:civil_consultancies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'engineering_works'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $key = random_int(100000, 999999);
        $final_name = 'civil_consultancy_'.$key.'-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        // dd($data);
        $civil_consultancy->fill($data)->save();
        return redirect()->route('admin.civil-consultancy.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $civil_consultancy = CivilConsultancy::findOrFail($id);
        return view('admin.civil-consultancy.edit', compact('civil_consultancy'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $civil_consultancy = CivilConsultancy::findOrFail($id);
        $data = $request->only($civil_consultancy->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('civil_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('civil_consultancies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            unlink(public_path('uploads/'.$civil_consultancy->photo));

            $ext = $request->file('photo')->extension();
            $key = random_int(100000, 999999);
            $final_name = 'civil_consultancy_'.$key.'-'.$id.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('civil_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('civil_consultancies')->ignore($id),
                ]
            ]);
            $data['photo'] = $civil_consultancy->photo;
        }

        // dd($data);

        $civil_consultancy->fill($data)->save();
        return redirect()->route('admin.civil-consultancy.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $civil_consultancy = CivilConsultancy::findOrFail($id);
        unlink(public_path('uploads/'.$civil_consultancy->photo));
        $civil_consultancy->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
