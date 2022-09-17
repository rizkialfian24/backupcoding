@extends('dashboard.layouts.main')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Postingan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div>
    <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/1200x800" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$post -> title}}</h5>
                            <br>
                            <a href="/dashboard/posts/{{$post -> slug}}" class="btn btn-primary">Go somewhere</a>
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
                <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="gambar" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Link Vidio</label>
                            <input type="text" name="vidio" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="summernote" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

    })
</script>
@endsection