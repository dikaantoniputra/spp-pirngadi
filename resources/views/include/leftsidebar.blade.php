<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                @if (auth()->user()->role == 'admin')
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link arrow-none" href="{{ route('admin.dashboard') }}" id="topnav-dashboard" role="button"
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
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Manajemen Siswa<div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                
                                <a href="{{ route('siswa.index') }}" class="dropdown-item">Data Siswa</a>
                                <a href="{{ route('tagihan.index') }}" class="dropdown-item">Data Tagihan</a>
                                <a href="#" class="dropdown-item">Data Tunggakan (pengembangan)</a>
                            </div>
                        </li>
        
                      
        
                        <li class="nav-item dropdown">
                            <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false" href="{{ route('transaksi.index') }}">
                                <i class="mdi mdi-calendar-blank-outline"></i>
                                <span> Transaksi Siswa </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-file-multiple-outline"></i> Laporan <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                               
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-extendedui"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TK <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-extendedui">
                                        <a href="{{ route('laporan-tk') }}" class="dropdown-item">Transaksi TK</a>
                                        <a href="{{ route('tabel-tk.du') }}" class="dropdown-item">Tabel Du TK</a>
                                        <a href="{{ route('tabel-tk') }}" class="dropdown-item">Tabel Spp TK</a>
                                        
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        SD <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                        <a href="{{ route('laporan-sd') }}" class="dropdown-item">Transaksi SD</a>
                                        <a href="{{ route('tabel-sd.du') }}" class="dropdown-item">Tabel Du SD</a>
                                        <a href="{{ route('tabel-sd') }}" class="dropdown-item">Tabel Spp SD</a>
                                       
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       SMP <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                        <a href="{{ route('laporan-smp') }}" class="dropdown-item">Transaksi SMP</a>
                                        <a href="{{ route('tabel-smp.du') }}" class="dropdown-item">Tabel Du SMP</a>
                                        <a href="{{ route('tabel-smp') }}" class="dropdown-item">Tabel Spp SMP</a>
                                       
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        SMA <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                        <a href="{{ route('laporan-sma') }}" class="dropdown-item">Transaksi SMA</a>
                                        <a href="{{ route('tabel-sma.du') }}" class="dropdown-item">Tabel DU SMA</a> 
                                        <a href="{{ route('tabel-sma') }}" class="dropdown-item">Tabel SPP SMA</a> 
                                       
                                    </div>
                                </div>
                            
                            </div>
                        </li>

                      

                      

                       

                      

                    </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'kepala-unit-sma')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('sma.admin.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('sma.siswa') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Data Siswa </span>
                        </a>
                    </li>
    
              

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan Transaksi <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('sma.kelas.10') }}" class="dropdown-item">Kelas 10</a>
                            <a href="{{ route('sma.kelas.11') }}" class="dropdown-item">Kelas 11</a>
                            <a href="{{ route('sma.kelas.12') }}" class="dropdown-item">Kelas 12</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-file-multiple-outline"></i> Laporan <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
 
                                    <a href="{{ route('sma.laporan-sma') }}" class="dropdown-item">Transaksi SMA</a>
                                    <a href="{{ route('sma.tabel-sma.du') }}" class="dropdown-item">Tabel DU SMA</a> 
                                    <a href="{{ route('sma.tabel-sma') }}" class="dropdown-item">Tabel SPP SMA</a> 

                        </div>
                    </li>

                </ul> <!-- end navbar-->
            @endif
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->