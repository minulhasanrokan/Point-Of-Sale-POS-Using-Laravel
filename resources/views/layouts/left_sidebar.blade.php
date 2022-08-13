<div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">


                <ul class="metismenu" id="side-menu">

                    <li>
                        <a href="{{asset('')}}dashboard" class="waves-effect active">
                            <i class="mdi mdi-home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('index.pos')}}" class="waves-effect">
                            <i class="mdi mdi-home"></i>
                            <span> PSO </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Employees </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add.employee')}}">Add New Employe</a></li>
                            <li><a href="{{route('all.employee')}}">All Employe</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Customers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add.customer')}}">Add New Customer</a></li>
                            <li><a href="{{route('all.customer')}}">All Customer</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Suppliers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add.supplier')}}">Add New Supplier</a></li>
                            <li><a href="{{route('all.supplier')}}">All Suppliers</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Salary(EMP) </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add_adnaced.salary')}}">Add Adnaced Salary</a></li>
                            <li><a href="{{route('all_adnaced.salary')}}">All Adnaced Salaries</a></li>
                            <li><a href="{{route('pay.salary')}}">Pay Salary</a></li>
                            <li><a href="{{route('all.salary')}}">Last Month Salary</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Products Category</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add_product.category')}}">Add Product Category</a></li>
                            <li><a href="{{route('all_product.category')}}">All Product Category</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Products</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add.product')}}">Add Product</a></li>
                            <li><a href="{{route('all.product')}}">All Product</a></li>
                            <li><a href="{{route('import.product')}}">Import Product</a></li>
                            <li><a href="{{route('export.product')}}">Export Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Expense</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('add.expense')}}">Add Expense</a></li>
                            <li><a href="{{route('today.expense')}}">Today Expense</a></li>
                            <li><a href="{{route('this.month.expense')}}">This Month Expense</a></li>
                            <li><a href="{{route('this.year.expense')}}">This Year Expense</a></li>
                            <li><a href="{{route('all.expense')}}">All Expense</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Orders</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('pending.order')}}">Pending Order</a></li>
                            <li><a  href="{{route('complete.order')}}">Complete Order</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> Sales Report</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="">First</a></li>
                            <li><a href="">Secound</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Attendance</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('take.attendance')}}">Take Attendance</a></li>
                            <li><a href="{{route('all.attendance')}}">All Attendance</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Setting</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('company.setting')}}">Company Setting</a></li>
                          
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

<div class="content-page">
