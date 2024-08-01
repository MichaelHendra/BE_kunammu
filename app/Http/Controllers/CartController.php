<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show($id) {
        $data = Cart::Where('user_id', $id)->where('valid', 0)->get();
        return response()->json($data);
    }
    public function addToCart(Request $request) {
        $validatedData = $request->validate([
            'kunam_id' => 'required|string|exists:barangs,kunam_id',
            'user_id' => 'required|string|exists:users,id',
            'total_kunam' => 'required|integer|min:1',
        ]);
        $dataBarang = Barang::where('kunam_id', $request->kunam_id)->first();
        if ($dataBarang->stok == 0) {
            return response()->json('Barang Telah Habis', 422);
        } else if($dataBarang->stok < $request->total_kunam){
            return response()->json('Stok Barang Kurang', 422);
        }

        $cart = Cart::where('kunam_id', $request->kunam_id)
                    ->where('user_id', $request->user_id)
                    ->where('valid', 0)
                    ->first();
        if ($cart) {
            $cart->update([
                'total_kunam' => $cart->total_kunam + $validatedData['total_kunam'],
            ]);
        } else {
            $cart = Cart::create([
                'kunam_id' => $validatedData['kunam_id'],
                'user_id' => $validatedData['user_id'],
                'total_kunam' => $validatedData['total_kunam'],
                'valid' => 0,
            ]);
        }
        return response()->json($cart, 201);
    }
    public function deleteCart($id)  {
        $cart = Cart::find($id);
        $cart->delete();

        return response()->json('Berhasil Dihapus');
    }

}
