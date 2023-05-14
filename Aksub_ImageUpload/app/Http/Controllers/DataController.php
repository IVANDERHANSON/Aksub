<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function addImage() {
        return view('addImage');
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => ['required', 'image']
        ]);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/Data/', $filename);

        Data::create([
            'image' => $filename
        ]);
        
        return redirect('/');
    }

    public function show() {
        $allData = Data::all();
        return view('welcome', compact('allData'));
    }

    public function delete($id) {
        $data = Data::findOrFail($id);
        Storage::delete('public/Data/'.$data->image);
        $data->delete();
        return redirect('/');
    }
}
