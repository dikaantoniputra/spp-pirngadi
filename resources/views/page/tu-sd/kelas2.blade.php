@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')

<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Date Range Filter -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="end_date" class="form-control">
                    </div>
                </div>

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
<script src="{{ asset('') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('') }}/assets/libs/feather-icons/feather.min.js"></script>
>

<!-- third party js -->
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
