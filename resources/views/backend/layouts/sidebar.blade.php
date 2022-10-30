<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin/order')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Data Management</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  @can('admin')
  <li class="nav-item active">
    <a class="nav-link" href="{{url('/admin/order')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  @endcan


  <!-- Divider -->
  @if(Auth::user()->role == 'admin')
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Banner
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- Nav Item - Charts -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-image"></i>
      <span>Banner</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Banner Options:</h6>
        <a class="collapse-item" href="{{route('banner.index')}}">Banner</a>
        <a class="collapse-item" href="{{route('banner.create')}}">Tambah Banner</a>
      </div>
    </div>
  </li>
  @endif
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Shop
  </div>

  <!-- Categories -->
  @if(Auth::user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
      <i class="fas fa-sitemap"></i>
      <span>Kategori</span>
    </a>
    <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Category Options:</h6>
        <a class="collapse-item" href="{{route('category.index')}}">Kategori</a>
        <a class="collapse-item" href="{{route('category.create')}}">Tambah Kategori</a>
      </div>
    </div>
  </li>
  @endif
  @if(Auth::user()->role == 'admin')
  {{-- Products --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
      <i class="fas fa-cubes"></i>
      <span>Products</span>
    </a>
    <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Produk:</h6>
        <a class="collapse-item" href="{{route('product.index')}}">Produk</a>
        <a class="collapse-item" href="{{route('product.create')}}">Tambah Produk</a>
      </div>
    </div>
  </li>
  @endif

  {{-- Brands --}}
  @if(Auth::user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
      <i class="fas fa-table"></i>
      <span>Merk</span>
    </a>
    <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Merk:</h6>
        <a class="collapse-item" href="{{route('brand.index')}}">Merk</a>
        <a class="collapse-item" href="{{route('brand.create')}}">Tambah Merk</a>
      </div>
    </div>
  </li>

  {{-- Transportation --}}
  @if(Auth::user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transportCollapse" aria-expanded="true" aria-controls="transportCollapse">
      <i class="fas fa-truck-moving"></i>
      <span>Transportasi</span>
    </a>
    <div id="transportCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Transportasi</h6>
        <a class="collapse-item" href="{{route('transportation.index')}}">Transportasi</a>
        <a class="collapse-item" href="{{route('transportation.create')}}">Tambah Transportasi</a>
      </div>
    </div>
  </li>
  @endif

  {{-- Shipping --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
      <i class="fas fa-truck"></i>
      <span>Ongkos Kirim</span>
    </a>
    <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Ongkos Kirim:</h6>
        <a class="collapse-item" href="{{route('shipping.index')}}">Ongkos Kirim</a>
        <a class="collapse-item" href="{{route('shipping.create')}}">Tambah Ongkos Kirim</a>
      </div>
    </div>
  </li>
  @endif

  <!--Orders -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('order.index')}}">
      <i class="fas fa-hammer fa-chart-area"></i>
      <span>Pesanan</span>
    </a>
  </li>

  <!-- Reviews -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('review.index')}}">
      <i class="fas fa-comments"></i>
      <span>Ulasan</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  @can('admin')
  <div class="sidebar-heading">
    Artikel
  </div>

  <!-- Posts -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
      <i class="fas fa-fw fa-folder"></i>
      <span>Artikels</span>
    </a>
    <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Artikel:</h6>
        <a class="collapse-item" href="{{route('post.index')}}">Artikel</a>
        <a class="collapse-item" href="{{route('post.create')}}">Tambah Artikel</a>
      </div>
    </div>
  </li>

  <!-- Category -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
      <i class="fas fa-sitemap fa-folder"></i>
      <span>Kategori</span>
    </a>
    <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Kategori</h6>
        <a class="collapse-item" href="{{route('post-category.index')}}">Kategori</a>
        <a class="collapse-item" href="{{route('post-category.create')}}">Tambah Kategori</a>
      </div>
    </div>
  </li>

  <!-- Tags -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
      <i class="fas fa-tags fa-folder"></i>
      <span>Tag</span>
    </a>
    <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Opsi Tag:</h6>
        <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
        <a class="collapse-item" href="{{route('post-tag.create')}}">Tambah Tag</a>
      </div>
    </div>
  </li>

  <!-- Comments -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('comment.index')}}">
      <i class="fas fa-comments fa-chart-area"></i>
      <span>Komentar</span>
    </a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Heading -->
  <div class="sidebar-heading">
    Pengaturan Umum
  </div>

  <!-- Users -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('users.index')}}">
      <i class="fas fa-users"></i>
      <span>Users</span></a>
  </li>
  <!-- General settings -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('settings')}}">
      <i class="fas fa-cog"></i>
      <span>Pengaturan</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('rekap_penjualan.index')}}">
      <i class="fas fa-hammer fa-chart-area"></i>
      <span>Rekap Penjualan</span>
    </a>
  </li>
  @endcan

  @if(Auth::user()->role == 'gudang')
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('rekap_pengiriman.index')}}">
      <i class="fas fa-hammer fa-chart-area"></i>
      <span>Rekap Pengiriman</span>
    </a>
  </li>
  @endif

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>