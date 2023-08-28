@php
   $currentRoute = Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('dashboard')}}" class="app-brand-link mb-3">
      <div>
        <span class="app-brand-logo demo">
          <img class="" src="{{asset('images/logo.png')}}" height="50" width="50"/>
        </span>
      </div>
      <div class="mx-2">
        <b class="app-brand-logo demo text-dark" style="font-size: 14px">
          Employee Timesheet Tracker
        </b>
      </div>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item @if ($currentRoute == 'dashboard') active @endif">
      <a href="{{route('dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        User Section
      </span>
    </li>
    <li class="menu-item  @if ($currentRoute == 'user.index' || $currentRoute == 'user.edit') active @endif">
      <a href="{{route('user.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Basic">Users</div>
      </a>
    </li>
    <li class="menu-item  @if ($currentRoute == 'employee.index' || $currentRoute == 'employee.create' || $currentRoute == 'employee.edit') active @endif">
      <a href="{{route('employee.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-circle"></i>
        <div data-i18n="Basic">
          Employee
        </div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Projects & Timesheet Section
      </span>
    </li>
    <li class="menu-item  @if ($currentRoute == 'project.index' || $currentRoute == 'project.create' || $currentRoute == 'project.edit') active @endif">
      <a href="{{route('project.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Basic">
          Projects
        </div>
      </a>
    </li>
    {{-- 
    <li class="menu-item  @if ($currentRoute == 'timesheet.index' || $currentRoute == 'timesheet.create' || $currentRoute == 'timesheet.edit') active @endif">
      <a href="{{route('timesheet.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Basic">
          Timesheet
        </div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Room & Department Section
      </span>
    </li>
    <li class="menu-item  @if ($currentRoute == 'timesheet.index') active @endif">
      <a href="{{route('timesheet.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Basic">
          Timesheet
        </div>
      </a>
    </li> --}}
  </ul>
</aside>