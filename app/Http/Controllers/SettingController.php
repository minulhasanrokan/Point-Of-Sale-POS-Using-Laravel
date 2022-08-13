<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use DB;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function company_setting(){

        $setting = Setting::first();

        return view('setting.company_setting',compact('setting'));
    }

    public function update_company_setting(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'mobile' => 'required|max:255',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['country']=$request->country;
        $data['zip_code']=$request->zip_code;

        $conmpanyName = str_replace(' ','_',$request->name);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $fileName = $conmpanyName.'_'.time().'.'.$extension;

            $file->move('company',$fileName);

            $imageName=$fileName;

            $data['logo']=$imageName;

            $deleteImage = DB::table('settings')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "company/".$deleteImage->logo;
            unlink($deletePhoto);

            $updateCompany = DB::table('settings')
                    ->where('id',$id)
                    ->update($data);

            if ($updateCompany) {
                $notification  = array(
                    'messege'=>'Company Setting Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Company Setting Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $updatecustomer = DB::table('settings')
                    ->where('id',$id)
                    ->update($data);

            if ($updatecustomer) {
                $notification  = array(
                    'messege'=>'Company Setting Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Company Setting Not Updated Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }

    }

}
