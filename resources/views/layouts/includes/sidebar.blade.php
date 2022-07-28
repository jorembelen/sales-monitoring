
     <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="/">
                <span class="align-middle mr-3">Vi Vogue</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>
                <li class="sidebar-item {{ (request()->segment(1) == '') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) == 'services') ? 'active' : '' }}">
                    <a href="{{ route('services') }}"  class="sidebar-link">
                        <i class="fa fa-shopping-cart"></i> <span class="align-middle">Services</span>
                        <span class="badge badge-sidebar-primary"><x-services-count total /></span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) == 'employees') ? 'active' : '' }}">
                    <a href="{{ route('employees') }}"  class="sidebar-link">
                        <i class="fa fa-users"></i> <span class="align-middle">Employees</span>
                        <span class="badge badge-sidebar-primary"><x-employees-count total /></span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) == 'clients') ? 'active' : '' }}">
                    <a href="{{ route('clients') }}"  class="sidebar-link">
                        <i class="fa fa-users"></i> <span class="align-middle">Clients</span>
                        <span class="badge badge-sidebar-primary"><x-clients-count total /></span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) == 'commission') ? 'active' : '' }}">
                    <a href="{{ route('commission') }}"  class="sidebar-link">
                        <i class="fa fa-dollar-sign"></i> <span class="align-middle">Commission</span>
                        <span class="badge badge-sidebar-primary"><x-commission-count total /></span>
                    </a>
                </li>

            </ul>

        </div>
    </nav>
