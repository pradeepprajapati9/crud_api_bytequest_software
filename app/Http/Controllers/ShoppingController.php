<?php

namespace App\Http\Controllers;

use App\Models\addproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShoppingController extends Controller
{

    // all product
    public function GetAllProduct()
    {
        $product = addproduct::all();
        return response()->json(['product' => $product]);
    }

    // create and store prodcut
    public function Storeproduct(Request $req)
    {

        $product = new addproduct;
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->offer = $req->offer;
        $product->important_note = $req->important_note;
        $product->product_details = $req->product_details;
        $product->file = $req->file('file')->store('storephoto', 'public');
        $product->save();
        return response()->json(['res' => 'Product Created Successfully']);
    }

    // delete product
    public function DeleteProduct($id)
    {
        addproduct::where('id', $id)->delete();
        return response()->json(['res' => 'Product deleted successfully']);
    }

    // update product
    public function edit($id)
    {
        $product = addproduct::where('id', $id)->get();
        return view('assigmentApi.edit', ['product' => $product]);
    }

    public function updataProduct(Request $req)
    {
        $product = addproduct::find($req->id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->offer = $req->offer;
        $product->important_note = $req->important_note;
        $product->product_details = $req->product_details;
        if ($req->file('file')) {
            $product->file = $req->file('file')->store('storephoto', 'public');
        }
        $product->save();
        return response()->json(["res" => " Product Updated Successfully"]);
    }
}
