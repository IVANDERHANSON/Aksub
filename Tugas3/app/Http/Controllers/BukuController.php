<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'publicationYear' => ['required'],
            'totalPage' => ['required'],
            'image' => ['required', 'image']
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/Images/', $imageName);

        Buku::create([
            'title' => $request->title,
            'author' => $request->author,
            'publicationYear' => $request->publicationYear,
            'totalPage' => $request->totalPage,
            'image' => $imageName
        ]);
        return redirect('buku/list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $bukus = Buku::all();
        return view('list', compact('bukus'));
    }

    public function download($id)
    {
        $buku = Buku::findorFail($id);
        $image = '/storage/images/' . $buku->image;
        $path = str_replace('\\', '/', public_path());
        return response()->download($path.$image);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view("edit", compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'publicationYear' => ['required'],
            'totalPage' => ['required'],
            'image' => ['required', 'image']
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/Images', $imageName);

        Buku::find($id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'publicationYear' => $request->publicationYear,
            'totalPage' => $request->totalPage,
            'image' => $imageName
        ]);
        return redirect('buku/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $buku = Buku::findOrFail($id);
        // Storage::delete('public/Images/'.$buku->image);
        // $buku->delete();
        $image = "/storage/Images/" . $buku->image;
        if(basename(asset($image)) == $buku->image) {
            $path = str_replace('\\', '/', public_path());
            unlink($path.$image);
            Buku::destroy($id);
        }
        else {
            Buku::destroy($id);
        }
        return redirect("/buku/list");
    }
}
