<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah Tagihan</h2>
        <div class="card-body">

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Nama Siswa<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <select class="form-control" data-toggle="select2" data-width="100%" name="siswa_id">
                        <option>Cari</option>
                        @foreach($siswa as $kat)
                          <option value="{{ $kat->id }}" {{ isset($tagihansiswa) && $kat->id == $tagihansiswa->siswa_id ? 'selected' : '' }}>
                              {{ $kat->name }}
                          </option>
                        @endforeach
                    </select>
                  
                </div> <!-- end col -->
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Tgl Pembuatan VA<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input name="va_creation_date" type="datetime-local" placeholder="Nominal" required class="form-control" value="{{ $tagihansiswa->va_creation_date ?? '' }}" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Tgl Berakir VA<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input name="va_expiry_date" type="datetime-local" placeholder="Nominal" required class="form-control" value="{{ $tagihansiswa->va_expiry_date ?? '' }}" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Spp tiap bulan<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input name="spp_tiap_bulan" type="number" placeholder="Nominal" required class="form-control" value="{{ $tagihansiswa->spp_tiap_bulan ?? ''}}" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Jumlah Harus Yang Harus Di Bayar<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input name="billing_amount" type="number" placeholder="Nominal" required class="form-control" value="{{ $tagihansiswa->billing_amount ?? '' }}" />
                    </div>
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Deskripsi<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input name="description" type="text" placeholder="Deskripsi" required class="form-control" value="{{ $tagihansiswa->description ?? '' }}" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Tagihan <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="Active" <?php echo (isset($tagihansiswa) && $tagihansiswa->status === 'Active') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="Non Active" <?php echo (isset($tagihansiswa) && $tagihansiswa->status === 'Non Active') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio2">Non Active</label>
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
