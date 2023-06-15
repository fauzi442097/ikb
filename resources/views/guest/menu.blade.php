<div class="position-fixed container h-70px start-0 bottom-0 end-0 bg-white container-menu-mobile">
    <div class="d-flex py-4 w-100 justify-content-between">
        <div class="cursor-pointer d-flex flex-column justify-content-center align-items-center gap-1 mobile-menu {{ request()->routeIs('guest.home') ? 'active' : '' }}"
            onclick="window.location.href='{{ route('guest.home') }}'">
            <i class="bi bi-house-fill icon fs-3x"></i>
            Home
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center gap-1 mobile-menu">
            <i class="bi bi-grid-fill fs-3x icon"></i>

            Fitur
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center gap-1 mobile-menu cursor-pointer {{ request()->routeIs('guest.news') || request()->is('news/*')  ? 'active' : '' }}"
            onclick="window.location.href='{{ route('guest.news') }}'">
            <i class="bi bi-layers-fill fs-3x icon"></i>
            Berita
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center gap-1 mobile-menu">
            <i class="bi bi-person-fill fs-3x icon"></i>
            Profil
        </div>
    </div>
</div>
