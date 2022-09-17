@extends('layouts.main')
@section('content')
<div class="beground">
    <div class="container justify-content-center">

        <div class="row">
            <div class="col-md-8 text-white">
                <div class="tulisan1">
                    <h1>
                        Bagun Jenjang Karir Anda Dari Sekarang!
                    </h1>
                </div>
                <div class="box">

                    <p>Banyak dari kita menyadari kesalahan jurusan dan kebutuhan skill ketika sudah tamat sekolah,kuliah atau sedang menjalani proses belajar.</p>
                    <p>Namun itu tidak menjadi masalah ketika kamu #semangatberjuang untuk upgrade skill bersama highskill Mari raih impian mu bersama Highskill</p>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">Daftar Member Gratis</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="padding-top: 90px;">
                <img src="img/orang1.png">
            </div>
        </div>
    </div>
</div>

<div class="container justify-content-center" style=" margin-top: 40px;">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>SOLUSI KAMI</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box2 shadow-sm">
                    <img src="img/vector.png" class="gambar" alt="">
                    <center>
                        <p>Belajar full online dari rumah</p>
                    </center>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box2 shadow-sm">
                    <img src="img/vector1.png" class="gambar" alt="">
                    <center>
                        <p>Akses Materi selama proses pembelajaran berlangsung</p>
                    </center>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box2 shadow-sm">
                    <img src="img/vector2.png" class="gambar" alt="">
                    <center>
                        <p>Free webinar, talkshow dan kegiatan lainnya</p>
                    </center>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box2 shadow-sm">
                    <img src="img/vector3.png" class="gambar" alt="">
                    <center>
                        <p>Tentor berkulitas</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container justify-content-center" style=" margin-top: 40px;">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>SOLUSI KAMI</h2>
        </div>
        <!-- ------- -->
        <center>
            <div id="myBtnContainer" class="justify-content-center">
                <button class="tombol active" onclick="filterSelection('all')"> Skill Class</button>
                <button class="tombol" onclick="filterSelection('edu')"> Edu Class</button>
                <button class="tombol" onclick="filterSelection('enterpreneur')"> Enterpreneur Class</button>
                <button class="tombol" onclick="filterSelection('bootcamp')"> BootCamp </button>
                <button class="tombol" onclick="filterSelection('webinar')"> Webinar </button>
                <button class="tombol" onclick="filterSelection('training')"> Training </button>
            </div>
        </center>
        <div class="row">

            <div class="column skill">
                <div class="content">
                    <P>Skill</P>
                </div>
            </div>
            <div class="column edu">
                <div class="content">
                    <P>edu</P>
                </div>
            </div>
            <div class="column enterpreneur">
                <div class="content">
                    <p>enterpreneur</p>
                </div>
            </div>
            <div class="bootcamp"></div>
            <div class="webinar"></div>
            <div class="training"></div>
        </div>
    </div>
</div>

<div class="blog">
    <div class="container justify-content-center">

        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>BLOG</h2>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1200x800" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1200x800" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1200x800" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    filterSelection("all") // Execute the function and show all columns
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("tombol");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

@endsection