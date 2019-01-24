<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="/home">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/admin/{{auth()->user()->id}}/admin_edit-profile">
			{{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
			<i class="fas fa-user-circle"></i>
			<span>Profile</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/create-user">
			{{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
			<i class="fas fa-user-plus"></i>
			<span>Tambah User</span>
		</a>
	</li>
</ul>	