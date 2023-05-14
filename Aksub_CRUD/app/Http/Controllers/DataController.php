<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'company' => ['required', 'min: 5', 'max: 100'],
            'capital' => ['required', 'min: 5', 'max: 100']
        ]);
        
        Data::create([
            'company' => $request->company,
            'capital' => $request->capital
        ]);

        return redirect('/');
    }

    public function show() {
        $allData = Data::all();
        return view('welcome', compact('allData'));
    }
    
    public function edit($id) {
        $data = Data::findOrFail($id);
        return view('/editData', compact('data'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'company' => ['required', 'min: 5', 'max: 100'],
            'capital' => ['required', 'min: 5', 'max: 100']
        ]);

        Data::findOrFail($id)->update([
            'company' => $request->company,
            'capital' => $request->capital
        ]);
        return redirect('/');
    }
    
    public function delete($id) {
        Data::destroy($id);
        return redirect('/');
    }
}
