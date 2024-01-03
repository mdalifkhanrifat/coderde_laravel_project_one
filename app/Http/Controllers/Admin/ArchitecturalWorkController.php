<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchitecturalWork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ArchitecturalWorkController extends Controller
{
    public function index()
    {
        $architectural_work = ArchitecturalWork::all();
        return view('admin.architectural-work.index', compact('architectural_work'));
    }

    public function create()
    {
        return view('admin.architectural-work.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $architectural_work = new ArchitecturalWork();
        $data = $request->only($architectural_work->getFillable());

        $request->validate([
            'name' => 'required|unique:architectural_works',
            'slug' => 'unique:architectural_works',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'architectural_works'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $key = random_int(100000, 999999);
        $final_name = 'architectural_work_'. $key. '-' .$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        // dd($data);
        $architectural_work->fill($data)->save();
        return redirect()->route('admin.architectural-work.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $architectural_work = ArchitecturalWork::findOrFail($id);
        return view('admin.architectural-work.edit', compact('architectural_work'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $architectural_work = ArchitecturalWork::findOrFail($id);
        $data = $request->only($architectural_work->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('architectural_works')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('architectural_works')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$architectural_work->photo));
            $ext = $request->file('photo')->extension();
            $key = random_int(100000, 999999);
            $final_name = 'architectural_work_'. $key. '-' .$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('architectural_works')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('architectural_works')->ignore($id),
                ]
            ]);
            $data['photo'] = $architectural_work->photo;
        }

        // dd($data);

        $architectural_work->fill($data)->save();
        return redirect()->route('admin.architectural-work.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $architectural_work = ArchitecturalWork::findOrFail($id);
        unlink(public_path('uploads/'.$architectural_work->photo));
        $architectural_work->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
