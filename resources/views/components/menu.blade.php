<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li
        class="sidebar-item  {{ menuaktif($menuaktif,'dashboard')}}">
        <a href="{{ url('dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    {{-- Menu Khusus Member --}}
        @if ($user->member)
            <li
                class="sidebar-item  {{ menuaktif($menuaktif,'member')}}">
                <a href="{{ url('member')}}" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Member</span>
                </a>
            </li>
            <li
                class="sidebar-item  {{ menuaktif($menuaktif,'layanan')}}">
                <a href="{{ url('member/layanan')}}" class='sidebar-link'>
                    <i class="bi bi-ui-checks-grid"></i>
                    <span>Layanan</span>
                </a>
            </li>
        @endif
    {{-- Akhir Menu Khusus Member --}}

    {{-- Menu Superadmin --}}
        @if ($user->level == 'superadmin')
            <li class="sidebar-title">Superadmin</li>
            <li
                class="sidebar-item {{ menuaktif($menuaktif,'superadmin-layanan')}}">
                <a href="{{ url('superadmin/layanan')}}" class='sidebar-link'>
                    <i class="bi bi-file-text"></i>
                    <span>Data Layanan</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ menuaktif($menuaktif,'superadmin-member')}}">
                <a href="{{ url('superadmin/member')}}" class='sidebar-link'>
                    <i class="bi bi-people"></i>
                    <span>Data Member</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ menuaktif($menuaktif,'datapokok')}}">
                <a href="{{ url('superadmin/datapokok')}}" class='sidebar-link'>
                    <i class="bi bi-file"></i>
                    <span>Data Pokok</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ menuaktif($menuaktif,'kategori')}}">
                <a href="{{ url('superadmin/kategori')}}" class='sidebar-link'>
                    <i class="bi bi-ui-checks-grid"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ menuaktif($menuaktif,'visitor')}}">
                <a href="{{ url('superadmin/visitor')}}" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Visitor</span>
                </a>
            </li>
        @endif
    {{-- Menu Akhir Superadmin --}}

    <li class="sidebar-item">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}"  class="sidebar-link"
                onclick="event.preventDefault();
                        this.closest('form').submit();">
        <i class="bi bi-box-arrow-right"></i><span>Keluar</span></a>
        </form>
    </li>
</ul>