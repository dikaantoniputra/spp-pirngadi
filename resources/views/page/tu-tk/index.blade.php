@extends('layout.master')

@push('after-style')
<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />


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
    
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mt-0 mb-4">Statistics Pembayaran Perbulan</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                data-bgColor="#FFE6BA" value="{{ $countTransaksi ?? '' }}"
                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                data-thickness=".15"/>
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $countTransaksi ?? '' }} </h2>
                        <p class="text-muted mb-1"> Perbulan</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    

    <div class="col-xl-7 col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('sma.admin.dashboard') }}">
                    <div class="row ">
                        <div class="col-md-2"><P>Start - End</P></div>
                        <div class="col-md-4">
                         
                            <input type="datetime-local" id="start_date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            
                            <input type="datetime-local" id="end_date" name="end_date" class="form-control">
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

{{-- <div class="row">
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
</div> --}}
<!-- end row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Date Range Filter -->
        

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl-Transaksi</th>
                        <th>No Va</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Type Pembayaran</th>
                        <th>Bulan</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Deskripsi</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($transaksi as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at ?? '' }}</td>
                        <td>{{ $transaksi->tagihan->siswa->va_number ?? '' }}</td>
                        <td>{{ $transaksi->tagihan->siswa->name ?? '' }}</td>
                        <td>{{ $transaksi->tagihan->siswa->kelas ?? '' }}</td>
                        <td>{{ $transaksi->type_pembayaran ?? '' }}</td>
                        <td>{{ $transaksi->bulan ?? '' }}</td>
                        <td>{{ $transaksi->nominal_bayar ?? '' }}</td>
                        <td>{{ $transaksi->keterangan ?? '' }}</td>
                        <td>{{ $transaksi->deskripsi ?? '' }}</td>
                    </tr>
                    @empty
                        <div>
                            Data Kosong
                        </div>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    <h4 id="total-before-filter">Total Semua Pendapatan: 0</h4>
                    <h4 id="total-after-filter">Total Hasil Filter: 0</h4>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- end row --> 

@endsection

@push('after-script')




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


<script src="{{ asset('') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>


<!-- third party js ends -->
<script>
    $(document).ready(function() {
      var table = $("#datatable-buttons").DataTable({
          lengthChange: false,
          dom: "Bfrtip",
          buttons: [
              {
                  extend: "copy",
                  text: "Copy",
              },
              {
                  extend: "csv",
                  text: "CSV",
              },
              {
                  extend: "pdf",
                  text: "PDF",
                  orientation: "landscape",
                  pageSize: "A4",
                  customize: function (doc) {
                      if (doc.pageOrientation !== "landscape") {
                          doc.pageOrientation = "landscape";
                      }
                  }
              }
          ]
      });
  
      table.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
      $("#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm").removeClass("custom-select custom-select-sm");
      $(".dataTables_length label").addClass("form-label");
  
      // Function to calculate total of nominal_bayar column
      function calculateTotal() {
          var total = 0;
          table.rows({ filter: 'applied' }).every(function() {
              var data = this.data();
              var nominal = parseFloat(data[7]); // Index of nominal_bayar column
              if (!isNaN(nominal)) {
                  total += nominal;
              }
          });
          return total;
      }
  
      // Display total before filtering
      $('#total-before-filter').text('Total Before Filter: ' + calculateTotal());
  
      // Update total after filtering
      table.on('draw', function() {
          $('#total-after-filter').text('Total After Filter: ' + calculateTotal());
      });
  
      // Date Range Filter
      $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
          var startDate = new Date($('#start_date').val());
          var endDate = new Date($('#end_date').val());
          var createdAt = new Date(data[1]);
  
          startDate.setHours(0, 0, 0, 0);
          endDate.setHours(23, 59, 59, 999);
          createdAt.setHours(0, 0, 0, 0);
  
          if (
              (isNaN(startDate.getTime()) && isNaN(endDate.getTime())) ||
              (isNaN(startDate.getTime()) && createdAt <= endDate) ||
              (startDate <= createdAt && isNaN(endDate.getTime())) ||
              (startDate <= createdAt && createdAt <= endDate)
          ) {
              return true;
          }
          return false;
      });
  
      $('#start_date, #end_date').on('change', function() {
          table.draw();
      });
  });
  
</script>

@endpush