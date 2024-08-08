<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Transaksi</h2>
        <div class="card-body">
            

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Nama Siswa<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <select class="form-control" data-toggle="select2" data-width="100%" name="tagihan_id">
                        <option>Cari</option>
                        @forelse ($tagihan as $tagihan)
                            <option value="{{ $tagihan->id }}">
                                {{ $tagihan->siswa->name }} - {{ $tagihan->siswa->va_number }}
                            </option>
                        @empty
                            <div>Data Kosong</div>
                        @endforelse
                    </select>
                  
                </div> <!-- end col -->
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Nominal<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="password" name="nominal_bayar" type="number" placeholder="Nominal" required class="form-control" value="{{ $user->password ?? '' }}" />
                       
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Type Pembayaran<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select" name="type_pembayaran">
                        <option selected>Open this select menu</option>
                        <option value="va">VA SISWA</option>
                        <option value="kasir">KASIR</option>
                        
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Keterangan Pembayaran<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select" name="keterangan">
                        <option selected>Keterangan Pembayaran</option>
                        <option value="spp">SPP</option>
                        <option value="du">DU</option>
                        <option value="lain-lain">LAIN-LAIN</option>
                        
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Pembayaran Spp Bulan<span class="text-danger">*</span></label>
                <div class="col-7">
                    <select class="form-select" name="bulan">
                        <option selected>Pilih Bulan</option>
                        <option value="januari">Januari</option>
                        <option value="februari">Februari</option>
                        <option value="maret">Maret</option>
                        <option value="april">April</option>
                        <option value="mei">Mei</option>
                        <option value="juni">Juni</option>
                        <option value="juli">Juli</option>
                        <option value="agustus">Agustus</option>
                        <option value="september">September</option>
                        <option value="oktober">Oktober</option>
                        <option value="november">November</option>
                        <option value="desember">Desember</option>
                    </select>
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Deskripsi Pembayaran<span class="text-danger">
                     </span></label>
                <div class="col-7">
                    <textarea class="form-control" id="example-textarea" name="deskripsi" rows="5"></textarea>
                </div>
            </div>

            


            <div class="row mb-3">
                <div class="col-8 offset-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                </div>
            </div>
        </div><!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
