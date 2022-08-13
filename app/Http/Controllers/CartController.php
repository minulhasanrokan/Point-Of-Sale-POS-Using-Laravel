<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function add_to_cart($id){

        $product = DB::table('products')
                    ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                    ->join('categories', 'categories.id', '=', 'products.cat_id')
                    ->select('products.*', 'suppliers.name as supplier_name','suppliers.id as supplier_id','categories.cat_name as category_name','categories.id as category_id')
                    ->where('products.id',$id)
                    ->where('products.status',1)
                    ->where('suppliers.status',1)
                    ->where('suppliers.supplier_status',1)
                    ->where('categories.status',1)
                    ->where('categories.cat_status',1)
                    ->where('products.product_status',1)
                    ->orderBy('products.id','DESC')
                    ->first();

        $data= compact('product');

        if($data['product']!=''){

            $cart = Cart::add(array(
                'id' => $id,
                'name' => $product->product_name,
                'price' => $product->sale_price,
                'quantity' => 1,
                'attributes' => array()
            ));

            if ($cart) {
                $notification  = array(
                    'messege'=>'Product Added Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Product Not Added Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            return view ('404');
        }
    }

    public function update_cart(Request $request, $id){
        
        $name = "cart_qty_".$id;

        $qty = $request->$name;

        $cart = Cart::update($id, array(
                        'quantity' => array(
                        'relative' => false,
                        'value' => $qty
                    ),
                ));

        if ($cart) {
            $notification  = array(
                'messege'=>'Product Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Not Updated Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function delete_cart_product($id){

        $cart = Cart::remove($id);

        if ($cart) {
            $notification  = array(
                'messege'=>'Product Removed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Not Removed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    
} 
