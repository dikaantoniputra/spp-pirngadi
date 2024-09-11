<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ url('/') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('user.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Manajemen User </span>
                        </a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('siswa.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Manajemen Siswa </span>
                        </a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('tagihan.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Tagihan Siswa </span>
                        </a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('transaksi.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Transaksi Siswa </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan Transaksi <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('laporan-tk') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('laporan-sd') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('laporan-smp') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('laporan-sma') }}" class="dropdown-item">Unit SMA</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan Tahunan <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('tabel-tk') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('tabel-sd') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('tabel-smp') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('tabel-sma') }}" class="dropdown-item">Unit SMA</a> 
                        </div>
                    </li>

                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->