@extends('layout.master')

@push('after-style')
<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
               

                <h4 class="header-title mt-0 mb-4">Siswa SMA</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{ $countsiswaSma }}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1">{{ $countsiswaSma }}</h2>
                        <p class="text-muted mb-1">Jumlah</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
               

                <h4 class="header-title mt-0 mb-4">Siswa SMP</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{ $countsiswaSmp }}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1">{{ $countsiswaSmp }}</h2>
                        <p class="text-muted mb-1">Jumlah</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
               

                <h4 class="header-title mt-0 mb-4">Siswa SD</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{ $countsiswaSd }}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1">{{ $countsiswaSd }}</h2>
                        <p class="text-muted mb-1">Jumlah</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
               

                <h4 class="header-title mt-0 mb-4">Siswa TK</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{ $countsiswaTk }}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1">{{ $countsiswaTk }}</h2>
                        <p class="text-muted mb-1">Jumlah</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
             

                <h4 class="header-title mt-0 mb-3">SPP SMA <span id="currentMonth"></span></h4>


                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1">{{ 'Rp ' . number_format($totalNominalBayarSMA, 0, ',', '.') }}</h2>
                        <p class="text-muted mb-3">Nominal </p>
                    </div>
                    <span>*Catata: Pendapatan Awal bulan dan Akhir bulan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
             

                <h4 class="header-title mt-0 mb-3">SPP SMP <span id="currentMonth"></span></h4>


                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1">{{ 'Rp ' . number_format($totalNominalBayarSMP, 0, ',', '.') }}</h2>
                        <p class="text-muted mb-3">Nominal </p>
                    </div>
                    <span>*Catata: Pendapatan Awal bulan dan Akhir bulan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
             

                <h4 class="header-title mt-0 mb-3">SPP SD <span id="currentMonth"></span></h4>


                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1">{{ 'Rp ' . number_format($totalNominalBayarSD, 0, ',', '.') }}</h2>
                        <p class="text-muted mb-3">Nominal </p>
                    </div>
                    <span>*Catata: Pendapatan Awal bulan dan Akhir bulan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
             

                <h4 class="header-title mt-0 mb-3">SPP TK <span id="currentMonth"></span></h4>


                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1">{{ 'Rp ' . number_format($totalNominalBayarTK, 0, ',', '.') }}</h2>
                        <p class="text-muted mb-3">Nominal </p>
                    </div>
                    <span>*Catata: Pendapatan Awal bulan dan Akhir bulan</span>
                </div>
            </div>
        </div>
    </div>





</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Date Range Filter -->
        
                <h4>Transaksi Pada Bulan Sekarang</h4>
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

@endsection

@push('after-script')



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

<script>
    // Fungsi untuk mendapatkan nama bulan saat ini
    const months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const currentMonth = new Date().getMonth();
    document.getElementById('currentMonth').textContent = 'Pada bulan ' + months[currentMonth];
</script>


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