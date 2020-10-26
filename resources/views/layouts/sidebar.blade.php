<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/images/pfa-2.png" alt="PFA" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{route('service.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>
                    Services
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{route('customer.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Customers
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{route('order.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>
                    Orders
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-money-check"></i>
                  <p>
                    Payment Methods
                  </p>
                </a>
              </li>
          <li class="nav-item has-treeview ">
            <a  class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
            Reports

            <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.reports')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Orders-Total</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order.reports')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total Purchased</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview ">
          <a  class="nav-link active">
              <i class="nav-icon  ion ion-person-add"></i>
              <p>
                  Manage Admins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Roles </p>
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
