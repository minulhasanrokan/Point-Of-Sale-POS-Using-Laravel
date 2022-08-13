<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $customers = Customer::where('status',1)->get();

        return view('customer.all_customer',compact('customers'));
    } 

    public function create(){
        return view('customer.add_customer');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'phone' => 'required|unique:customers|max:255',
            'address' => 'required',
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $customerName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $customerName.'_'.time().'.'.$extension;

            $file->move('customer',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $customer = DB::table('customers')->insert($data);

            if ($customer) {
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
        else{

            $customer = DB::table('customers')->insert($data);

            if ($customer) {
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

    public function view($id){

        //$singlacustomer = create_employes_table::findorfail($id);
        // $singlacustomer = create_employes_table::where('id',$id)
        //                ->first();
        $singleCustomer = DB::table('customers')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleCustomer');

        if($data['singleCustomer']!=''){
            return view('customer.view_customer',compact('singleCustomer'));
        }
        else{
            return view ('404');
        }

    }

    public function edit($id){

        //$singlacustomer = create_employes_table::findorfail($id);
        // $singlacustomer = create_employes_table::where('id',$id)
        //                ->first();
        $singleCustomer = DB::table('customers')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleCustomer');

        if($data['singleCustomer']!=''){
            return view('customer.edit_customer',compact('singleCustomer'));
        }
        else{
            return view ('404');
        }
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $customerName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $customerName.'_'.time().'.'.$extension;

            $file->move('customer',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $deleteImage = DB::table('customers')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "customer/".$deleteImage->photo;
            unlink($deletePhoto);

            $updatecustomer = DB::table('customers')
                    ->where('id',$id)
                    ->update($data);

            if ($updatecustomer) {
                $notification  = array(
                    'messege'=>'Customer Updated Successfully',
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
        else{

            $updatecustomer = DB::table('customers')
                    ->where('id',$id)
                    ->update($data);

            if ($updatecustomer) {
                $notification  = array(
                    'messege'=>'Customer Updated Successfully',
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

    public function delete($id){

       // $delete = DB::table('customers')
        //            ->where('id',$id)
         //           ->first();
       // $photo = "customer/".$delete->photo;
        //unlink($photo);

        //$dltcustomer = DB::table('customers')
         //               ->where('id',$id)
         //               ->delete();

        $dltcustomer = DB::table('customers')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltcustomer) {
            $notification  = array(
                'messege'=>'Customer Deleted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Customer Not Deleted Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

 
    public function change_status($id){

        $customer = Customer::where('id',$id)
                        ->where('status',1)
                        ->first();

        $customerStatus = $customer->customer_status;

        if ($customerStatus==1) {
            
            $updatecustomerStatus = Customer::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'customer_status'=>0
                                    ]);
        }
        else{

            $updatecustomerStatus = Customer::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'customer_status'=>1
                                    ]);
        }

        if ($updatecustomerStatus) {
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
