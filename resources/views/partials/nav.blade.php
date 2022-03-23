<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- <li class="sidebar-title">Bonjour</li>
                <li class="sidebar-title">nom : {{ Auth::user()->name}}</li>
                <li class="sidebar-title">prenom : {{ Auth::user()->prenom}}</li> --}}
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : ''; }} ">
                    <a href={{ route("dashboard") }} class='sidebar-link'>
                    {{-- <a href="#" class='sidebar-link'> --}}
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('dashboard/room') ? 'active' : ''; }} ">
                    <a href={{ route("room.index") }} class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>room</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('dashboard/team') ? 'active' : ''; }}">
                    <a href={{ route("team.index") }} class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Team</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('dashboard/blog') ? 'active' : ''; }}">
                    <a href={{ route("blog.index") }} class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('dashboard/gallery') ? 'active' : ''; }}">
                    <a href={{ route("gallery.index") }} class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('dashboard/contact') ? 'active' : ''; }}">
                    <a href={{ route("contact.index") }} class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Contact</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
