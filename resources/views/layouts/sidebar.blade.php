<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="/images/pfa-2.png" alt="PFA" class="brand-image img-circle "
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @can('dashboard')
                <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link {{ Route::currentRouteNamed('home') ? 'active ' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                                </a>
                            </li>
                            @endcan
                            @can('view_services')
                <li class="nav-item">
                                <a href="{{route('service.index')}}" class="nav-link {{ Route::currentRouteNamed('service.index') ? 'active ' : '' }}">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Services
                                </p>
                                </a>
                            </li>
                            @endcan
                            @can('view_customers')
                <li class="nav-item">
                                <a href="{{route('customer.index')}}" class="nav-link {{ Route::currentRouteNamed('customer.index') ? 'active ' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Customers
                                </p>
                                </a>
                            </li>
                            @endcan
                            @can('view_orders')

                            <li class="nav-item">
                                <a href="{{route('order.index')}}" class="nav-link {{ Route::currentRouteNamed('order.index') ? 'active ' : '' }}">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>
                                    Orders
                                </p>
                                </a>
                            </li>

                            @endcan
                            @can('view_payment_methods')
                <li class="nav-item">
                                <a href="{{route('settings.index')}}" class="nav-link {{ Route::currentRouteNamed('settings.index') ? 'active ' : '' }}">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>
                                    Payment Methods
                                </p>
                                </a>
                            </li>
                            @endcan
                            @can('view_reports')
                <li class="nav-item has-treeview ">
                            <a  class="nav-link {{ Route::currentRouteNamed('customer.reports') ? 'active ' : '' }}>
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                            Reports

                            <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('customer.reports')}}" class="nav-link {{ Route::currentRouteNamed('customer.reports') ? 'active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Orders-Total</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('order.reports')}}" class="nav-link {{ Route::currentRouteNamed('order.reports') ? 'active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Total Purchased</p>
                                </a>
                            </li>

                            </ul>
                        </li>
                            @endcan


                @can('view_admins')
                    <li class="nav-item has-treeview ">
                        <a   class="nav-link {{ Route::currentRouteNamed('users.index') ? 'active ' : '' }}">
                            <i class="nav-icon  ion ion-person-add"></i>
                            <p>
                                Manage Admins
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link {{ Route::currentRouteNamed('users.index') ? 'active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admins</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link {{ Route::currentRouteNamed('roles.index') ? 'active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Roles </p>
                                </a>
                            </li>

                            </ul>
                        </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="nav-link">
                 <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
