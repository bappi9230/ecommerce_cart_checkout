<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function Index(){
        $products = Product::get();
        return view('backend.product.all_product',compact('products'));
    }

    public function AddProduct(){
        return view('backend.product.add_product');
    }

    public function StoreProduct(Request $request){

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(150, 150)->save('backend/product/' . $name_gen);

        $save_url = 'backend/product/' . $name_gen;

        Product::insert([
            'product_name' => $request->product_name,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'description' => $request->description,
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all_product');
    }
}
