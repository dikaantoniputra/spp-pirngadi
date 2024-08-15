<!DOCTYPE html>
<html lang="en">

<head>
    @stack('before-style')
    @include('include.head')
    @stack('after-style')
</head>

<!-- body start -->

<body class="loading" data-layout-mode="horizontal" data-layout-color="light" data-layout-size="fluid" data-topbar-color="dark" data-leftbar-position="fixed">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('include.navbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('include.leftsidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Adminto</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                        <li class="breadcrumb-item active">Horizontal Layout</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Horizontal Layout</h4>
                            </div>
                        </div>
                    </div> 

                    @yield('content')
                </div> <!-- content -->

                <!-- Footer Start -->
                @include('include.footer')
                <!-- end Footer -->
    
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
    
    
        </div>

    <!-- Right Sidebar -->
    @include('include.rightsidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor -->

    @stack('before-script')
    @include('include.script')
    @stack('after-script')


    @yield('third-party-js')

    <!-- init js-->
    @yield('init-js')
</body>

</html>
