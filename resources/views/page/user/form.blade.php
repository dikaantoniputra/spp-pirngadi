<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah User</h2>
        <div class="card-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Name<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="nik"
                        name="name" placeholder="Name" value="{{ $user->name ?? '' }}" />
                   
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
                        <input id="password" name="password" type="password" placeholder="Password" required class="form-control" value="" />
                        <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password"><i class="far fa-eye"></i></button>
                    </div>  
                </div>
            </div>

           
       
            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2"
                            value="kepala-unit-tk" <?php echo (isset($user) && $user->role === 'kepala-unit-tk') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio2">Unit (tk)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2"
                            value="kepala-unit-sd" <?php echo (isset($user) && $user->role === 'kepala-unit-sd') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio2">Unit (sd)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2"
                            value="kepala-unit-smp" <?php echo (isset($user) && $user->role === 'kepala-unit-smp') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio2">Unit (smp)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2"
                            value="kepala-unit-sma" <?php echo (isset($user) && $user->role === 'kepala-unit-sma') ? 'checked' : ''; ?> onclick="toggleRS()">
                        <label class="form-check-label" for="inlineRadio2">Unit (sma)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio3"
                            value="yayasan" <?php echo (isset($user) && $user->role === 'yayasan') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                        <label class="form-check-label" for="inlineRadio3">Yayasan</label>
                    </div>
                   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio5"
                            value="kasir" <?php echo (isset($user) && $user->role === 'kasir') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                        <label class="form-check-label" for="inlineRadio5">(Kasir)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio6"
                            value="admin" <?php echo (isset($user) && $user->role === 'admin') ? 'checked' : ''; ?> onclick="toggleBpjs()">
                        <label class="form-check-label" for="inlineRadio6">Admin</label>
                    </div>
                </div>
            </div>
            
            



           

            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="1" <?php echo (isset($user) && $user->status === '0') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="0" <?php echo (isset($user) && $user->status === '1') ? 'checked' : ''; ?> >
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
