<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use DB; 

class ProductCategory extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index_product_category(){

       $productCategories = Category::where('status',1)->get();

        return view('product_category.all_product_category',compact('productCategories'));
    } 

    public function create_product_category(){
        return view('product_category.add_product_category');
    }

    public function product_category_store(Request $request){
        $validated = $request->validate([
            'cat_name' => 'required|max:255',
            'cat_des' => 'required',
            'cat_image' => 'required'
        ]);

        $data = array();

        $data['cat_name']=$request->cat_name;
        $data['cat_des']=$request->cat_des;

        $productCategoryName = str_replace(' ','_',$request->cat_name);

        if ($request->hasFile('cat_image')) {

            $file = $request->file('cat_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $productCategoryName.'_'.time().'.'.$extension;

            $file->move('product_category',$fileName);

            $imageName=$fileName;

            $data['cat_image']=$imageName;

            $employee = DB::table('categories')->insert($data);

            if ($employee) {
                $notification  = array(
                    'messege'=>'New Product Category Created Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Product Category Not Created Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
        else{

            $notification  = array(
                'messege'=>'New Product Category Image Not Found',
                'alert-type'=>'error'
            );

            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }

    }

    public function change_product_category_status($id){

        $category = Category::where('id',$id)
                        ->where('status',1)
                        ->first();

        $categoryStatus = $category->cat_status;

        if ($categoryStatus==1) {
            
            $updateCategoryerStatus = Category::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'cat_status'=>0
                                    ]);
        }
        else{

            $updateCategoryerStatus = Category::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'cat_status'=>1
                                    ]);
        }

        if ($updateCategoryerStatus) {
            $notification  = array(
                'messege'=>'Product Category Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Category Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_product_category($id){

        $dltCategory = DB::table('categories')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltCategory) {
            $notification  = array(
                'messege'=>'Product Category Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Product Category Not Deleted Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit_product_category($id){

        $singleProductCategory = DB::table('categories')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleProductCategory');

        if($data['singleProductCategory']!=''){
            return view('product_category.edit_product_category',compact('singleProductCategory'));
        }
        else{
            return view ('404');
        }
    }

    public function update_product_category(Request $request, $id){

        $validated = $request->validate([
            'cat_name' => 'required|max:255',
            'cat_des' => 'required'
        ]);

        $data = array();

        $data['cat_name']=$request->cat_name;
        $data['cat_des']=$request->cat_des;

        $productCategoryName = str_replace(' ','_',$request->cat_name);


        if ($request->hasFile('cat_image')) {

            $file = $request->file('cat_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $productCategoryName.'_'.time().'.'.$extension;

            $file->move('product_category',$fileName);

            $imageName=$fileName;

            $data['cat_image']=$imageName;

            $deleteImage = DB::table('categories')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "product_category/".$deleteImage->cat_image;
            unlink($deletePhoto);

            $updatecustomer = DB::table('categories')
                    ->where('id',$id)
                    ->update($data);

            if ($updatecustomer) {
                $notification  = array(
                    'messege'=>'Product Category Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Product Category Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $updatecustomer = DB::table('categories')
                    ->where('id',$id)
                    ->update($data);

            if ($updatecustomer) {
                $notification  = array(
                    'messege'=>'Product Category Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Customer Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function view_product_category($id){

        $singleProductCategory = DB::table('categories')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleProductCategory');

        if($data['singleProductCategory']!=''){
            return view('product_category.view_product_category',compact('singleProductCategory'));
        }
        else{
            return view ('404');
        }

    }
} 
