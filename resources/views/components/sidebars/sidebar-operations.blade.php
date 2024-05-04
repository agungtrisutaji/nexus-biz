<li class="nav-item">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>
			Operations
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
		<x-sidebars.sidebar-link href="/deliveries" active="{{ request()->routeIs('deliveries') }}">
			<i class="far fa-circle nav-icon"></i>
			<p>Delivery</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/stagings" active="{{ request()->routeIs('stagings') }}">
			<i class="far fa-circle nav-icon"></i>
			<p>Staging</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/terminations" active="{{ request()->routeIs('terminations') }}">
			<i class="far fa-circle nav-icon"></i>
			<p>Termination</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/claims" active="{{ request()->routeIs('claims') }}">
			<i class="far fa-circle nav-icon"></i>
			<p>Claim</p>
		</x-sidebars.sidebar-link>
	</ul>
</li>
