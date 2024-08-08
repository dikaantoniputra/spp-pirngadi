@extends('layout.master')

@section('content')
  
    <div class="container-fluid">
        <h3>Permohonan Akta Kelahiran</h3>

    <iframe src="data:application/pdf;base64,{{ base64_encode($pdfContent) }}" width="100%" height="1900"></iframe>
    </div>
@endsection