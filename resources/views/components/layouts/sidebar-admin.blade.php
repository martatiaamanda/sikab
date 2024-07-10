<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <div class="navbar-brand m-0 d-flex align-items-center ">
            @if (Auth::user())
                <div class="col-auto">
                    <div class="avatar avatar-lg position-relative">
                        <img src="{{ Auth::user()->user_data->profile_ficture ? asset('storage/profile/' . Auth::user()->user_data->profile_ficture) : asset('static/img/default.png') }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
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
            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('admin.dashboard') ? 'bg-gradient-faded-info    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.dashboard') ? 'bg-white' : 'bg-gradient-faded-info' }}" ">
                <i class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('admin.dashboard') ? 'text-info' : 'text-dark ' }}"></i>
            </div>
            <span class="nav-link-text ms-1 {{ Request::routeIs('admin.dashboard') ? 'text-white ' : ' text-black' }}">Dashboard</span>
          </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master Data</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.user*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.user') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.user*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-users fs-5 text-gradient {{ Request::routeIs('admin.user*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.user*') ? 'text-white ' : ' text-black' }}">Pengguna</span>
            </a>
          </li>
          {{-- belum ada list --}}
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.lurah*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.lurah') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.lurah*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid  fa-user-tie fs-5 text-gradient {{ Request::routeIs('admin.lurah*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.lurah*') ? 'text-white ' : ' text-black' }}">Kepala Kelurahan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.nomor-surat*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.nomor-surat') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.nomor-surat*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-file fs-5 text-gradient {{ Request::routeIs('admin.nomor-surat*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.nomor-surat*') ? 'text-white ' : ' text-black' }}">Nomor Surat</span>
            </a>
          </li>

          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Persuratan</h6>
          </li>

          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.surat*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.surat') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.surat*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-envelopes-bulk fs-5 text-gradient {{ Request::routeIs('admin.surat*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.surat*') ? 'text-white ' : ' text-black' }}">Kelola Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.pengajuan*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.pengajuan') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.pengajuan*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-envelope fs-5 text-gradient {{ Request::routeIs('admin.pengajuan*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.pengajuan*') ? 'text-white ' : ' text-black' }}">Permohonan Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.done*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.done') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.done*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-envelope-circle-check fs-5 text-gradient {{ Request::routeIs('admin.done*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.done*') ? 'text-white ' : ' text-black' }}">surat Selesai</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Bantuan Sosial</h6>
          </li>

 
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.bansos.*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.bansos') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.bansos.*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-sack-dollar fs-5 text-gradient {{ Request::routeIs('admin.bansos.*') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.bansos.*') ? 'text-white ' : ' text-black' }}">Kelola Bansos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.bansos-pengajuan') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.bansos-pengajuan') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.bansos-pengajuan') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid fa-sack-dollar fs-5 text-gradient {{ Request::routeIs('admin.bansos-pengajuan') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.bansos-pengajuan') ? 'text-white ' : ' text-black' }}">Permohonan Bansos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('admin.bansos-done') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('admin.bansos-done') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.bansos-done') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                  <i class="fa-solid  fa-receipt fs-5 text-gradient {{ Request::routeIs('admin.bansos-done') ? 'text-info' : 'text-dark' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('admin.bansos-done') ? 'text-white ' : ' text-black' }}">Bansos Selesai</span>
            </a>
          </li>

          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Acoutnt</h6>
          </li>

        </li>
        <li class="nav-item">
          <a class="nav-link rounded-3  {{ Request::routeIs('profile*') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('profile') }}>
            <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('profile*') ? 'bg-white' : 'bg-gradient-faded-info' }}">
                <i class="fa-solid fa-user fs-5 text-gradient {{ Request::routeIs('profile*') ? 'text-info' : 'text-dark' }}"></i>
            </div>
            <span class="nav-link-text ms-1 {{ Request::routeIs('profile*') ? 'text-white ' : ' text-black' }}">Profile</span>
          </a>
        </li>

        <li method="POST" action="{{ route('logout') }}" class="nav-item">
            @csrf
            <a type="submit" class="nav-link rounded-3 "  href={{ route('logout') }}  >
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-gradient-faded-info ">
                <i class="fa-solid fa-right-from-bracket fs-5 text-danger"></i>
              </div>
              <span class="nav-link-text ms-1 text-dark">Logout</span>
            </a>
          </li>
      </ul>
    </div>

  </aside>
