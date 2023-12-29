<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Kasir Laravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
          
                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->getRole() === 1)
                <li class="nav-item">
                    <a href="{{ route('all-jenis.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Jenis</p>
                    </a>
                </li>    
                <li class="nav-item">
                    <a href="{{ route('kategoris.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mejas.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Meja</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menus.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stoks.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Stok</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>User</p>
                    </a>
                </li>
                @endif
                
                
                
                @if (auth()->user()->getRole() == 1 || auth()->user()->getRole() == 2)
                <li class="nav-item">
                    <a href="{{ route('pelanggans.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>    
                <li class="nav-item">
                    <a href="{{ route('pemesanans.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Pemesanan</p>
                    </a>
                </li>
                @endif
                
                @if (auth()->user()->getRole() == 2)
                <li class="nav-item">
                    <a href="{{ route('transactions.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                @endif
                @endauth

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>