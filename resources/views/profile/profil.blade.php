@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<style>
    .show-hide {
        position: absolute;
        right: 25px;
        top: 75%;
        transform: translateY(-50%);
    }

    .show-hide i {
        font-size: 19px;
        cursor: pointer;
        /* display: none; */
    }
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Update Profil
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Update Profil</h2>
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
        <form class="needs-validation" method="POST" action="{{ route('profil.update', $users->id) }} " validate>
            @csrf
            @method('PUT')
            <h5 class="card-header">Edit Profil</h5>
            <div class="form-row" style="text-align: center">
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="name">Username</label>
                    <span class="text-danger">*</span>
                    <input type="text" value="{{ old('name', $users->name) }}" name="name" id="name" class="form-control input-lg">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="email">Email</label>
                    <span class="text-danger">*</span>
                    <input type="email" value="{{ old('email', $users->email) }}" name="email" id="email" class="form-control input-lg">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="OldPassword">Password Lama</label>
                    <span class="text-danger">*</span>
                    <input type="password" value="{{ old('password') }}" name="old_password" id="old_password" class="form-control" required data-eye>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="NewPassword">Password Baru</label>
                    <span class="text-danger">*</span>
                    <input type="password" value="{{ old('password') }}" name="new_password" id="new_password" class="form-control" required data-eye>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="RepeatPassword">Konfirmasi Password</label>
                    <span class="text-danger">*</span>
                    <input type="password" value="{{ old('password') }}" name="repeatpassword" id="repeatpassword" class="form-control" required data-eye>
                </div>
                <br>
                <br>
                <br>
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4 mb-3">
            </br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    </form>
</div>
<div class="col-lg-12">
    <br>
    <p class="back-link">SPK Kelompok 2</p>
</div>
<script src="{{asset ('js/custom.js')}}"></script>
<script src="{{asset ('js/my-login.js')}}"></script>
<!-- <script src="{{asset ('js/my-login.js')}}"></script> -->
@endsection