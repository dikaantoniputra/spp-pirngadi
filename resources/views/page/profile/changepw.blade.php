@extends('layout.master')

@section('title')
Tambah Buku Pelajaran
@endsection

@push('after-style')

@endpush

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Ubah password</h2>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                        
                            <label for="current-password" class="col-md-4 control-label">Password Lama</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password-current">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Password Baru</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                                    <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password-new">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Konfirmasi Password Baru</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password-confirm">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div><p></p></div>
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    UBAH PASSWORD
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')

        <script type="text/javascript">
            var passwordInput = document.getElementById('current-password');
            var togglePasswordBtn = document.getElementById('btn-toggle-password-current');
        
            togglePasswordBtn.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePasswordBtn.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    togglePasswordBtn.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
        </script>

        <script type="text/javascript">
            var passwordInputNew = document.getElementById('new-password');
            var togglePasswordBtnNew = document.getElementById('btn-toggle-password-new');
        
            togglePasswordBtnNew.addEventListener('click', function() {
                if (passwordInputNew.type === 'password') {
                    passwordInputNew.type = 'text';
                    togglePasswordBtnNew.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    passwordInputNew.type = 'password';
                    togglePasswordBtnNew.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
        </script>

        <script type="text/javascript">
            var passwordInputConfirm = document.getElementById('new-password-confirm');
            var togglePasswordBtnConfirm = document.getElementById('btn-toggle-password-confirm');
        
            togglePasswordBtnConfirm.addEventListener('click', function() {
                if (passwordInputConfirm.type === 'password') {
                    passwordInputConfirm.type = 'text';
                    togglePasswordBtnConfirm.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    passwordInputConfirm.type = 'password';
                    togglePasswordBtnConfirm.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
        </script>

@endpush