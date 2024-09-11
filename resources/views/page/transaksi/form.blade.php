<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Transaksi</h2>
        <div class="card-body">
            

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Nama Siswa<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <select class="form-control" data-toggle="select2" data-width="100%" name="tagihan_id">
                        <option disabled selected>Cari</option>
                    
                        @forelse ($tagihan as $item)
                            <option value="{{ $item->id }}" 
                                {{ isset($transaksi) && $item->id == $transaksi->tagihan_id ? 'selected' : '' }}>
                                {{ $item->siswa->name }} - {{ $item->siswa->va_number }}
                            </option>
                        @empty
                            <option disabled>Data Kosong</option>
                        @endforelse
                    </select>
                    

                   
                  
                </div> <!-- end col -->
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Nominal<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="password" name="nominal_bayar" type="number" placeholder="Nominal" required class="form-control" value="{{ $transaksi->nominal_bayar ?? '' }}" />
                       
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Type Pembayaran<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select" name="type_pembayaran">
                        <option selected disabled>Open this select menu</option>
                        <option value="va" {{ isset($transaksi) && $transaksi->type_pembayaran == 'va' ? 'selected' : '' }}>VA SISWA</option>
                        <option value="kasir" {{ isset($transaksi) && $transaksi->type_pembayaran == 'kasir' ? 'selected' : '' }}>KASIR</option>
                        
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Keterangan Pembayaran<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select" name="keterangan">
                        <option selected>Keterangan Pembayaran</option>
                        <option value="spp" {{ isset($transaksi) && $transaksi->keterangan == 'spp' ? 'selected' : '' }}>SPP</option>
                        <option value="du" {{ isset($transaksi) && $transaksi->keterangan == 'du' ? 'selected' : '' }}>DU</option>
                        <option value="lain-lain" {{ isset($transaksi) && $transaksi->keterangan == 'lain-lain' ? 'selected' : '' }}>LAIN-LAIN</option>
                        
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Pembayaran Spp Bulan<span class="text-danger">*</span></label>
                <div class="col-7">
                    <select class="form-select" name="bulan">
                        <option selected>Pilih Bulan</option>
                        <option value="januari" {{ isset($transaksi) && $transaksi->bulan == 'januari' ? 'selected' : '' }}>Januari</option>
                        <option value="februari" {{ isset($transaksi) && $transaksi->bulan == 'februari' ? 'selected' : '' }}>Februari</option>
                        <option value="maret" {{ isset($transaksi) && $transaksi->bulan == 'maret' ? 'selected' : '' }}>Maret</option>
                        <option value="april" {{ isset($transaksi) && $transaksi->bulan == 'april' ? 'selected' : '' }}>April</option>
                        <option value="mei" {{ isset($transaksi) && $transaksi->bulan == 'mei' ? 'selected' : '' }}>Mei</option>
                        <option value="juni" {{ isset($transaksi) && $transaksi->bulan == 'juni' ? 'selected' : '' }}>Juni</option>
                        <option value="juli" {{ isset($transaksi) && $transaksi->bulan == 'juli' ? 'selected' : '' }}>Juli</option>
                        <option value="agustus" {{ isset($transaksi) && $transaksi->bulan == 'agustus' ? 'selected' : '' }}>Agustus</option>
                        <option value="september" {{ isset($transaksi) && $transaksi->bulan == 'september' ? 'selected' : '' }}>September</option>
                        <option value="oktober" {{ isset($transaksi) && $transaksi->bulan == 'oktober' ? 'selected' : '' }}>Oktober</option>
                        <option value="november" {{ isset($transaksi) && $transaksi->bulan == 'november' ? 'selected' : '' }}>November</option>
                        <option value="desember" {{ isset($transaksi) && $transaksi->bulan == 'desember' ? 'selected' : '' }}>Desember</option>
                    </select>
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Deskripsi Pembayaran<span class="text-danger">
                     </span></label>
                <div class="col-7">
                    <textarea class="form-control" id="example-textarea" name="deskripsi" rows="5">{{ $transaksi->deskripsi ?? '' }}</textarea>
                </div>
            </div>

            <h6>Note: Tidak perlu di isi jika tidak loncat bulan</h6>
            <div class="row mb-3">
                <label for="va_creation_date" class="col-4 col-form-label">Tgl-pembayaran<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="va_creation_date" name="created_at" type="datetime-local"  class="form-control" value="{{ old('created_at', $transaksi->created_at ?? '') }}" />
                    </div>  
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
