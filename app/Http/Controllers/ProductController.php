<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use DB;


use Illuminate\Http\Request;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function create_product(){

        $productCategories = Category::where('status',1)->where('cat_status',1)->get();

        $suppliers = Supplier::where('status',1)->where('supplier_status',1)->get();


        return view('product.add_product',compact('productCategories','suppliers'));
    }

    public function product_store(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'cat_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required',
            'product_place' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'sale_price' => 'required'
        ]);

        $data = array();

        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['supplier_id']=$request->supplier_id;
        $data['product_code']=$request->product_code;
        $data['product_place']=$request->product_place;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['sale_price']=$request->sale_price;
        $data['product_des']=$request->product_des;


        $productName = str_replace(' ','_',$request->product_name);

        if ($request->hasFile('product_image')) {

            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $productName.'_'.time().'.'.$extension;

            $file->move('product',$fileName);

            $imageName=$fileName;

            $data['product_image']=$imageName;

            $product = DB::table('products')->insert($data);

            if ($product) {
                $notification  = array(
                    'messege'=>'New Product Created Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Product Not Created Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $product = DB::table('products')->insert($data);

            if ($product) {
                $notification  = array(
                    'messege'=>'New Product Created Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Product Not Created Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }

    }

    public function index_product(){

        $productCategories = Category::where('status',1)->where('cat_status',1)->get();

        $suppliers = Supplier::where('status',1)->get();

        $products = Product::where('status',1)->get();

        $products = DB::table('products')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->select('products.*', 'suppliers.name as supplier_name','suppliers.id as supplier_id','categories.cat_name as category_name','categories.id as category_id')
                ->where('products.status',1)
                ->where('suppliers.status',1)
                ->where('suppliers.supplier_status',1)
                ->where('categories.status',1)
                ->where('categories.cat_status',1)
                ->orderBy('products.id','DESC')
                ->get();


        return view('product.all_product',compact('productCategories','suppliers','products'));
    }

    public function view_product($id){


        $product = DB::table('products')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->select('products.*', 'suppliers.name as supplier_name','suppliers.id as supplier_id','categories.cat_name as category_name','categories.id as category_id')
                ->where('products.status',1)
                ->where('products.id',$id)
                ->where('suppliers.status',1)
                ->where('suppliers.supplier_status',1)
                ->where('categories.status',1)
                ->where('categories.cat_status',1)
                ->orderBy('products.id','DESC')
                ->first();

        $data= compact('product');

        if($data['product']!=''){
            return view('product.view_product',compact('product'));
        }
        else{
            return view ('404');
        }

    }

    public function change_product_status($id){

        $product = Product::where('id',$id)
                        ->where('status',1)
                        ->first();

        $productStatus = $product->product_status;

        if ($productStatus==1) {
            
            $updateProductStatus = Product::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'product_status'=>0
                                    ]);
        }
        else{

            $updateProductStatus = Product::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'product_status'=>1
                                    ]);
        }

        if ($updateProductStatus) {
            $notification  = array(
                'messege'=>'Product Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_product($id){


        $dltProduct = DB::table('products')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltProduct) {
            $notification  = array(
                'messege'=>'Product Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Not Deleted Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit_product($id){

        $product = DB::table('products')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->select('products.*', 'suppliers.name as supplier_name','suppliers.id as supplier_id','categories.cat_name as category_name','categories.id as category_id')
                ->where('products.status',1)
                ->where('products.id',$id)
                ->where('suppliers.status',1)
                ->where('suppliers.supplier_status',1)
                ->where('categories.status',1)
                ->where('categories.cat_status',1)
                ->orderBy('products.id','DESC')
                ->first();


        $productCategories = Category::where('status',1)->where('cat_status',1)->get();

        $suppliers = Supplier::where('status',1)->where('supplier_status',1)->get();

        $data= compact('product');

        if($data['product']!=''){
            return view('product.edit_product',compact('product','productCategories','suppliers'));
        }
        else{
            return view ('404');
        }
    }

    public function update_product(Request $request, $id){

        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'cat_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required',
            'product_place' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'sale_price' => 'required'
        ]);

        $data = array();

        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['supplier_id']=$request->supplier_id;
        $data['product_code']=$request->product_code;
        $data['product_place']=$request->product_place;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['sale_price']=$request->sale_price;
        $data['product_des']=$request->product_des;


        $productName = str_replace(' ','_',$request->product_name);


        if ($request->hasFile('product_image')) {

            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $productName.'_'.time().'.'.$extension;

            $file->move('product',$fileName);

            $imageName=$fileName;

            $data['product_image']=$imageName;

            $deleteImage = DB::table('products')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "product/".$deleteImage->product_image;
            unlink($deletePhoto);

            $updateProduct = DB::table('products')
                    ->where('id',$id)
                    ->update($data);

            if ($updateProduct) {
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
        else{

            $updateProduct = DB::table('products')
                    ->where('id',$id)
                    ->update($data);

            if ($updateProduct) {
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
    }

    public function import_product(){

        return view('product.import_product');
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');

    }


    public function import(Request $request) 
    {
        $product = Excel::import(new ProductsImport, $request->file('import_product_file'));

        if ($product) {
            $notification  = array(
                'messege'=>'New Product Imported Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'New Product Not Imported Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}

