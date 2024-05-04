<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <div class="navbar-brand m-0">
        @if (Auth::user())
            <img src="{{ Auth::user()->user_profile ? asset(Auth::user()->user_profile) : asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <div class="">
                <span class="ms-1 font-weight-bold">{{ Auth::user()->name }}</span>
                <span class="ms-1 font-weight-bold">{{ Auth::user()->role }}</span>
            </div>
        @endif
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-faded-info    text-white ' : '' }} " href={{ route('dashboard') }}>
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 p-3 d-flex align-items-center justify-content-center "  ">
                <i class="fa-solid fa-house fs-5 {{ Request::routeIs('dashboard') ? '' : 'text-white ' }}"></i>
            </div>
            <span class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Dashboard</span>
          </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Persuratan</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('') ? ' bg-gradient-faded-info   text-white ' : '' }} " href={{ route('dashboard') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-gradient-faded-info">
                  <i class="fa-solid fa-house fs-5 {{ Request::routeIs('dashboard') ? '' : 'text-white' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Buat surat</span>
            </a>
          </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-3  {{ Request::routeIs('dashboard.*') ? ' active  text-white ' : '' }} " href={{ route('dashboard') }}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-gradient-faded-info">
                  <i class="fa-solid fa-user fs-5 {{ Request::routeIs('dashboard.*') ? '' : 'text-white' }}"></i>
              </div>
              <span class="nav-link-text ms-1 {{ Request::routeIs('dashboard.*') ? 'text-white ' : ' text-black' }}">Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-3" href={{ (route( 'logout' ))}}>
              <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-gradient-faded-info ">
                <i class="fa-solid fa-right-from-bracket fs-5 text-danger"></i>
              </div>
              <span class="nav-link-text ms-1 text-dark">Logout</span>
            </a>
          </li>
      </ul>
    </div>

  </aside>
