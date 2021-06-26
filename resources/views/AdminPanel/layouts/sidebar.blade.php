<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{url('dashboard')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Quick App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Clients
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('getAllClientsPage')}}" class="nav-link">
                                <i class="far  fa-eye"></i>
                                <p>All Clients</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('createClientPage')}}" class="nav-link">
                                <i class="far  fa-eye"></i>
                                <p>Create Client</p>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Invoices
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('getAllInvoicesPage')}}" class="nav-link">
                                <i class="far  fa-eye"></i>
                                <p>All Invoices</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('createInvoiceAndClientPage')}}" class="nav-link">
                                <i class="far  fa-eye"></i>
                                <p>Create Invoice</p>
                            </a>
                        </li>

                    </ul>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
