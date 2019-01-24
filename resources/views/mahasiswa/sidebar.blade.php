<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="/home">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/mahasiswa/{{auth()->user()->id}}/mahasiswa_edit-profile">
			{{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
			<i class="fas fa-user-circle"></i>
			<span>Profile</span>
		</a>
	</li>
</ul>