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
                <h4 class="mt-0 header-title">Tambah Siswa</h4>
                <a type="submit" href="{{ route('siswa.create') }}"
                        class="btn btn-primary waves-effect waves-light mb-4">Tambah
                        Siswa</a>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>va-number</th>
                        <th>name</th>
                        <th>description</th>
                        <th>jenjang</th>
                        <th>kelas</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>


                    <tbody>
                  
                    @forelse ($siswa as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->va_number }}</td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->description }}</td>
                        <td>{{ $siswa->jenjang }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->status }}</td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('siswa.show', $siswa->id) }}">View</a>
                                    <a class="dropdown-item" href="{{ route('siswa.edit', $siswa->id) }}">Edit</a>
                                   
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $siswa->id }}').submit();"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">Hapus</a>
                                    <form id="delete-form-{{ $siswa->id }}" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                </div>
                            </div><!-- /btn-group -->
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
