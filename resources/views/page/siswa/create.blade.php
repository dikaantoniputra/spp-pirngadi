@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.store') }}" id="form">
                        @csrf
                        @include('page.siswa.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        
        function toggleRS() {
    var divDaerah = document.getElementById("div-daerah");
    var divRs = document.getElementById("div-rs");

    divDaerah.style.display = "none";
    divRs.style.display = "";

    var selectRs = document.getElementById("role");
    selectRs.setAttribute("size", "3");

    var selectDaerah = document.getElementById("regency");
    selectDaerah.setAttribute("size", "1");

    // Re-init the Select2 plugin for the element
    $(selectRs).select2();
}

function toggleDaerah() {
    var divDaerah = document.getElementById("div-daerah");
    var divRs = document.getElementById("div-rs");

    divRs.style.display = "none";
    divDaerah.style.display = "";

    var selectRs = document.getElementById("role");
    selectRs.setAttribute("size", "1");

    var selectDaerah = document.getElementById("regency");
    selectDaerah.setAttribute("size", "3");

    // Re-init the Select2 plugin for the element
    $(selectDaerah).select2();
}

function toggleBpjs() {
    var divDaerah = document.getElementById("div-daerah");
    var divRs = document.getElementById("div-rs");

    divRs.style.display = "none";
    divDaerah.style.display = "none";

    var selectRs = document.getElementById("role");
    selectRs.setAttribute("size", "1");

    var selectDaerah = document.getElementById("regency");
    selectDaerah.setAttribute("size", "3");

    // Re-init the Select2 plugin for the element
    $(selectDaerah).select2();
}
    </script>

        <script type="text/javascript">
            var passwordInput = document.getElementById('password');
            var togglePasswordBtn = document.getElementById('btn-toggle-password');
        
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


    <script>
        // $("select").select2({
        //     tags: "true",
        //     placeholder: "Pilih Role",
        //     allowClear: true
        // });




        // $(document).ready(function() {
        //   $('#form').on('submit', function(e) {
        //     e.preventDefault();

        //     var username = $('#username').val();
        //     var email = $('#email').val();
        //     var wa = $('#wa').val();

        //     $.ajax({
        //       url: '/validate-form',
        //       method: 'POST',
        //       data: {
        //         username: username,
        //         email: email,
        //         wa: wa
        //       },
        //       dataType: 'json',
        //       success: function(response) {
        //         // Jika validasi sukses, submit form
        //         $('#form').unbind('submit').submit();
        //       },
        //       error: function(xhr) {
        //         var errors = xhr.responseJSON.errors;

        //         // Menampilkan pesan error pada masing-masing input field
        //         if (errors.username) {
        //           $('#username-error').html(errors.username[0]);
        //         }
        //         if (errors.email) {
        //           $('#email-error').html(errors.email[0]);
        //         }
        //         if (errors.wa) {
        //           $('#wa-error').html(errors.wa[0]);
        //         }
        //       }
        //     });
        //   });
        // });
    </script>

    <script>
        $('#akun_rs').click(function(e) {
            e.preventDefault();

        });
    </script>
@endpush
