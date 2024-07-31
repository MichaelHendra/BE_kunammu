<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index() {
        $data = Barang::all();
        return response()->json($data);
    }

    public function show($id)  {
        $data = Barang::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kunam' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $barang = Barang::create($validatedData);

        return response()->json($barang, 201);
    }

    public function update($id, Request $request)  {
        $data = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kunam' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer',
            'image' => 'nullable|image|max:1024',
        ]);
        if($request->hasFile('image')){
            if($data->image){
                Storage::disk('public')->delete($data->image);
            }
            $imagePath = $request->file('image')->store('images','public');
            $validatedData['image'] = $imagePath;
        }
        $data->Update($validatedData);
        return response()->json($data);
    }

    public function delete($id) {
        $data = Barang::findOrFail($id);
        if($data->image){
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();

        return response()->json("Berhasil Dihapus");
    }
}
