@extends('layouts.main')
@section('content')

<div class="body">
    <h2 class="text-center"> Skill Class</h2>
    <p class="text-center pt-4">Kelas favorit untuk les privat bahasa internasional,course dan mata pelajaran lainnya</p>
    <div class="container justify-content-center">

        <div class="row">
            @foreach($kelas as $kel)
            <div class="col-md-3">
                <div class="kartu shadow">

                    <img src="https://source.unsplash.com/1200x800" alt="" style="height: 160px; width: 250px;">
                    <div class="card-body ms-2">
                        <h5>{{ $kel -> title}} </h5>
                        <h6><i class="bi bi-person-fill fs-4" style="color: #1D97BD;"></i> Rizki Alfian</h6>
                        <div class="my-3">

                            <div class="d-flex">
                                <p><i class="bi bi-heart-half" style="color: #1D97BD;"></i> Rating 5.0</p>
                                <p class="ms-5"><i class="bi bi-palette2" style="color: #1D97BD;"></i> 10 Modul</p>
                            </div>
                            <p><i class="bi bi-clock" style="color: #1D97BD;"></i> 10 Bulan</p>
                        </div>
                    </div>
                    <div class="card-footer mt-5">
                        <a href="/class/{{$kel -> slug}}" class=" btn tombol2">Ambil Kelas</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection