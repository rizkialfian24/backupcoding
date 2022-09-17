@extends('dashboard.layouts.main')
@section('container')

@if($vidio->count())

<p>vidio tersedia</p>
@else
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
@endif
<!-- model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <form action="/dashboard/posts/course/vidio" method="post">
                @csrf
                <input type="hidden" name="id_sub" value="{{$id}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Link Vidio</label>
                        <input type="text" name="link" class="form-control" placeholder="Judul Materi">
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

@endsection