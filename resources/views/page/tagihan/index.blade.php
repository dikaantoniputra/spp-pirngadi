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
                <a type="submit" href="{{ route('tagihan.create') }}"
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
                            {{ $tagihan->status }}
                        </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- View button with icon -->
                                    <a class="dropdown-item" href="{{ route('tagihan.show', $tagihan->id) }}">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                        
                                    <!-- Edit button with icon -->
                                    <a class="dropdown-item" href="{{ route('tagihan.edit', $tagihan->id) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                        
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $tagihan->id }}"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
                                         <i class="fas fa-trash-alt"></i> Hapus
                                     </a>
                                </div>
                            </div><!-- /btn-group -->
                        </td>
                        
                    @empty
                        <div>
                            Data Kosong
                        </div>
                    @endforelse

                    </tbody>
                </table>
                <div id="deleteModal-{{ $tagihan->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $tagihan->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel-{{ $tagihan->id }}">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus tagihan ini? Tindakan ini tidak dapat dibatalkan.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tagihan->id }}').submit();">
                                    Hapus
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
                <!-- Form penghapusan -->
                <form id="delete-form-{{ $tagihan->id }}" action="{{ route('tagihan.destroy', $tagihan->id) }}" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
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
