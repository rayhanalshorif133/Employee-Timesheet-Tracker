@php
   $currentRoute = Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('dashboard')}}" class="app-brand-link mb-3">
      <span class="app-brand-logo demo">
        <img class="" src="{{asset('images/gavel_logo.png')}}" height="100" width="200"/>
      </span>
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
        Management Section
      </span>
    </li>
    <li class="menu-item  @if ($currentRoute == 'user.index' || $currentRoute == 'user.edit') active @endif">
      <a href="{{route('user.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Basic">Users</div>
      </a>
    </li>
    <li class="menu-item  @if ($currentRoute == 'category.index') active @endif">
      <a href="{{route('category.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-widget"></i>
        <div data-i18n="Basic">Category</div>
      </a>
    </li>
    <li class="menu-item  @if ($currentRoute == 'condition.index') active @endif">
      <a href="{{route('condition.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-report"></i>
        <div data-i18n="Basic">Conditions</div>
      </a>
    </li>
    <li class="menu-item  @if ($currentRoute == 'movement.index') active @endif">
      <a href="{{route('movement.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxl-squarespace"></i>
        <div data-i18n="Basic">Movements</div>
      </a>
    </li>
    <li class="menu-item  @if ($currentRoute == 'scope-of-delivery.index') active @endif">
      <a href="{{route('scope-of-delivery.index')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-layer"></i>
        <div data-i18n="Basic">Scope of deliveries</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Product & BID Section
      </span>
    </li>
    <li class="menu-item @if ($currentRoute == 'product.index' || $currentRoute == 'product.create' || $currentRoute == 'product.show' || $currentRoute == 'product.edit' || $currentRoute == 'product.pending.index' || $currentRoute == 'product.rejected.index') open @endif">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-component"></i>
        <div data-i18n="Misc">Products</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item @if ($currentRoute == 'product.create') active @endif">
          <a href="{{route('product.create')}}" class="menu-link">
            <div data-i18n="Error">Add New</div>
          </a>
        </li>
        <li class="menu-item @if ($currentRoute == 'product.index' || $currentRoute == 'product.edit') active @endif">
          <a href="{{route('product.index')}}" class="menu-link">
            <div data-i18n="Error">Verified</div>
          </a>
        </li>
        <li class="menu-item @if ($currentRoute == 'product.pending.index') active @endif">
          <a href="{{route('product.pending.index')}}" class="menu-link">
            <div data-i18n="Error">Pending</div>
          </a>
        </li>
        <li class="menu-item @if ($currentRoute == 'product.rejected.index') active @endif">
          <a href="{{route('product.rejected.index')}}" class="menu-link">
            <div data-i18n="Error">Rejected</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item  @if ($currentRoute == 'bid.index' || $currentRoute == 'bid.show') active @endif">
      <a href="{{route('bid.index')}}" class="menu-link">
        <i class="menu-icon bx bx-atom"></i>
        <div data-i18n="Basic">BIDs</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Payment Section
      </span>
    </li>
    <li class="menu-item  @if ($currentRoute == 'payment.index' || $currentRoute == 'payment.show') active @endif">
      <a href="{{route('payment.index')}}" class="menu-link">
        <i class="menu-icon bx bxs-wallet"></i>
        <div data-i18n="Basic">Payments</div>
      </a>
    </li>
  </ul>
</aside>