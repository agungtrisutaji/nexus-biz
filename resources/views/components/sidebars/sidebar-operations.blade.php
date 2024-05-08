<li class="nav-item">
	<a href="#" class="nav-link {{ request()->routeIs(['deliveries.*', 'stagings.*', 'terminations.*', 'claims.*']) ? 'active' : '' }}">
		<i class="nav-icon bi bi-speedometer"></i>
		<p>
			Operations
			<i class="right bi bi-chevron-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
		<x-sidebars.sidebar-link href="/deliveries" active="{{ request()->routeIs('deliveries.*') }}">
			<i class="bi bi-arrow-return-right nav-icon"></i>
			<p>Delivery</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/stagings" active="{{ request()->routeIs('stagings.*') }}">
			<i class="bi bi-arrow-return-right nav-icon"></i>
			<p>Staging</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/terminations" active="{{ request()->routeIs('terminations.*') }}">
			<i class="bi bi-arrow-return-right nav-icon"></i>
			<p>Termination</p>
		</x-sidebars.sidebar-link>
		<x-sidebars.sidebar-link href="/claims" active="{{ request()->routeIs('claims.*') }}">
			<i class="bi bi-arrow-return-right nav-icon"></i>
			<p>Claim</p>
		</x-sidebars.sidebar-link>
	</ul>
</li>
