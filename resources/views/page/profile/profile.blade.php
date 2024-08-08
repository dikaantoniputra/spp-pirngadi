@extends('layout.master')

@section('title')
Tambah Buku Pelajaran
@endsection

@push('after-style')

@endpush

@section('content')
@if (auth()->user()->role == 'rs' || auth()->user()->role == 'sub-rs')

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPDATE DATA PROFIL</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="TUTUP"></button>
            </div>
            <form method="POST" action="{{ route('profile.update') }}" id="form">
                @csrf
                @method('put')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="field-1" name="nik" value="{{ $user->nik ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">NAMA</label>
                            <input type="text" class="form-control" id="field-2" name="name" value="{{ $user->name ?? ''}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">NOMOR WA</label>
                            <input type="text" class="form-control" id="field-1" name="wa" value="{{ $user->wa ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">EMAIL</label>
                            <input type="text" class="form-control" id="field-2" name="email" value="{{ $user->email ?? ''}}">
                        </div>
                    </div>
                    
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">SIMPAN</button>
            </div>
        </form>
        </div>
    </div>
</div><!-- /.modal -->

<div class="row row-deck row-cards">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
               
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">{{ $user->hospital->name_hospital }}</h4>

                                        <div class="row">
                                            <h2>Data Admin {{ $user->hospital->name_hospital }}</h2>

                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" placeholder="Email" name="nik" value="{{ $user->nik ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">NAMA</label>
                                                <input type="text" class="form-control" id="name" placeholder="Password" name="name" value="{{ $user->name ?? ''}}" disabled>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">EMAIL</label>
                                                <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $user->email ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">USERNAME</label>
                                                <input type="text" class="form-control" id="inputPassword4" placeholder="Password"  name="username" value="{{ $user->username ?? '' }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">NOMOR WA</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"  name="wa" value="{{ $user->wa ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress2" class="form-label">ROLE</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $user->role }}" disabled>
                                            </div>

                                        </div>

                                        <h2>Data Rumah Sakit</h2>

                                        <div class="row">


                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">NAMA RUMAH SAKIT</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="Nama Rumah Sakit" name="name_hospital" value="{{ $user->hospital->name_hospital ?? ''}}" disabled>
                                            </div>
                                           
                                                <div class="mb-3 col-md-6">
                                                    <label for="inputState" class="form-label">DAERAH</label>
                                                    <select class="form-select select2" id="regency" name="regency_id" required disabled>
                                                        <option value="">-- Pilih kota/kabupaten --</option>
                                                        @foreach($regencies as $r)
                                                            <option value="{{ $r->id }}" {{ (!empty($user->hospital) && $user->hospital->regency_id == $r->id) ? 'selected' : (old('regency') == $r->id ? 'selected' : '') }}>{{ $r->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                    

                                        </div>
                                        
                                </div> <!-- end card-body -->
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">EDIT PROFIL</button>

                                <button type="button" class="btn btn-info width-md waves-effect waves-light" ><a href="{{ url('/changePassword') }}" style="color: white"> UBAH PASSWORD </a></button>

                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>


     
            </div>
        </div>
    </div>
</div>
@endif



@if (auth()->user()->role == 'daerah' || auth()->user()->role == 'sub-daerah')

<div id="con-close-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPDATE DATA PROFIL</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="TUTUP"></button>
            </div>
            <form method="POST" action="{{ route('profiledaerah.update') }}" id="form">
                @csrf
                @method('put')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="field-1" name="nik" value="{{ $user->nik ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">NAMA</label>
                            <input type="text" class="form-control" id="field-2" name="name" value="{{ $user->name ?? ''}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">NOMOR WA</label>
                            <input type="text" class="form-control" id="field-1" name="wa" value="{{ $user->wa ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">EMAIL</label>
                            <input type="text" class="form-control" id="field-2" name="email" value="{{ $user->email ?? ''}}">
                        </div>
                    </div>
                    
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">SIMPAN</button>
            </div>
        </form>
        </div>
    </div>
</div><!-- /.modal -->
    <div class="row row-deck row-cards">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title"> ADMIN {{  $user->regency->name }}</h4>
                                   
                                    <form>

                                        <div class="row">
                                            <h2>DATA ADMIN {{  $user->regency->name }} </h2>

                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" placeholder="Email" name="nik" value="{{ $user->nik ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" placeholder="Password" name="name" value="{{ $user->name ?? ''}}" disabled>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $user->email ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="inputPassword4" placeholder="Password"  name="username" value="{{ $user->username ?? '' }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">Nomer WA</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"  name="wa" value="{{ $user->wa ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress2" class="form-label">Role</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $user->role ?? ''}}" disabled>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="inputState" class="form-label">Daerah</label>
                                                <select class="form-select select2" id="regency" name="regency_id" required disabled>
                                                    <option value="">-- Pilih kota/kabupaten --</option>
                                                    @foreach($regencies as $r)
                                                        <option value="{{ $r->id }}" {{ (!empty($user) && $user->regency_id == $r->id) ? 'selected' : (old('regency') == $r->id ? 'selected' : '') }}>{{ $r->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        </div>

                                </div> 
                            </div>


                        </form>
                    </div>
                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal1">EDIT PROFIL</button>
                    <button type="button" class="btn btn-info width-md waves-effect waves-light" ><a href="{{ url('/changePassword') }}" style="color: white"> UBAH PASSWORD </a></button>

                </div>
            </div>
</div>
@endif

@if (auth()->user()->role == 'bpjs')

<div id="con-close-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Data Profil</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="TUTUP"></button>
            </div>
            <form method="POST" action="{{ route('profile.update') }}" id="form">
                @csrf
                @method('put')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="field-1" name="nik" value="{{ $user->nik ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="field-2" name="name" value="{{ $user->name ?? ''}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-1" class="form-label">Nomer Wa</label>
                            <input type="text" class="form-control" id="field-1" name="wa" value="{{ $user->wa ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Email</label>
                            <input type="text" class="form-control" id="field-2" name="email" value="{{ $user->email ?? ''}}">
                        </div>
                    </div>
                    
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">SIMPAN</button>
            </div>
        </form>
        </div>
    </div>
</div><!-- /.modal -->
    <div class="row row-deck row-cards">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                   
                                   
                                    <form>

                                        <div class="row">
                                            <h2>DATA ADMIN {{  $user->name }} </h2>

                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" placeholder="Email" name="nik" value="{{ $user->nik ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" placeholder="Password" name="name" value="{{ $user->name ?? ''}}" disabled>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $user->email ?? ''}}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="inputPassword4" placeholder="Password"  name="username" value="{{ $user->username ?? '' }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">Nomer WA</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"  name="wa" value="{{ $user->wa ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress2" class="form-label">Role</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $user->role ?? ''}}" disabled>
                                            </div>

                                           
                                        </div>


                                        </div>

                                </div> 
                            </div>


                        </form>
                    </div>
                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal1">EDIT PROFIL</button>
                    <button type="button" class="btn btn-info width-md waves-effect waves-light" ><a href="{{ url('/changePassword') }}" style="color: white"> UBAH PASSWORD </a></button>

                </div>
            </div>
</div>
@endif

@endsection

@push('after-script')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$("select").select2({
  tags: "true",
  placeholder: "Select an Daerah",
  allowClear: true
});

    
    
    </script>
        
@endpush

