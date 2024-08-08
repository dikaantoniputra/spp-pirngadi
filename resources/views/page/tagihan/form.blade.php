<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah User</h2>
        <div class="card-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Name<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="nik"
                        name="Name" placeholder="Name" value="{{ $user->name ?? '' }}" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">UserName<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="name"
                        name="username" placeholder="Username" value="{{ $user->name ?? '' }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Password<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="password" name="password" type="password" placeholder="Password" required class="form-control" value="{{ $user->password ?? '' }}" />
                        <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password"><i class="far fa-eye"></i></button>
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Kategori<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Kelas<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            

          

            

       
            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="rs" <?php echo (isset($user) && $user->role === 'rs') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio1">Guru</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="sub-rs" <?php echo (isset($user) && $user->role === 'sub-rs') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio2">Kepala Sekolah</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                            value="daerah" <?php echo (isset($user) && $user->role === 'daerah') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                        <label class="form-check-label" for="inlineRadio3">Staf</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                            value="sub-daerah" <?php echo (isset($user) && $user->role === 'sub-daerah') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                        <label class="form-check-label" for="inlineRadio4">Karyawan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5"
                            value="province" disabled>
                        <label class="form-check-label" for="inlineRadio5">(Admin Provinsi)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6"
                            value="bpjs" <?php echo (isset($user) && $user->role === 'bpjs') ? 'checked' : ''; ?> onclick="toggleBpjs()">
                        <label class="form-check-label" for="inlineRadio6">BPJS</label>
                    </div>
                </div>
            </div>
            
            



           

            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="1" <?php echo (isset($user) && $user->status === '1') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="0" <?php echo (isset($user) && $user->status === '0') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio2">Non Aktif</label>
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
