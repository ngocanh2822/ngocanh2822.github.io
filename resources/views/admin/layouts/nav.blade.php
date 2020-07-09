    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('donhang.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Đơn hàng</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('naptien.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Nạp tiền</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('naptien.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Lịch sử nạp tiền</span></a>
      </li>

      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('listcomplete')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Đã hoàn thành</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->