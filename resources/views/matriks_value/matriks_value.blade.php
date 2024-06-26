@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="wow fadeInLeft">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Perhitungan</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Matriks Value</h2>
            </div>
        </div>
    </div>
    <!--/.main-->
</div>

<div class="wow fadeIn">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="form-inline">
                            <div class="form-group">
                                <input id="floatingInputGroup1" name="cari" type="text" class="form-control" placeholder="Cari">
                                <button class="input-group-text btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive" id="tableContainer">
                        <form action="{{ route('matriks_value.update_selection_with_values') }}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="cari" value="{{ request('cari') }}">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th>Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                            <th class="text-center" style="vertical-align:middle;">{{$kriteria->nama_kriteria}}</th>
                                        @endforeach
                                        <th class="text-center" style="vertical-align:middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <td class="text-left" style="vertical-align:middle;">
                                                <input type="hidden" name="alternatif[{{$alternatif->kode}}]" value="{{$alternatif->kode}}">
                                                {{$alternatif->nama}}
                                            </td>
                                            @foreach($kriterias as $kriteria)
                                                <td class="text-center" style="vertical-align:middle;">
                                                    @php
                                                        $selectedValue = App\Models\PerbandinganAlternatif::where('alternatif_id', $alternatif->id)
                                                            ->where('kriteria_id', $kriteria->kode_kriteria)
                                                            ->value('bobot');
                                                    @endphp
                                                    <select class="form-control form-control-sm" name="bobot[{{$alternatif->kode}}][{{$kriteria->kode_kriteria}}]">
                                                        @foreach ($sub_kriterias as $sub)
                                                            @if($sub->kode_kriteria == $kriteria->kode_kriteria)
                                                                <option value="{{ $sub->bobot }}" {{ old('bobot.' . $alternatif->kode . '.' . $kriteria->kode_kriteria, $selectedValue) == $sub->bobot ? 'selected' : '' }}>
                                                                    {{$sub->bobot}}-{{$sub->nama_sub}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endforeach
                                            <td class="text-center" style="vertical-align:middle;">
                                                <button type="submit" name="action" value="{{ $alternatif->is_selected ? 'remove_'.$alternatif->id : 'add_'.$alternatif->id }}" class="btn {{ $alternatif->is_selected ? 'btn-danger' : 'btn-success' }}">
                                                    <i class="fa {{ $alternatif->is_selected ? 'fa-times' : 'fa-check' }}"></i> {{ $alternatif->is_selected ? 'Remove' : 'Add' }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>                                
                            </table>
                        </form>
                        <div class="d-flex justify-content-center">
                            {{ $alternatifs->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>                
                
                </br>
                </br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="table2" style="display: none;">

                    </table>
                </div>
            </div>
            <div class="col-sm-12">
                <p class="back-link">SPK Kelompok 2</a></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
</script>
@endsection