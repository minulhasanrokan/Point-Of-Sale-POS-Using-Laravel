<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employe;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProductCategory;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    

    // employee route...........
    Route::get('/add-employee', [Employe::class, 'create'])->name('add.employee');
    Route::get('/all-employee', [Employe::class, 'index'])->name('all.employee');
    Route::post('/insert-employee', [Employe::class, 'store']);
    Route::get('/view-employee/{id}', [Employe::class, 'view']);
    Route::get('/change-employee-status/{id}', [Employe::class, 'change_status']);
    Route::get('/delete-employee/{id}', [Employe::class, 'delete']);
    Route::get('/edit-employee/{id}', [Employe::class, 'edit']);
    Route::post('/update-employee/{id}', [Employe::class, 'update']);


    // customer route...........
    Route::get('/add-customer', [CustomerController::class, 'create'])->name('add.customer');
    Route::get('/all-customer', [CustomerController::class, 'index'])->name('all.customer');
    Route::post('/insert-customer', [CustomerController::class, 'store']);
    Route::get('/view-customer/{id}', [CustomerController::class, 'view']);
    Route::get('/change-customer-status/{id}', [CustomerController::class, 'change_status']);
    Route::get('/delete-customer/{id}', [CustomerController::class, 'delete']);
    Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
    Route::post('/update-customer/{id}', [CustomerController::class, 'update']);


    // supplier route...........
    Route::get('/add-supplier', [SupplierController::class, 'create'])->name('add.supplier');
    Route::get('/all-supplier', [SupplierController::class, 'index'])->name('all.supplier');
    Route::post('/insert-Supplier', [SupplierController::class, 'store']);
    Route::get('/delete-supplier/{id}', [SupplierController::class, 'delete']);
    Route::get('/change-supplier-status/{id}', [SupplierController::class, 'change_status']);
    Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
    Route::post('/update-supplier/{id}', [SupplierController::class, 'update']);
    Route::get('/view-supplier/{id}', [SupplierController::class, 'view']);

    // salaries advanced route...........
    Route::get('/add-adnaced-salary', [SalaryController::class, 'adnanced_create'])->name('add_adnaced.salary');
    Route::get('/all-adnaced-salary', [SalaryController::class, 'adnanced_index'])->name('all_adnaced.salary');
    Route::post('/insert-advanced-salary', [SalaryController::class, 'adnanced_store']);
    Route::get('/change-advanced-salary-status/{id}', [SalaryController::class, 'change_advanced_salary_status']);
    Route::get('/delete-advanced-salary/{id}', [SalaryController::class, 'delete_advanced_salary']);


    // salaries route...........
    Route::get('/pay-salary', [SalaryController::class, 'pay_salary_create'])->name('pay.salary');
    Route::get('/all-pay-salary', [SalaryController::class, 'all_pay_index'])->name('all.salary');


    // product category
    Route::get('/add-product-category', [ProductCategory::class, 'create_product_category'])->name('add_product.category');
    Route::get('/all-product-category', [ProductCategory::class, 'index_product_category'])->name('all_product.category');
    Route::post('/insert-product-category', [ProductCategory::class, 'product_category_store']);
    Route::get('/change-product-category-status/{id}', [ProductCategory::class, 'change_product_category_status']);
    Route::get('/delete-product-category/{id}', [ProductCategory::class, 'delete_product_category']);
    Route::get('/edit-product-category/{id}', [ProductCategory::class, 'edit_product_category']);
    Route::post('/update-product-category/{id}', [ProductCategory::class, 'update_product_category']);
    Route::get('/view-product-category/{id}', [ProductCategory::class, 'view_product_category']);

    //product...........
    Route::get('/add-product', [ProductController::class, 'create_product'])->name('add.product');
    Route::get('/all-product', [ProductController::class, 'index_product'])->name('all.product');
    Route::post('/insert-product', [ProductController::class, 'product_store']);
    Route::get('/change-product-status/{id}', [ProductController::class, 'change_product_status']);
    Route::get('/delete-product/{id}', [ProductController::class, 'delete_product']);
    Route::get('/view-product/{id}', [ProductController::class, 'view_product']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit_product']);
    Route::post('/update-product/{id}', [ProductController::class, 'update_product']);
    Route::get('/import-product', [ProductController::class, 'import_product'])->name('import.product');
    Route::get('/export-product', [ProductController::class, 'export'])->name('export.product');
    Route::post('/insert-bulk-product', [ProductController::class, 'import']);


    // Expense.............

    Route::get('/add-expense', [ExpenseController::class, 'create_expense'])->name('add.expense');
    Route::post('/insert-expense', [ExpenseController::class, 'expense_store']);
    Route::get('/today-expense', [ExpenseController::class, 'today_expense'])->name('today.expense');
    Route::get('/change-expense-status/{id}', [ExpenseController::class, 'change_expense_status']);
    Route::get('/delete-expense/{id}', [ExpenseController::class, 'delete_expense']);
    Route::get('/edit-expense/{id}', [ExpenseController::class, 'edit_expense']);
    Route::post('/update-expense/{id}', [ExpenseController::class, 'update_expense']);
    Route::get('/view-expense/{id}', [ExpenseController::class, 'view_expense']);
    Route::get('/this-month-expense/{month?}', [ExpenseController::class, 'this_month_expense'])->name('this.month.expense');
    Route::get('/this-year-expense', [ExpenseController::class, 'this_year_expense'])->name('this.year.expense');
    Route::get('/all-expense', [ExpenseController::class, 'index_expense'])->name('all.expense');


    // Attendance.............
    Route::get('/take-attendance', [AttendanceController::class, 'take_attendance'])->name('take.attendance');
    Route::get('/all-attendance', [AttendanceController::class, 'all_attendance'])->name('all.attendance');
    Route::post('/insert-attendance', [AttendanceController::class, 'attendance_store'])->name('insert.attendance');
    Route::get('/change-attendance-status/{id}', [AttendanceController::class, 'change_attendance_status']);
    Route::get('/delete-attendance/{id}', [AttendanceController::class, 'delete_attendance']);

    Route::get('/edit-attendance/{id}', [AttendanceController::class, 'edit_attendance']);
    Route::post('/update-attendance/{id}', [AttendanceController::class, 'update_attendance'])->name('update.attendance');
    Route::get('/today-attendance', [AttendanceController::class, 'today_attendance'])->name('today.attendance');
    Route::get('/this-month-attendance/{month?}', [AttendanceController::class, 'this_month_attendance'])->name('this.month.attendance');

    Route::get('/this-year-attendance', [AttendanceController::class, 'this_year_attendance'])->name('this.year.attendance');



    // setting..........
    Route::get('/company-setting', [SettingController::class, 'company_setting'])->name('company.setting');
    Route::post('/update-company-setting/{id}', [SettingController::class, 'update_company_setting']);



    // pos...................

    Route::get('/pos-index', [PosController::class, 'index'])->name('index.pos');

    // pos cart...........

    Route::get('/add-to-cart/{id}', [CartController::class, 'add_to_cart'])->name('add.cart');
    Route::post('/update-cart/{id}', [CartController::class, 'update_cart'])->name('update.cart');
    Route::get('/delete-cart-product/{id}', [CartController::class, 'delete_cart_product'])->name('delete.cart.product');

    // invoice
    Route::post('/create-invoice', [PosController::class, 'create_invoice'])->name('create.invoice');
    Route::post('/final-invoice', [PosController::class, 'final_invoice']);

    // order.....
    Route::get('/pending-order', [PosController::class, 'pending_order'])->name('pending.order');
    Route::get('/complete-order', [PosController::class, 'complete_order'])->name('complete.order');
    Route::get('/view-order/{id}', [PosController::class, 'view_order']);
    Route::get('/done-order/{id}', [PosController::class, 'done_order'])->name('done.order');





    


});

