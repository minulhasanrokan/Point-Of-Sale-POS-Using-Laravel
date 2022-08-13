<?php

namespace App\Http\Controllers;
use App\Models\create_employes_table;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;

class Employe extends Controller
{ 
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $employees = create_employes_table::where('status',1)->get();

        return view('employee.all_employee',compact('employees'));
    } 

    public function create(){
        return view('employee.add_employee');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:create_employes_tables|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'experience' => 'required',
            'nid_no' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required', 
            'image' => 'required'
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['city']=$request->city;
        $data['vacation']=$request->vacation;
        $data['nid_no']=$request->nid_no;

        $employeeName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $employeeName.'_'.time().'.'.$extension;

            $file->move('employee',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $employee = DB::table('create_employes_tables')->insert($data);

            if ($employee) {
                $notification  = array(
                    'messege'=>'New Employe Created Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Employe Not Created Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
        else{

            $notification  = array(
                'messege'=>'New Employe Image Not Found',
                'alert-type'=>'error'
            );

            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }

    }

    public function view($id){

        //$singlaEmployee = create_employes_table::findorfail($id);
        // $singlaEmployee = create_employes_table::where('id',$id)
        //                ->first();
        $singlaEmployee = DB::table('create_employes_tables')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singlaEmployee');

        if($data['singlaEmployee']!=''){
            return view('employee.view_employee',compact('singlaEmployee'));
        }
        else{
            return view ('404');
        }

    }

    public function edit($id){

        //$singlaEmployee = create_employes_table::findorfail($id);
        // $singlaEmployee = create_employes_table::where('id',$id)
        //                ->first();
        $singlaEmployee = DB::table('create_employes_tables')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singlaEmployee');

        if($data['singlaEmployee']!=''){
            return view('employee.edit_employee',compact('singlaEmployee'));
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
            'experience' => 'required',
            'nid_no' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required', 
        ]);

        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['city']=$request->city;
        $data['vacation']=$request->vacation;
        $data['nid_no']=$request->nid_no;


        $employeeName = str_replace(' ','_',$request->name);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $employeeName.'_'.time().'.'.$extension;

            $file->move('employee',$fileName);

            $imageName=$fileName;

            $data['photo']=$imageName;

            $deleteImage = DB::table('create_employes_tables')
                        ->where('id',$id)
                        ->first();
            $deletePhoto = "employee/".$deleteImage->photo;
            unlink($deletePhoto);

            $updateEmployee = DB::table('create_employes_tables')
                    ->where('id',$id)
                    ->update($data);

            if ($updateEmployee) {
                $notification  = array(
                    'messege'=>'Employee Updated Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Employee Not Updated Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
        else{

            $updateEmployee = DB::table('create_employes_tables')
                    ->where('id',$id)
                    ->update($data);

            if ($updateEmployee) {
                $notification  = array(
                    'messege'=>'Employee Updated Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Employee Not Updated Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
    }

    public function delete($id){

       // $delete = DB::table('create_employes_tables')
        //            ->where('id',$id)
         //           ->first();
       // $photo = "employee/".$delete->photo;
        //unlink($photo);

        //$dltEmployee = DB::table('create_employes_tables')
         //               ->where('id',$id)
         //               ->delete();

        $dltEmployee = DB::table('create_employes_tables')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltEmployee) {
            $notification  = array(
                'messege'=>'Employe Deleted Successfully',
                'alert-type'=>'success'
            );
            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Employe Not Deleted Successfully',
                'alert-type'=>'error'
            );
            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }
    }

    public function change_status($id){

        $Employe = DB::table('create_employes_tables')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $EmployeeStatus = $Employe->employee_status;

        if ($EmployeeStatus==1) {
            
            $updateEmployeeStatus = DB::table('create_employes_tables')
                                ->where('id',$id)
                                ->update(
                                    [
                                        'employee_status'=>0
                                    ]);
        }
        else{

            $updateEmployeeStatus = DB::table('create_employes_tables')
                                ->where('id',$id)
                                ->update(
                                    [
                                        'employee_status'=>1
                                    ]);
        }

        if ($updateEmployeeStatus) {
            $notification  = array(
                'messege'=>'Employee Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Employee Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
