<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function Index(){
        $ship = Shipping::get();
        return view('backend.index',compact('ship'));
    }

    public function ChangeStatus($id){

        Shipping::findOrFail($id)->update([
            'status'=>'complete'
        ]);
        $notification = array(
    'message' => 'Order status Changed',
    'alert-type' => 'success',
);

        return redirect()->route('admin')->with($notification);
    }
}
