<?php

namespace App\Http\Controllers;
use App\Models\create_employes_table;
use App\Models\Salary;
use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function adnanced_index(){

        $salaries = DB::table('advanced_salaries')
                        ->where('status',1)
                        ->get();

        $salaries = DB::table('advanced_salaries')
                ->join('create_employes_tables', 'create_employes_tables.id', '=', 'advanced_salaries.user_id')
                ->select('advanced_salaries.*', 'create_employes_tables.name','create_employes_tables.id as user_id','create_employes_tables.salary as user_salary','create_employes_tables.photo as photo','create_employes_tables.phone')
                ->where('advanced_salaries.status',1)
                ->where('create_employes_tables.status',1)
                ->where('create_employes_tables.employee_status',1)
                ->orderBy('advanced_salaries.month','DESC')
                ->orderBy('advanced_salaries.year','DESC')
                ->get();

        return view('salary.all_advanced_salary',compact('salaries'));
    } 

    public function adnanced_create(){

        $employees = create_employes_table::where('status',1)
                    ->where('employee_status',1)
                    ->where('status',1)
                    ->get();
        return view('salary.add_advanced_salary',compact('employees'));
    }

    public function pay_salary_create(){

        $employees = create_employes_table::where('status',1)
                    ->where('employee_status',1)
                    ->get();

        return view('salary.pay_salary',compact('employees'));
    }

    public function adnanced_store (Request $request){

        $validated = $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'advance_salary' => 'required'
        ]);

        $month=$request->month;
        $user_id=$request->user_id;
        $year=$request->year;
        $advance_salary=$request->advance_salary;


        $currentMonth = date('m');
        $currentYear = date('Y');

        if ($month!=number_format($currentMonth) && $year!=number_format($currentYear)) {
                
                $notification  = array(
                    'messege'=>'You Can Not Pay Advanced Salay Before Or After Month Salary',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);

            die;
        }

        $employee = create_employes_table::where('status',1)
                    ->where('employee_status',1)
                    ->where('id',$user_id)
                    ->first();

        $currentSalary = $employee->salary;

        $pre_advanced = DB::table('advanced_salaries')
                        ->where('status', 1)
                        ->where('salary_status', 1)
                        ->where('user_id', $user_id)
                        ->where('month', $month)
                        ->where('year', $year)
                        ->sum('advance_salary');


        $data = array();

        $data['user_id']=$request->user_id;
        $data['month']=$request->month;
        $data['year']=$request->year;
        $data['advance_salary']=$request->advance_salary;

        if (($pre_advanced+$advance_salary)<$currentSalary) {

            $data['salary']=$currentSalary;
            
            $advancedsalry = DB::table('advanced_salaries')->insert($data);

            if ($advancedsalry) {
                $notification  = array(
                    'messege'=>'New Advanced Salary Paid Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Advanced Salary Not Paid Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $advancedsalry = false;

            if ($advancedsalry) {
                $notification  = array(
                    'messege'=>'New Advanced Salary Paid Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Advanced Salary Not Paid Successfully, Sdvanced Salary Corss The Current Salary',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function change_advanced_salary_status($id){

        $advancedSalary = DB::table('advanced_salaries')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $advancedSalaryStatus = $advancedSalary->salary_status;

        $month = $advancedSalary->month;
        $year = $advancedSalary->month;

        $currentMonth = date('m');
        $currentYear = date('Y');

        if ($month!=number_format($currentMonth) && $year!=number_format($currentYear)) {
                
                $notification  = array(
                    'messege'=>'You Can Not Change Advanced Salary Status Before Or After Month Salary',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);

            die;
        }


        if ($advancedSalaryStatus==1) {
            
            $updateAdvancedSalaryStatus = DB::table('advanced_salaries')
                                ->where('id',$id)
                                ->update(
                                    [
                                        'salary_status'=>0
                                    ]);
        }
        else{

            $updateAdvancedSalaryStatus = DB::table('advanced_salaries')
                                ->where('id',$id)
                                ->update(
                                    [
                                        'salary_status'=>1
                                    ]);
        }

        if ($updateAdvancedSalaryStatus) {
            $notification  = array(
                'messege'=>'Advanced Salary Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Advanced Salary Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_advanced_salary($id){


        $advancedSalary = DB::table('advanced_salaries')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $advancedSalaryStatus = $advancedSalary->salary_status;

        $month = $advancedSalary->month;
        $year = $advancedSalary->month;

        $currentMonth = date('m');
        $currentYear = date('Y');

        if ($month!=number_format($currentMonth) && $year!=number_format($currentYear)) {
                
                $notification  = array(
                    'messege'=>'You Can Not Delete Advanced Salary Before Or After Month Salary',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);

            die;
        }

        $dltAdvancedSalary = DB::table('advanced_salaries')
                    ->where('id',$id)
                    ->update([
                        'status' => 0
                    ]);

        if ($dltAdvancedSalary) {
            $notification  = array(
                'messege'=>'Advanced Salary Deleted Successfully',
                'alert-type'=>'success'
            );
            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Advanced Salary Not Deleted Successfully',
                'alert-type'=>'error'
            );
            toast('Success Toast','success');
            return redirect()->back()->with($notification);
        }
    }
}
 