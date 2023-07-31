<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
   public function Index(){
      
    $products = Product::get();
    return view('frontend.index',compact('products'));
   }


   public function ProductModal($id){

      $product = Product::findOrFail($id);
      return response()->json(array(
         'product' => $product,
      ));

   }

   public function AddToCart(Request $request, $id){
      $image = Product::findOrFail($id);
      Cart::add([
         'id' => $id,
         'name' => $request->product_name,
         'qty' => $request->quantity,
         'price' => $request->price,
         'image' =>$image->product_thumbnail,
      ]);
      return response()->json(['success'=>'Added to Cart']);
   }

   public function AddMiniCart(){
        return response()->json(array(
            'carts' => Cart::content(),
            'cartQty' => Cart::count(),
            'cartTotal' => round(str_replace(',', '',Cart::total())),
        ));
    } // end method

        //Remove Mini Cart
    public function RemoveMiniCart($rowId){

        Cart::remove($rowId);
        return response()->json(['success'=>'Product Remove From Cart']);
    } // end method


   public function Checkout(){
         $carts = Cart::content();
         $cartQty =Cart::count();
         $cartTotal = round(str_replace(',', '',Cart::total()));
         if(Cart::total() > 1){
               return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
         }
    }

        public function CheckoutStore(Request $request){
         
        $data = [];
        $carts = Cart::content();
      
         foreach($carts as $item){
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['division'] = $request->division;
            $data['district'] = $request->district;
            $data['description'] = $request->description;
            $data['product_id'] = $item->id;
            $data['quantity'] = $item->qty;
            $data['status'] = 'pending';
            Shipping::insert($data);
         }
         Cart::destroy();
         return redirect()->route('home');

    }//end method
}

