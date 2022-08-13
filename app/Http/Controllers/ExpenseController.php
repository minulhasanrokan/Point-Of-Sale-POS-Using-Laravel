<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use DB;

class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index_expense(){

        $allExpense = Expense::where('status',1)
                                ->get();

        return view('expense.all_expense',compact('allExpense'));
    }

    public function today_expense(){

        $date = date('d/m/y');

        $todayExpense = Expense::where('status',1)
                                ->where('DATE',$date)
                                ->get();


        return view('expense.today_expense',compact('todayExpense'));
    }

    public function this_month_expense ($month=null){


        if ($month==null) {
            $month = date('F');
        }
        else{
            $month = $month;
        }
        $year = date('Y');

        $thisMonthExpense = Expense::where('status',1)
                                ->where('month',$month)
                                ->where('year',$year)
                                ->get();


        return view('expense.this_month_expense',compact('thisMonthExpense','month'));
    }

    public function this_year_expense (){

        $year = date('Y');

        $thisYearExpense = Expense::where('status',1)
                                ->where('year',$year)
                                ->get();


        return view('expense.this_year_expense',compact('thisYearExpense'));
    }

    public function create_expense(){
        return view('expense.add_expense');
    }

    public function expense_store(Request $request){

        $validated = $request->validate([
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
            'year' => 'required'
        ]);

        $data = array();

        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['month']=$request->month;
        $data['date']=$request->date;
        $data['year']=$request->year;

        $today = date('d/m/y');

        if ($request->date==$today) {
            
            $expense = DB::table('expenses')->insert($data);

            if ($expense) {
                $notification  = array(
                    'messege'=>'New Expense Created Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'New Expense Not Created Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification  = array(
                'messege'=>'You Can Not Add Before Or After Date Expense',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update_expense(Request $request, $id){

        $validated = $request->validate([
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
            'year' => 'required'
        ]);

        $data = array();

        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['month']=$request->month;
        $data['date']=$request->date;
        $data['year']=$request->year;

        $today = date('d/m/y');

        if ($request->date==$today) {

            $updateExpense = DB::table('expenses')
                    ->where('id',$id)
                    ->update($data);

            if ($updateExpense) {
                $notification  = array(
                    'messege'=>'Expense Updated Successfully',
                    'alert-type'=>'success'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Expense Not Updated Successfully',
                    'alert-type'=>'error'
                );
                toast('Success Toast','success');
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification  = array(
                'messege'=>'You Can Not Add Before Or After Date Expense',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function change_expense_status($id){

        $expense = DB::table('expenses')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $expenseStatus = $expense->expense_status;

        $expenseDate = $expense->date;

        $today = date('d/m/y');

        if ($expenseDate==$today) {

            if ($expenseStatus==1) {
                
                $updateExpenseStatus = DB::table('expenses')
                                    ->where('id',$id)
                                    ->update(
                                        [
                                            'expense_status'=>0
                                        ]);
            }
            else{

                $updateExpenseStatus = DB::table('expenses')
                                    ->where('id',$id)
                                    ->update(
                                        [
                                            'expense_status'=>1
                                        ]);
            }

            if ($updateExpenseStatus) {
                $notification  = array(
                    'messege'=>'Expense Status Changed Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Expense Status Not Changed Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification  = array(
                'messege'=>'You Can Not Update Status Before Or After Date Expense',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_expense($id){

        $expense = DB::table('expenses')
                        ->where('status',1)
                        ->where('id',$id)
                        ->first();

        $expenseDate = $expense->date;

        $today = date('d/m/y');

        if ($expenseDate==$today) {

            $dltExpense = DB::table('expenses')
                        ->where('id',$id)
                        ->update([
                            'status' => 0
                        ]);

            if ($dltExpense) {
                $notification  = array(
                    'messege'=>'Expense Deleted Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $notification  = array(
                    'messege'=>'Expense Not Deleted Successfully',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{

            $notification  = array(
                'messege'=>'You Can Not Delete Before Or After Date Expense',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit_expense($id){

        $singleExpense = DB::table('expenses')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleExpense');

        if($data['singleExpense']!=''){

            $today = date('d/m/y');

            if ($singleExpense->date==$today) {
                return view('expense.edit_expense',compact('singleExpense'));
            }
            else{
                $notification  = array(
                    'messege'=>'You Can Not Update Before Or After Date Expense',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            return view ('404');
        }
    }

    public function view_expense($id){


        $singleExpense = DB::table('expenses')
                        ->where('id',$id)
                        ->where('status',1)
                        ->first();

        $data= compact('singleExpense');

        if($data['singleExpense']!=''){
            return view('expense.view_expense',compact('singleExpense'));
        }
        else{
            return view ('404');
        }

    }

}
