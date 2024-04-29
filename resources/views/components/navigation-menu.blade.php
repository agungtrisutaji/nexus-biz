<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"
          ><i class="fas fa-bars"></i
        ></a>
      </li>
      <x-nav-link active="{{ request()->routeIs('home') }}" href="{{ route('home') }}">Home</x-nav-link>
      <x-nav-link active="{{ request()->routeIs('about') }}" href="{{ route('about') }}">Halaman 1</x-nav-link>
      <x-nav-link active="{{ request()->routeIs('contact') }}" href="{{ route('contact') }}">Halaman 2</x-nav-link>
      <x-nav-link active="{{ request()->routeIs('stocks') }}" href="/stocks">Halaman 3</x-nav-link>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          data-widget="control-sidebar"
          data-controlsidebar-slide="true"
          href="#"
          role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
