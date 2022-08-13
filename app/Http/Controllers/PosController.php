<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;
use DB;
use Cart;

use Illuminate\Http\Request;

class PosController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $products = DB::table('products')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->select('products.*', 'suppliers.name as supplier_name','suppliers.id as supplier_id','categories.cat_name as category_name','categories.id as category_id')
                ->where('products.status',1)
                ->where('suppliers.status',1)
                ->where('suppliers.supplier_status',1)
                ->where('categories.status',1)
                ->where('categories.cat_status',1)
                ->where('products.product_status',1)
                ->orderBy('products.id','DESC')
                ->get();

        $customers = Customer::where('status',1)->where('customer_status',1)->get();

        $productCategories = Category::where('status',1)->where('cat_status',1)->get();

        $cartData = Cart::getContent();

        return view('pos.index',compact('products','customers','productCategories','cartData'));
    }

    public function create_invoice (Request $request){

        $validated = $request->validate([
            'customer_id' => 'required',
        ]);

        $customer_id = $request->customer_id;

        $order = new Order();

        $orderId =  DB::table('orders')->orderBy('id', 'DESC')->first();
        $orderId = $orderId + 1;

        $customer = Customer::where('status',1)->where('customer_status',1)->where('id',$customer_id)->first();

        $contents = Cart::getContent();

        
        return view('pos.invoice',compact('customer','contents','orderId'));
    }

    public function final_invoice(Request $request){

        $validated = $request->validate([
            'payment_status' => 'required',
        ]);

        $data = array();

        $data['payment_status']=$request->payment_status;
        $data['due']=$request->due;
        $data['pay']=$request->pay;
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['total']=$request->total;

        $order_id = DB::table('orders')->insertGetId($data);

        $contents = Cart::getContent();

        $orders = array();

        foreach ($contents as $content) {
           
            $orders['order_id']=$order_id;
            $orders['product_id']=$content->id;
            $orders['quantity']=$content->quantity;
            $orders['unit_cost']=$content->price;
            $orders['total']=$content->price*$content->quantity;
        }

        $orderDetails = DB::table('order_details')->insert($orders);
        
        if ($orderDetails) {
            Cart::clear();
            $notification  = array(
                'messege'=>'New Invoice Created Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('index.pos')->with($notification);
        }
        else{
            Cart::clear();
            $notification  = array(
                'messege'=>'New Invoice Not Created Successfully',
                'alert-type'=>'error'
            );
            return redirect()->route('index.pos')->with($notification);
        }

    }

    public function pending_order(){

        $orders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.*', 'customers.name as customers_name','customers.id as customers_id')
                ->where('customers.customer_status',1)
                ->where('customers.status',1)
                ->where('orders.order_status',"Pending")
                ->where('orders.status',1)
                ->orderBy('orders.id','DESC')
                ->get();

        return view('pos.pending_order',compact('orders'));

    }

    public function complete_order(){

        $orders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.*', 'customers.name as customers_name','customers.id as customers_id')
                ->where('customers.customer_status',1)
                ->where('customers.status',1)
                ->where('orders.order_status',"Complete")
                ->where('orders.status',1)
                ->orderBy('orders.id','DESC')
                ->get();

        return view('pos.complete_order',compact('orders'));

    }

    public function view_order($id){

        $orderDetails = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->select('orders.*','order_details.*','products.*', 'customers.name as customers_name','customers.id as customers_id')
                ->where('customers.customer_status',1)
                ->where('orders.id',$id)
                ->where('customers.status',1)
                ->where('orders.status',1)
                ->orderBy('orders.id','DESC')
                ->get();

        $order = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.*','orders.id as order_mst_id', 'customers.*')
                ->where('customers.customer_status',1)
                ->where('orders.id',$id)
                ->where('customers.status',1)
                ->where('orders.status',1)
                ->orderBy('orders.id','DESC')
                ->first();



        return view('pos.order_details',compact('orderDetails','order'));


    }

    public function done_order($id){

        $doneOrder = Order::where('id',$id)
                ->where('id',$id)
                ->update(
                    [
                        'order_status'=>"Complete"
                    ]);

        if ($doneOrder) {
            $notification  = array(
                'messege'=>'Customer Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'customer Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
