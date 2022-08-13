<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){ 

        $suppliers = Supplier::where('status',1)->get();

        return view('supplier.all_supplier',compact('suppliers'));
    } 

    public function create(){
        return view('supplier.add_supplier');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:create_employes_tables|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'shop' => 'required',
            'nid_no' => 'required',
            'city' => 'required', 
            'account_holder' => 'required',
            'account_number' => 'required|max:255',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'type' => 'required'
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['nid_no']=$request->nid_no;
        $data['city']=$request->city;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['type']=$request->type;

        $csupplierName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $csupplierName.'_'.time().'.'.$extension;

            $file->move('supplier',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $supplier = DB::table('suppliers')->insert($data);

            if ($supplier) {
                $notification  = array(
                    'messege'=>'New Supplier Created Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Supplier Not Created Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $supplier = DB::table('suppliers')->insert($data);

            if ($supplier) {
                $notification  = array(
                    'messege'=>'New Employe Created Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Employe Not Created Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }

    }


    public function delete($id){

       // $delete = DB::table('suppliers')
        //            ->where('id',$id)
         //           ->first();
       // $photo = "supplier/".$delete->photo;
        //unlink($photo);

        //$dltEmployee = DB::table('suppliers')
         //               ->where('id',$id)
         //               ->delete();

        $dltSupplier = DB::table('suppliers')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltSupplier) {
            $notification  = array(
                'messege'=>'Supplier Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'dltSupplier Not Deleted Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function change_status($id){

        $supplier = DB::table('suppliers')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $supplierStatus = $supplier->supplier_status;

        if ($supplierStatus==1) {
            
            $updateSupplierStatus = DB::table('suppliers')
                            ->where('id',$id)
                            ->update(
                                [
                                    'supplier_status'=>0
                                ]);
        }
        else{

            $updateSupplierStatus = DB::table('suppliers')
                            ->where('id',$id)
                            ->update(
                                [
                                    'supplier_status'=>1
                                ]);
        }

        if ($updateSupplierStatus) {
            $notification  = array(
                'messege'=>'Supplier Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Supplier Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id){

        $singleSupplier = DB::table('suppliers')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleSupplier');

        if($data['singleSupplier']!=''){
            return view('supplier.edit_customer',compact('singleSupplier'));
        }
        else{
            return view ('404');
        }
    }

    public function update(Request $request, $id){

         $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:create_employes_tables|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'shop' => 'required',
            'nid_no' => 'required',
            'city' => 'required', 
            'account_holder' => 'required',
            'account_number' => 'required|max:255',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'type' => 'required'
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['nid_no']=$request->nid_no;
        $data['city']=$request->city;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['type']=$request->type;

        $supplierName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $supplierName.'_'.time().'.'.$extension;

            $file->move('supplier',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $deleteImage = DB::table('suppliers')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "supplier/".$deleteImage->photo;
            unlink($deletePhoto);

            $updateSupplier = DB::table('suppliers')
                    ->where('id',$id)
                    ->update($data);

            if ($updateSupplier) {
                $notification  = array(
                    'messege'=>'Supplier Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Supplier Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $updateSupplier = DB::table('suppliers')
                    ->where('id',$id)
                    ->update($data);

            if ($updateSupplier) {
                $notification  = array(
                    'messege'=>'Supplier Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Supplier Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function view($id){

        $singleSupplier = DB::table('suppliers')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleSupplier');

        if($data['singleSupplier']!=''){
            return view('supplier.view_supplier',compact('singleSupplier'));
        }
        else{
            return view ('404');
        }

    }
}
