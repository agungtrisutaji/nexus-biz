<nav class="mt-2">
    <ul
      class="nav nav-pills nav-sidebar flex-column"
      data-widget="treeview"
      role="menu"
      data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
            <x-sidebar-link href="{{ route('about') }}" active="{{ request()->routeIs('about') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Halaman 1</p>
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('contact') }}" active="{{ request()->routeIs('contact') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Halaman 2</p>
            </x-sidebar-link>
            <x-sidebar-link href="/stocks" active="{{ request()->routeIs('stocks') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Halaman 3</p>
            </x-sidebar-link>
            <x-sidebar-link href="/products" active="{{ request()->routeIs('products') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Halaman 4</p>
            </x-sidebar-link>
  </nav>
