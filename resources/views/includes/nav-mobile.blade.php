<div class="floating-button-container d-flex" onclick="window.location.href = 'take.html'">
    <button class="floating-button">
        <i class="fa-solid fa-camera"></i>
    </button>
</div>

<nav class="nav-mobile d-flex">
    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">
        <i class="fas fa-house"></i>
        Beranda
    </a>

    <a href="my-reports.html">
        <i class="fas fa-solid fa-clipboard-list"></i>
        Laporanmu
    </a>

    <div></div>
    <div></div>
    <div></div>
    <div></div>

    <a href="#">
        <i class="fas fa-bell"></i>
        Notifikasi
    </a>

    @auth
        <a href="{{ route('profile') }}">
            <i class="fas fa-user"></i>
            Profil
        </a>
    @else
        <a href="{{ route('register') }}">
            <i class="fas fa-right-to-bracket"></i>
            Daftar
        </a>
    @endauth
</nav>
