@extends('layout.master')

@push('after-style')

<link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

<!-- App css -->

<link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

<!-- icons -->
<link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />


@endpush

@section('content')



<div class="row">

    <div class="col-xl-2 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- Add data-class to identify which class is clicked -->
                        <a href="javascript:void(0);" class="dropdown-item" data-class="kelas10">Kelas 10</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item" data-class="kelas11">Kelas 11</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item" data-class="kelas12">Kelas 12</a>
                    </div>
                </div>
    
                <h4 class="header-title mt-0 mb-4">Total Siswa</h4>
    
                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input id="knobInput" data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{ $countsiswa ?? '' }}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>
    
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1" id="countDisplay"> {{ $countsiswa ?? '' }} </h2>
                        <p class="text-muted mb-1">Total Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    
    <div class="col-xl-5 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">Statistics</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                data-bgColor="#FFE6BA" value="80"
                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                data-thickness=".15"/>
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    

    <div class="col-xl-5 col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('sma.admin.dashboard') }}">
                    <div class="row ">
                        <div class="col-md-2"><P>Start - End</P></div>
                        <div class="col-md-4">
                         
                            <input type="date" id="start_date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>
                        <div class="col-md-1"><button type="submit" class="btn btn-primary">Filter</button></div>
                    </div>
                    
                    
                </form>
                


                <div class="widget-box-2 mt-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">RP <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1"> Rp {{ number_format($totalNominalBayar, 0, ',', '.') }} </h2>

                        <p class="text-muted mb-3">Total</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- end col -->

</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0">Daily Sales</h4>

                <div class="widget-chart text-center">
                    <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                    <ul class="list-inline chart-detail-list mb-0">
                        <li class="list-inline-item">
                            <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Series A</h5>
                        </li>
                        <li class="list-inline-item">
                            <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Series B</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="header-title mt-0">Statistics</h4>
                <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="header-title mt-0">Total Revenue</h4>
                <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->




<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mb-3">Inbox</h4>

                <div class="inbox-widget">
                    
                    <div class="inbox-item">
                        <a href="#">
                            <div class="inbox-item-img"><img src="assets/images/users/user-1.jpg" class="rounded-circle" alt=""></div>
                            <h5 class="inbox-item-author mt-0 mb-1">Chadengle</h5>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">13:40 PM</p>
                        </a>
                    </div>
                    
                    <div class="inbox-item">
                        <a href="#">
                            <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                            <h5 class="inbox-item-author mt-0 mb-1">Tomaslau</h5>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">13:34 PM</p>
                        </a>
                    </div>

                    <div class="inbox-item">
                            <a href="#">
                            <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                            <h5 class="inbox-item-author mt-0 mb-1">Stillnotdavid</h5>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">13:17 PM</p>
                        </a>
                    </div>

                    <div class="inbox-item">
                        <a href="#">
                            <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                            <h5 class="inbox-item-author mt-0 mb-1">Kurafire</h5>
                            <p class="inbox-item-text">Nice to meet you</p>
                            <p class="inbox-item-date">12:20 PM</p>
                        </a>
                    </div>

                    <div class="inbox-item">
                        <a href="#">
                            <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                            <h5 class="inbox-item-author mt-0 mb-1">Shahedk</h5>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">10:15 AM</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- end col -->

    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Assign</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Adminto Admin v1</td>
                                <td>01/01/2017</td>
                                <td>26/04/2017</td>
                                <td><span class="badge bg-danger">Released</span></td>
                                <td>Coderthemes</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Adminto Frontend v1</td>
                                <td>01/01/2017</td>
                                <td>26/04/2017</td>
                                <td><span class="badge bg-success">Released</span></td>
                                <td>Adminto admin</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Adminto Admin v1.1</td>
                                <td>01/05/2017</td>
                                <td>10/05/2017</td>
                                <td><span class="badge bg-pink">Pending</span></td>
                                <td>Coderthemes</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Adminto Frontend v1.1</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge bg-purple">Work in Progress</span>
                                </td>
                                <td>Adminto admin</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Adminto Admin v1.3</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge bg-warning">Coming soon</span></td>
                                <td>Coderthemes</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Adminto Admin v1.3</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge bg-primary">Coming soon</span></td>
                                <td>Adminto admin</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
       
    </div><!-- end col -->

</div>
<!-- end row --> 

@endsection

@push('after-script')


        <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>

        <!-- knob plugin -->
        <script src="{{ asset('') }}assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!--Morris Chart-->
        <script src="{{ asset('') }}assets/libs/morris.js06/morris.min.js"></script>
        <script src="{{ asset('') }}assets/libs/raphael/raphael.min.js"></script>
  
        <!-- Dashboar init js-->
        <script src="{{ asset('') }}assets/js/pages/dashboard.init.js"></script>

        <!-- App js-->
        <script src="{{ asset('') }}assets/js/app.min.js"></script>

        {{-- start js count siswa --}}
        <script>
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function () {
                    let selectedClass = this.getAttribute('data-class');
                    
                    // Assuming you have these counts in your backend data
                    let counts = {
                        kelas10: {{ $countKelas10 ?? 0 }},
                        kelas11: {{ $countKelas11 ?? 0 }},
                        kelas12: {{ $countKelas12 ?? 0 }}
                    };
                    
                    let count = counts[selectedClass] || 0;
                    
                    // Update the displayed count
                    document.getElementById('countDisplay').textContent = count;
                    
                    // Update the knob input value
                    document.getElementById('knobInput').value = count;
                    $('[data-plugin="knob"]').knob(); // reinitialize the knob plugin
                });
            });

        </script>


@endpush