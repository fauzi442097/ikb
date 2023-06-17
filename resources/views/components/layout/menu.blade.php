<div class="menu menu-column menu-rounded fw-bold fs-6" id="#kt_aside_menu" data-kt-menu="true">


    <div class="menu-item">
       <div class="menu-content pb-2">
          <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
       </div>
    </div>


    <x-layout.menu-item>
        <a class="menu-link {{ request()->routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </x-layout.menu-item>

    <div class="menu-item">
       <div class="menu-content pt-8 pb-2">
          <span class="menu-section text-muted text-uppercase fs-8 ls-1">Master Data</span>
       </div>
    </div>

    <x-layout.menu-item>
        <a class="menu-link {{ request()->routeIs('admin.news') || request()->is('admin/news/*')  ? 'active' : '' }}" href="{{ route('admin.news') }}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo9/dist/../src/media/svg/icons/Design/Interselect.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
            </span>

            <span class="menu-title">Berita</span>
        </a>
    </x-layout.menu-item>


    <x-layout.menu-item>
        <a class="menu-link {{ request()->routeIs('admin.news-category') ? 'active' : '' }}" href="{{ route('admin.news-category') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo9/dist/../src/media/svg/icons/General/Duplicate.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Kategori Berita</span>
        </a>
    </x-layout.menu-item>

    <x-layout.menu-item>
        <a class="menu-link" href="../../demo14/dist/apps/calendar.html">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo9/dist/../src/media/svg/icons/Home/Picture.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>
                        <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>
                        <polygon fill="#000000" points="11 20 15.5 14 20 20"/>
                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
            </span>
            <span class="menu-title">Galery</span>
        </a>
    </x-layout.menu-item>

    <x-layout.menu-item>
        <a class="menu-link {{ request()->routeIs('admin.member') ? 'active' : '' }}" href="{{ route('admin.member') }}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2 svg-icon-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                       <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>
                       <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
                    </svg>
                 </span>
            </span>
            <span class="menu-title">Anggota</span>
        </a>
    </x-layout.menu-item>

    <x-layout.menu-item>
        <a class="menu-link" href="../../demo14/dist/apps/calendar.html">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                       <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"></path>
                       <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"></rect>
                    </svg>
                 </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Event</span>
        </a>
    </x-layout.menu-item>




 </div>
