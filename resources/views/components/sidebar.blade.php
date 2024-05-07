<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <x-sidebars.sidebar-brand />
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<x-sidebars.sidebar-user />

		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-header">Assests Management</li>
				<!-- /.sidebar-menu -->
				<x-sidebars.sidebar-link href="{{ route('inventories') }}" active="{{ request()->routeIs('inventories') }}">
					<i class="bi bi-box-seam-fill nav-icon"></i>
					<p>Inventory</p>
				</x-sidebars.sidebar-link>
				<!-- Sidebar operations Menu -->
				<x-sidebars.sidebar-operations />
				<!-- /.sidebar-menu -->
				<x-sidebars.sidebar-link href="/bills" active="{{ request()->routeIs('bills') }}">
					<i class="bi bi-receipt-cutoff nav-icon"></i>
					<p>Billings</p>
				</x-sidebars.sidebar-link>
				<x-sidebars.sidebar-link href="/forecast" active="{{ request()->routeIs('forecast') }}">
					<i class="bi bi-graph-up nav-icon"></i>
					<p>Forecast</p>
				</x-sidebars.sidebar-link>
				<x-sidebars.sidebar-link href="/reports" active="{{ request()->routeIs('reports') }}">
					<i class="bi bi-journal-text"></i>
					<p>Reports</p>
				</x-sidebars.sidebar-link>
			</ul>
		</nav>
	</div>
	<!-- /.sidebar -->
</aside>
