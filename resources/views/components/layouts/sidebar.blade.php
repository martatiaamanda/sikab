<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <div class="navbar-brand m-0 d-flex align-items-center ">
            @if (Auth::user())
                <div class="col-auto">
                    <div class="avatar avatar-lg position-relative ratio ratio-1x1">
                        <img style="object-fit: cover; object-position: 50% 50%"
                            src="{{ Auth::user()->user_data->profile_ficture ? asset('storage/profile/' . Auth::user()->user_data->profile_ficture) : asset('static/img/default.png') }}"
                            alt="profile_image" class="w-100 border-radius-2xl shadow-sm">
                    </div>
                </div>
                <div class=" ms-1">
                    <span class="ms-1 font-weight-bold d-block">{{ Auth::user()->name }}</span>
                    <span class="ms-1 font-weight-bold d-block">{{ Auth::user()->role }}</span>
                </div>
            @endif
        </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " style="height: min-content!important" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-faded-info    text-white ' : '' }} "
                    href={{ route('dashboard') }}>
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-faded-info' }}" ">
                <i class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-info' : 'text-dark ' }}"></i>
            </div>
            <span class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Dashboard</span>
          </a>
        </li> --}}

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Persuratan</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('user.buat-surat*') ? ' bg-gradient-faded-info   text-white ' : '' }} "
                    href={{ route('user.buat-surat') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('user.buat-surat*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                        <i
                            class="fa-solid fa-envelope fs-5 text-gradient {{ Request::routeIs('user.buat-surat*') ? 'text-info' : 'text-dark' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('user.buat-surat*') ? 'text-white ' : ' text-black' }}">Buat
                        surat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('user.riwayat-surat*') ? ' bg-gradient-faded-info   text-white ' : '' }} "
                    href={{ route('user.riwayat-surat') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('user.riwayat-surat*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                        <i
                            class="fa-solid fa-envelopes-bulk fs-5 text-gradient {{ Request::routeIs('user.riwayat-surat*') ? 'text-info' : 'text-dark' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('user.riwayat-surat*') ? 'text-white ' : ' text-black' }}">Riwayat
                        Pengajuan Surat</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Bantuan Sosial</h6>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('user.bansos.*') ? ' bg-gradient-faded-info   text-white ' : '' }} "
                    href={{ route('user.bansos.create') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('user.bansos.*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                        <i
                            class="fa-solid fa-coins fs-5 text-gradient {{ Request::routeIs('user.bansos.*') ? 'text-info' : 'text-dark' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('user.bansos.*') ? 'text-white ' : ' text-black' }}">Pengajuan
                        Bantuan Sosial</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('user.riwayat-bansos*') ? ' bg-gradient-faded-info   text-white ' : '' }} "
                    href={{ route('user.riwayat-bansos') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('user.riwayat-bansos*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                        <i
                            class="fa-solid fa-sack-dollar fs-5 text-gradient {{ Request::routeIs('user.riwayat-bansos*') ? 'text-info' : 'text-dark' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('user.riwayat-bansos*') ? 'text-white ' : ' text-black' }}">Riwayat
                        Pengajuan Bansos</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('profile*') ? ' bg-gradient-faded-info   text-white ' : '' }} "
                    href={{ route('profile') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('profile*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                        <i
                            class="fa-solid fa-user fs-5 text-gradient {{ Request::routeIs('profile*') ? 'text-info' : 'text-dark' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('profile*') ? 'text-white ' : ' text-black' }}">Profile</span>
                </a>
            </li>

            <li method="POST" action="{{ route('logout') }}" class="nav-item">
                @csrf
                <a type="submit" class="nav-link rounded-3 " href={{ route('logout') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-gradient-faded-info ">
                        <i class="fa-solid fa-right-from-bracket fs-5 text-danger"></i>
                    </div>
                    <span class="nav-link-text ms-1 text-dark">Logout</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
