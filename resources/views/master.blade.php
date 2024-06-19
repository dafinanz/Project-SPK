@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="container-fluid col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb wow fadeInLeft">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="wow fadeInLeft active">Dashboard</li>
        </ol>
    </div>
    <br>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{asset ('gambar/BG.png')}}" alt="background">
            <div class="carousel-caption">
                <h3 class="home">Project Sistem Pendukung Keputusan</h3>
                <p class="home">Kelompok 2</p>
            </div>
        </div>
    </div>
    <!--/.row-->
    <br>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <div class="large"><strong>{{$alternatifs}}</strong></div>
                <div class="text"><strong>Jumlah Penduduk Yang Terdaftar</strong></div>
            </div>
            <div class="icon">
                <i class="fa fa-address-book" aria-hidden="true"></i>
            </div>
            <a href="{{route('alternatif.index')}}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            <!-- <a href="" class="small-box-footer">Report <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <div class="large"><strong>{{$kriterias}}</strong></div>
                <div class="text"><strong>Jumlah Kriteria</strong></div>
            </div>
            <div class="icon">
                <i class="fa fa-pie-chart" aria-hidden="true"></i>
            </div>
            <a href="{{route('kriteria.index')}}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            <!-- <a href="" class="small-box-footer">Report <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-12">
        <div class="alert alert-info" role="alert">
            <strong>
                <font size="4" face="Poppins">Sistem Pendukung Keputusan dalam Menentukan Lokasi Terbaik untuk Menanam Tanaman Perkebunan Berdasarkan Beberapa Faktor dengan Metode Fuzzy AHP</font>
            </strong>
            <font face="Poppins">
                <p style="text-align: justify;">Sistem ini akan mengolah data jumlah produksi, luas area, jumlah petani, dan jumlah perusahaan perkebunan di Kota/Kabupaten Jawa Tengah.
                    Data yang diambil akan berfokus pada data pada tahun 2021. Kemudian hasil dari sistem diharapkan akan memberikan hasil rekomendasi lokasi terbaik untuk menanam tanaman perkebunan atau merekomendasikan tanaman perkebunan terbaik untuk ditanam di Kota/Kabupaten Jawa Tengah</p>
            </font>
        </div>
    </div>
</div>
@endsection