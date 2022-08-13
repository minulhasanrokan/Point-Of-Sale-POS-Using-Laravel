<?php

namespace App\Http\Controllers;
use App\Models\create_employes_table;
use App\Models\Attendance;

use Illuminate\Http\Request; 
use DB;

class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function take_attendance(){

        $date = date('d/m/y');

        $attendances = Attendance::where('status',1)
                                    ->where('att_status',1)
                                    ->where('att_date',$date)
                                    ->orderBy('user_id')
                                    ->get();

        $user_ids = '';
        foreach ($attendances as $id) {
            
            if ($user_ids!='') {
                $user_ids .= ",";
            }
             $user_ids .= $id->user_id;
        }


        $myArray = explode(',', $user_ids);
        
        $employees = create_employes_table::where('status',1)
                                            ->where('employee_status',1)
                                            ->whereNotIn('id', $myArray)
                                            ->get();

        return view('attendance.take_attendance',compact('employees'));

    }

    public function attendance_store(Request $request){

        foreach ($request->user_id as $id) {

            if(isset($request->attendance[$id])){

                $attendances = Attendance::where('status',1)
                                    ->where('att_status',1)
                                    ->where('att_date',$request->att_date)
                                    ->where('user_id',$id)
                                    ->first();
                if ($attendances==false) {
                    $data[]= [
                        "user_id"=>$id,
                        "attendance"=>$request->attendance[$id],
                        "att_date"=>$request->att_date,
                        "att_year"=>$request->att_year,
                        "month"=>$request->month,
                        "edit_date"=>date("d_m_y"),
                    ];

                }
            }
        }

        if (isset($data)) {
            $att = DB::table('attendances')->insert($data);
        }
        else{
            $att = false;
        }

        if ($att) {
            $notification  = array(
                'messege'=>'Attendance Taked Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Attendance Not Taked Successfully',
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }


    }

    public function all_attendance(){

        $attendances = Attendance::where('status',1)
                                    ->get();

        return view('attendance.all_attendance',compact('attendances',));
    }


    public function change_attendance_status($id){

        $attendance = Attendance::where('id',$id)
                        ->where('status',1)
                        ->first();

        $attendanceStatus = $attendance->att_status;

        if ($attendanceStatus==1) {
            
            $updateAttendanceStatus = Attendance::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'att_status'=>0
                                    ]);
        }
        else{

            $updateAttendanceStatus = Attendance::where('id',$id)
                                ->where('id',$id)
                                ->update(
                                    [
                                        'att_status'=>1
                                    ]);
        }

        if ($updateAttendanceStatus) {
            $notification  = array(
                'messege'=>'Attendance Status Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Attendance Status Not Changed Successfully',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_attendance($id){

        $attendance = DB::table('attendances')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $attendanceDate = $attendance->att_date;

        $today = date('d/m/y');

        if ($attendanceDate==$today) {

            $dltAttendance = DB::table('attendances')
                        ->where('id',$id)
                        ->update([
                            'status' => 0
                        ]);

            if ($dltAttendance) {
                $notification  = array(
                    'messege'=>'Attendance Deleted Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Attendance Not Deleted Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $notification  = array(
                'messege'=>'You Can Not Delete Before Or After Date Attendance',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function edit_attendance($id){


        $singleAttendance = DB::table('attendances')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        
        $employee = create_employes_table::where('status',1)
                                            ->where('employee_status',1)
                                            ->where('id', $singleAttendance->user_id)
                                            ->first();


        $data= compact('singleAttendance');

        if($data['singleAttendance']!=''){

            $today = date('d/m/y');

            if ($singleAttendance->att_date==$today) {
                return view('attendance.edit_attendance',compact('singleAttendance','employee'));
            }
            else{
                $notification  = array(
                    'messege'=>'You Can Not Update Before Or After Date Attendance',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            return view ('404');
        }
    }

    public function update_attendance(Request $request, $id){


        if(isset($request->attendance)){

            $attendances = Attendance::where('status',1)
                                ->where('att_status',1)
                                ->where('att_date',$request->att_date)
                                ->where('id',$id)
                                ->first();
            if ($attendances==true) {
                $data= [
                    "user_id"=>$request->user_id,
                    "attendance"=>$request->attendance,
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "month"=>$request->month,
                    "edit_date"=>date("d_m_y"),
                ];

            }
        }

        if (isset($data)) {
            $att = DB::table('attendances')->where('id',$id)->update($data);
        }
        else{
            $att = false;
        }

        if ($att) {
            $notification  = array(
                'messege'=>'Attendance Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification  = array(
                'messege'=>'Attendance Not Updated Successfully',
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }

    }

    public function today_attendance(){

        $date = date('d/m/y');

        $attendances = Attendance::where('status',1)
                                    ->where('att_date',$date)
                                    ->get();
        return view('attendance.today_attendance',compact('attendances'));

    }

    public function this_month_attendance($month=null){
        
        if ($month==null) {
            $month = date('F');
        }
        else{
            $month = $month;
        }
        $year = date('Y');

        $attendances = Attendance::where('status',1)
                                    ->where('month',$month)
                                    ->where('att_year',$year)
                                    ->get();
        return view('attendance.month_attendance',compact('attendances','month'));

    }

    public function this_year_attendance(){
        

        $year = date('Y');

        $attendances = Attendance::where('status',1)
                                    ->where('att_year',$year)
                                    ->get();
        return view('attendance.year_attendance',compact('attendances'));

    }

    
}
