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
        return response()->json($product);
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
        $product->file = $req->file;
        $product->save();

        $res=[
          "message"=>"Product Created Successfully"
        ];
        return response()->json($res);
    }

    // delete product
    public function DeleteProduct($id)
    {
        $product = addproduct::find($id);
        $product->delete();
        $res = [
            'message' => 'Product deleted successfully'
        ];
        return response()->json($res);
    }

    // update product
    public function update(Request $req, $id)
    {
        $product = addproduct::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->offer = $req->offer;
        $product->important_note = $req->important_note;
        $product->product_details = $req->product_details;
        $product->file = $req->file;
        $product->update();
        $res = [
            "message" => " Product Updated Successfully"
        ];
        return response()->json($res);
    }
}
