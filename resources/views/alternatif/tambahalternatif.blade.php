@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item"><a href="{{ route('alternatif.index') }}">Alternatif</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Alternatif</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Tambah Alternatif</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        {{-- Menampilkan erorr validasi--}}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="needs-validation" method="post" action="{{ route('alternatif.store') }} " validate>
            @csrf
            <h5 class="card-header">Alternatif</h5>
            <div class="form-row" style="text-align: center">
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="kode">Kode Alternatif</label>
                    <span class="text-danger">*</span>
                    <input type="text" name="kode" value="{{ old('kode') }}" id="kode" class="form-control input-lg">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="nama_kriteria">Nama Alternatif</label>
                    <span class="text-danger">*</span>
                    <input type="text" value="{{ old('nama') }}" name="nama" id="nama" class="form-control input-lg">
                </div>
                <br>
                <br>
                <br>
            </div>
    </div>
    <div class="form-row">
        </br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
    </div>
    </form>
</div>
<div class="col-lg-12">
    <br>
    <p class="back-link" style="text-align:center">SPK Kelompok 2</p>
</div>
@endsection