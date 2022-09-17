@extends('dashboard.layouts.main')
@section('container')
<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        {{$title}}

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- tombol hapus -->
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">


                    </div>
                    <div class="card-body">

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mt-1">
                <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                </button>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach ($postingan as $posting)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1200x800" class="card-img-top" alt="...">
                    <div class="card-body">
                        {{$posting -> sub_judul}}
                        <br>
                        <a href="/dashboard/posts/course/{{$posting -> sub}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <form action="/dashboard/posts/sub" method="post">
                @csrf
                <input type="hidden" name="id_deskripsi" value="{{$id}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sub Judul</label>
                        <input type="text" name="sub_judul" class="form-control" placeholder="Judul Materi">
                    </div>
                    <select class="form-select" name="jenis" aria-label="Default select example">
                        <option selected>Jenis Modul</option>
                        <option value="1">Vidio</option>
                        <option value="2">Artikel</option>
                        <option value="3">Tugas</option>
                        <option value="4">Ujian</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection