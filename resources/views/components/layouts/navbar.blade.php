<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('img/logo.png') }}" class="light-logo" alt="site logo" width="130px">
            <img src="{{asset('img/log.png')}}" alt="site logo" class="logo-icon" width="49px">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{route('admin.dashboard')}}"
                    class="{{request()->is('admin/dashboard') ? 'active-page' : ''}}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Campaign</li>
            <li>
                <a href="{{route('program.index')}}" class="{{request()->is('admin/program/*') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:charity" class="menu-icon"></iconify-icon>
                    <span>Program</span>
                </a>
            </li>
            <li>
                <a href="{{route('kategori.index')}}" class="{{request()->is('admin/kategori') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:task-01" class="menu-icon"></iconify-icon>
                    <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{route('berita-penyaluran.index')}}"
                    class="{{request()->is('admin/berita-penyaluran/*') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:hold-01" class="menu-icon"></iconify-icon>
                    <span>Berita & Penyaluran</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Main</li>
            <li>
                <a href="{{route('berita.index')}}" class="{{request()->is('admin/berita/*') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:news" class="menu-icon"></iconify-icon>
                    <span>Berita</span>
                </a>
            </li>
            <li>
                <a href="{{route('donasi.index')}}" class="{{request()->is('admin/donasi') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:favourite" class="menu-icon"></iconify-icon>
                    <span>Donasi</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Akun</li>
            <li>
                <a href="{{route('user.index')}}" class="{{request()->is('admin/user') ? 'active-page' : ''}}">
                    <iconify-icon icon="hugeicons:user" class="menu-icon"></iconify-icon>
                    <span>User</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Report</li>
            <li>
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Laporan</span>
                </a>

            </li>

            <li class="sidebar-menu-group-title">Sistem</li>

            <li>
                <a href="javascript:void(0)">
                    <iconify-icon icon="simple-line-icons:vector" class="menu-icon"></iconify-icon>
                    <span>Pengaturan</span>
                </a>
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:logout-circle-01" class="menu-icon"></iconify-icon>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>