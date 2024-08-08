<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah User</h2>
        <div class="card-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">va_number<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="nik"
                        name="va_number" placeholder="va_number" value="{{ $user->va_number ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">name<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="nik"
                        name="name" placeholder="name" value="{{ $user->name ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">email<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="email" required parsley-type="email" class="form-control" id="nik"
                        name="email" placeholder="email" value="{{ $user->name ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">phone<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="nik"
                        name="phone" placeholder="phone" value="{{ $user->phone ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">billing_id<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="nik"
                        name="billing_id" placeholder="billing_id" value="{{ $user->billing_id ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">description<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="nik"
                        name="description" placeholder="description" value="{{ $user->description ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">spp_tiap_bulan<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="nik"
                        name="spp_tiap_bulan" placeholder="spp_tiap_bulan" value="{{ $user->spp_tiap_bulan ?? '' }}" />
                   
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">billing_amount<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="name"
                        name="billing_amount" placeholder="billing_amount" value="{{ $user->billing_amount ?? '' }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label for="va_creation_date" class="col-4 col-form-label">va_creation_date<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="va_creation_date" name="va_creation_date" type="date" required class="form-control" value="{{ old('va_creation_date', $user->va_creation_date ?? '') }}" />
                    </div>  
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="va_expiry_date" class="col-4 col-form-label">va_expiry_date<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="va_expiry_date" name="va_expiry_date" type="date" required class="form-control" value="{{ old('va_expiry_date', $user->va_expiry_date ?? '') }}" />
                    </div>  
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="jenjang" class="col-4 col-form-label">jenjang<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <select class="form-select" name="jenjang" id="jenjang">
                        <option disabled {{ old('jenjang', $user->jenjang ?? '') == '' ? 'selected' : '' }}>Open this select menu jenjang</option>
                        <option value="tk" {{ old('jenjang', $user->jenjang ?? '') == 'tk' ? 'selected' : '' }}>TK</option>
                        <option value="sd" {{ old('jenjang', $user->jenjang ?? '') == 'sd' ? 'selected' : '' }}>SD</option>
                        <option value="smp" {{ old('jenjang', $user->jenjang ?? '') == 'smp' ? 'selected' : '' }}>SMP</option>
                        <option value="sma" {{ old('jenjang', $user->jenjang ?? '') == 'sma' ? 'selected' : '' }}>SMA</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="kelas" class="col-4 col-form-label">kelas<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <select class="form-select" name="kelas" id="kelas">
                        <option disabled {{ old('kelas', $user->kelas ?? '') == '' ? 'selected' : '' }}>Open this select menu</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ old('kelas', $user->kelas ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            

            

            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="Active" <?php echo (isset($user) && $user->status === 'Active') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="Non Active" <?php echo (isset($user) && $user->status === 'Non Active') ? 'checked' : ''; ?> >
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
