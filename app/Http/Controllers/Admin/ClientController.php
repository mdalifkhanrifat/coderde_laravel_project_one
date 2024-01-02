<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('admin.client.index', compact('client'));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'client_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'clients'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('client_photo')->extension();
        $final_name = 'client-'.$ai_id.'.'.$ext;
        $request->file('client_photo')->move(public_path('uploads/'), $final_name);
        
        $client = new Client();
        $data = $request->only($client->getFillable());

        unset($data['client_photo']);
        $data['client_photo'] = $final_name;

        $client->fill($data)->save();

        return redirect()->route('admin.client.index')->with('success', 'Slider is added successfully!');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        // dd($client);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $client = Client::findOrFail($id);
        $data = $request->only($client->getFillable());

        if ($request->hasFile('client_photo')) {

            $request->validate([
                'client_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            unlink(public_path('uploads/'.$client->client_photo));

            // Uploading the file
            $ext = $request->file('client_photo')->extension();
            $final_name = 'client-'.$id.'.'.$ext;
            $request->file('client_photo')->move(public_path('uploads/'), $final_name);

            unset($data['client_photo']);
            $data['client_photo'] = $final_name;
        }

        $client->fill($data)->save();

        return redirect()->route('admin.client.index')->with('success', 'Slider is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $client = Client::findOrFail($id);
        unlink(public_path('uploads/'.$client->client_photo));
        $client->delete();

        return Redirect()->back()->with('success', 'Slider is deleted successfully!');
    }

}
