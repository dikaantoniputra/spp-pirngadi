@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
<style>

</style>
@endpush

@section('content')
<div class="container-fluid printer">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                 
                    <div class="panel-body ">
                        <div class="clearfix">
                            <div class="float-start">
                                <img src="{{ asset('assets/images/logo-pirngadi.png') }}" alt="" height="70" class="mx-auto">
                            </div>
                            <div class="float-end">
                                <h4>Invoice # <br>
                                    <strong>{{ $transaksi->invoince }}</strong>
                                </h4>
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-md-12">

                                <div class="float-start ">
                                    <address>
                                        <strong>Nama Siswa : {{ $transaksi->tagihan->siswa->name }}</strong><br>
                                        Va Number : {{ $transaksi->tagihan->siswa->va_number }}<br>
                                        Kelas : {{ $transaksi->tagihan->siswa->kelas }}<br>
                                        Telepon : {{ $transaksi->tagihan->siswa->phone }}
                                    </address>
                                </div>
                                <div class="float-end">
                                    <p><strong>Order Pembayaran: </strong> {{ $transaksi->updated_at }}</p>
                                    <p><strong>Order Status: </strong> <span class="label label-pink">@if ($transaksi->status == 0)
                                        Sukses
                                    @elseif ($transaksi->status == 1)
                                        Verifikasi
                                    @else
                                        Status Tidak Dikenal
                                    @endif
                                    </span></p>
                                    <p ><strong>Order ID: </strong> #{{ $transaksi->id }}</p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr><th>#</th>
                                            <th>Type Pembayaran</th>
                                            <th>Keterangan Pembayaran</th>
                                            <th>Bulan</th>
                                            {{-- <th>SPP Tiap Bulan</th> --}}
                                            <th>Pembayaran</th>
                                        </tr></thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $transaksi->id }}</td>
                                            <td>{{ $transaksi->type_pembayaran }}</td>
                                            <td>{{ $transaksi->keterangan }}</td>
                                            <td>{{ $transaksi->bulan }}</td>
                                            {{-- <td>Rp.{{ $transaksi->tagihan->siswa->spp_tiap_bulan }}</td> --}}
                                            <td>Rp.{{ $transaksi->nominal_bayar }}</td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-6">
                                <div class="clearfix">
                                    <h5 class="small text-dark fw-normal">Nama Petugas: {{ $transaksi->user->name }}</h5>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 offset-xl-3">
                                {{-- <p class="text-end"><b>Spp Bulanan:</b> {{ $transaksi->tagihan->siswa->spp_tiap_bulan }}</p> --}}
                                {{-- <p class="text-end">Pembayaran : {{ $transaksi->nominal_bayar }}</p> --}}
                                {{-- <p class="text-end">Kurang : {{ $transaksi->tagihan->siswa->spp_tiap_bulan - $transaksi->nominal_bayar }}</p> --}}
                              
                                <h3 class="text-end">Pembayaran RP. {{ $transaksi->nominal_bayar }}</h3>
                            </div>
                        </div>
                     
                        <div class="d-print-none">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>

    </div>
    <!-- end row -->        
    
</div> <!-- container-fluid -->
@endsection

@push('after-script')

@endpush
