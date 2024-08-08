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
                <h4 class="mt-0 header-title">Tambah tagihan</h4>
                <a type="submit" href="{{ route('user.create') }}"
                        class="btn btn-primary waves-effect waves-light mb-4">Tambah
                        tagihan</a>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>va-number</th>
                        <th>name</th>
                        <th>kelas</th>
                        <th>Total-Tagihan</th>
                        <th>description</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>


                    <tbody>
                  
                    @forelse ($tagihan as $tagihan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tagihan->siswa->va_number }}</td>
                        <td>{{ $tagihan->siswa->name }}</td>
                        <td>{{ $tagihan->siswa->kelas }}</td>
                        <td>{{ $tagihan->billing_amount }}</td>
                        <td>{{ $tagihan->description }}</td>
                        <td>
                            @if($tagihan->status == 0)
                                Aktif
                            @elseif($tagihan->status == 1)
                                Non Aktif
                            @elseif($tagihan->status == 3)
                                Menunggu Verifikasi
                            @else
                                
                            @endif
                        </td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-2 fs-6">
                              <a href="{{ route('user.show', $tagihan->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                              <a href="{{ route('user.edit', $tagihan->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                              <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tagihan->id }}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                              </a>
                              <form id="delete-form-{{ $tagihan->id }}" action="{{ route('user.destroy', $tagihan->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                              </form>
                            </div>
                          </td>
                       
                    </tr>
                    @empty
                        <div>
                            Data Kosong
                        </div>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div>
@endsection

@push('after-script')
<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>

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

<!-- Datatables init -->
<script src="{{ asset('') }}assets/js/pages/datatables.init.js"></script>
@endpush
