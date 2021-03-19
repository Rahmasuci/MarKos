<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">MARKOST</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->category == 'Pemilik kos') 
            <li class="menu-header">Indekos</li>
            <li>
                <a class="nav-link" href="{{route('owner.indekos.index')}}">   
                    <i class="fas fa-home"></i>    
                    <span>Indekos</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->category == 'Admin') 
            <li class="menu-header">Indekos</li>
            <li>
                <a class="nav-link" href="{{route ('admin.facility.index')}}">
                    <i class="fas fa-tags"></i> 
                    <span>Fasilitas</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route ('admin.condition.index')}}">
                    <i class="fas fa-list"></i> 
                    <span>Kondisi</span>
                </a>
            </li>
            <li class="menu-header">User</li>
            <li>
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <i class="fas fa-user"></i> 
                    <span>User</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->category == 'Pengguna') 
            <li class="menu-header">Indekos</li>
            <li>
                <a class="nav-link" href="{{route('user.indekos')}}">   
                    <i class="fas fa-home"></i>    
                    <span>Indekos</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('user.favorite.index')}}">   
                    <i class="fas fa-heart"></i>    
                    <span>Favorite</span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>