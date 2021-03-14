<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">MARKOST</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->category == 'Pemilik kos') 
            <li>
                <a class="nav-link" href="{{route('owner.indekos.index')}}">   
                    <i class="fas fa-home"></i>    
                    <span>Indekos</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->category == 'Admin') 
            <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i> 
                    <span>Data User</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->category == 'Pengguna') 
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