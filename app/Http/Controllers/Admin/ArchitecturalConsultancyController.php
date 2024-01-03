<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchitecturalConsultancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;


class ArchitecturalConsultancyController extends Controller
{
    public function index()
    {
        $architectural_consultancy = ArchitecturalConsultancy::all();
        return view('admin.architectural-consultancy.index', compact('architectural_consultancy'));
    }

    public function create()
    {
        return view('admin.architectural-consultancy.create');
    }

    public function store(Request $request)
    {
        
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $architectural_consultancy = new ArchitecturalConsultancy();
        $data = $request->only($architectural_consultancy->getFillable());

        $request->validate([
            'name' => 'required|unique:architectural_consultancies',
            'slug' => 'unique:architectural_consultancies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'architectural_consultancies'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $key = random_int(100000, 999999);
        $final_name = 'architectural_consultancy_'.$key.'-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $architectural_consultancy->fill($data)->save();
        return redirect()->route('admin.architectural-consultancy.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $architectural_consultancy = ArchitecturalConsultancy::findOrFail($id);
        return view('admin.architectural-consultancy.edit', compact('architectural_consultancy'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $architectural_consultancy = ArchitecturalConsultancy::findOrFail($id);
        $data = $request->only($architectural_consultancy->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('architectural_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('architectural_consultancies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$architectural_consultancy->photo));
            $ext = $request->file('photo')->extension();
            $key = random_int(100000, 999999);
            $final_name = 'architectural_consultancy_'.$key.'-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('architectural_consultancies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('architectural_consultancies')->ignore($id),
                ]
            ]);
            $data['photo'] = $architectural_consultancy->photo;
        }

        // dd($data);

        $architectural_consultancy->fill($data)->save();
        return redirect()->route('admin.architectural-consultancy.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $engineering_work = ArchitecturalConsultancy::findOrFail($id);
        unlink(public_path('uploads/'.$engineering_work->photo));
        $engineering_work->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}


