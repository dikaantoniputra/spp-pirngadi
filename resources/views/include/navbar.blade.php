<div class="navbar-custom">
  <ul class="list-unstyled topnav-menu float-end mb-0">

      <li class="dropdown notification-list topbar-dropdown">
          <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="{{asset('assets/images/users/user-11.jpg')}}" alt="user-image" class="rounded-circle">
              <span class="pro-user-name ms-1">
                {{ auth()->user()->name ?? ''}} <i class="mdi mdi-chevron-down"></i> 
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
              <!-- item-->
              <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Selamat Datang !</h6>
                  {{ auth()->user()->name ?? ''}}
              </div>

              <!-- item-->
              {{-- <a href="contacts-profile.html" class="dropdown-item notify-item">
                  <i class="fe-user"></i>
                  <span>Akun Saya</span>
              </a> --}}

              <div class="dropdown-divider"></div>

              <!-- item-->
              <form action="{{ route('logout') }}" method="POST">
                @csrf
              <button class="dropdown-item notify-item" type="submit">
                  <i class="fe-log-out"></i>
                  <span>Keluar</span>
              </button>
            </form>

          </div>
      </li>

  </ul>

  <!-- LOGO -->
  <div class="logo-box">
      <a href="#" class="logo logo-light text-center">
          <span class="logo-sm">
              <img src="{{asset('assets/images/favicon-16x16.png')}}" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="16">
          </span>
      </a>
      <a href="#" class="logo logo-dark text-center">
          <span class="logo-sm">
              <img src="{{asset('assets/images/favicon-16x16.png')}}" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="{{asset('assets/images/logo-kp-2.png')}}" alt="" height="60">
          </span>
      </a>
  </div>

  <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
      <li>
          <button class="button-menu-mobile disable-btn waves-effect">
              <i class="fe-menu"></i>
          </button>
      </li>

  </ul>

  <div class="clearfix"></div> 

</div>