<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink text-warning"></i>
    </div>
    <div class="sidebar-brand-text mx-3 text-light">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0 bg-secondary">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dashboard') || Request::is('dashboard/profiles*') ? 'active' : '' }}">
    <a class="nav-link text-light" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt text-warning"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider bg-secondary">

  <!-- Heading -->
  <div class="sidebar-heading text-light">
    Master Data
  </div>

  <!-- Data Produk -->
  <li class="nav-item {{ Request::is('dashboard/categories*') || Request::is('dashboard/products*') ? 'active' : '' }}">
    <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cart-plus text-warning"></i>
      <span>Data Produk</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-dark py-2 collapse-inner rounded">
        <h6 class="collapse-header text-light">Custom Components:</h6>
        <a class="collapse-item text-light {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Kategori</a>
        <a class="collapse-item text-light {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produk</a>
      </div>
    </div>
  </li>

  <!-- Data Diskon -->
  <li class="nav-item {{ Request::is('dashboard/discounts*') ? 'active' : '' }}">
    <a class="nav-link text-light" href="{{ route('discounts.index') }}">
      <i class="fas fa-fw fa-file text-warning"></i>
      <span>Data Diskon</span>
    </a>
  </li>

  <!-- Data Komentar -->
  <li class="nav-item {{ Request::is('dashboard/comments*') ? 'active' : '' }}">
    <a class="nav-link text-light" href="{{ route('comments.index') }}">
      <i class="fas fa-fw fa-comment text-warning"></i>
      <span>Data Komentar</span>
    </a>
  </li>

  <!-- Metode Pembayaran -->
  <li class="nav-item {{ Request::is('dashboard/payments*') ? 'active' : '' }}">
    <a class="nav-link text-light" href="{{ route('payments.index') }}">
      <i class="fas fa-fw fa-credit-card text-warning"></i>
      <span>Metode Pembayaran</span>
    </a>
  </li>

  <!-- Data Penjualan -->
  <li class="nav-item {{ Request::is('dashboard/sales*') ? 'active' : '' }}">
    <a class="nav-link text-light" href="{{ route('sales.index') }}">
      <i class="fas fa-fw fa-cart-plus text-warning"></i>
      <span>Data Penjualan</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link text-light" href="tables.html">
      <i class="fas fa-fw fa-table text-warning"></i>
      <span>Tables</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block bg-secondary">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0 bg-secondary" id="sidebarToggle"></button>
  </div>

</ul>
