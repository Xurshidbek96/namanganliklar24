
<ul class="sidebar-menu">

    <li class="dropdown @yield('dashboard')">
      <a href="/admin/home" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>

    <li class="dropdown @yield('categories')">
        <a href="{{ route('categories.index') }}" ><i
            data-feather="briefcase"></i><span>Kategoriyalar</span></a>
    </li>

    <li class="dropdown @yield('posts')">
        <a href="{{ route('posts.index') }}" ><i
            data-feather="briefcase"></i><span>Postlar</span></a>
    </li>

    <li class="dropdown @yield('tags')">
        <a href="{{ route('tags.index') }}" ><i
            data-feather="briefcase"></i><span>Teglar</span></a>
    </li>

</ul>
