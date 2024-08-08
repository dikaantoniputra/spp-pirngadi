@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')

<link href="{{ asset('') }}assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

		<!-- icons -->
<link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('transaksi.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        @include('page.transaksi.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>

<script src="{{ asset('') }}assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="{{ asset('') }}assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="{{ asset('') }}/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="{{ asset('') }}assets/libs/select2/js/select2.min.js"></script>
<script src="{{ asset('') }}assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
<script src="{{ asset('') }}assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="{{ asset('') }}assets/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="{{ asset('') }}assets/js/app.min.js"></script>
@endpush
