@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-8">
            <div class="ratio-16x9">
                <script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script>
                <video controls id="video-id" src="https://www.googleapis.com/drive/v3/files/19Wu8B7N0AyP4lQu3xb5lYLXedhUoCmYZ?alt=media&key=AIzaSyBklh2Np_sfbUeUL96UNxXAvVtKGwN7Hw4">
                    <script>
                        var myFP = fluidPlayer(
                            'video-id', {
                                "layoutControls": {
                                    "controlBar": {
                                        "autoHideTimeout": 3,
                                        "animated": true,
                                        "autoHide": true
                                    },
                                    "htmlOnPauseBlock": {
                                        "html": null,
                                        "height": null,
                                        "width": null
                                    },
                                    "autoPlay": false,
                                    "mute": false,
                                    "allowTheatre": false,
                                    "playPauseAnimation": true,
                                    "playbackRateEnabled": false,
                                    "allowDownload": false,
                                    "playButtonShowing": true,
                                    "fillToContainer": false,
                                    "posterImage": ""
                                },
                                "vastOptions": {
                                    "adList": [],
                                    "adCTAText": false,
                                    "adCTATextPosition": ""
                                }
                            });
                    </script>
            </div>
            <!--  -->
            <div class="m-3">

                <h1 class="mb-4">{{$judul}}</h1>
                <p>{{$isi}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="shadow">
                <img src="https://source.unsplash.com/1200x800" alt="" style="height: 160px; width: 250px;">
                <h2>Bagian Detil</h2>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button id="pay-button" class="btn btn-primary" type="button">Beli!</button>
                    <form action="/payment" id="submit_form" method="POST">
                        @csrf
                        <input type="hidden" name="json" id="json_callback">
                    </form>

                    <script type="text/javascript">
                        // For example trigger on button clicked, or any time you need
                        var payButton = document.getElementById('pay-button');
                        payButton.addEventListener('click', function() {
                            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                            window.snap.pay('{{$token}}', {
                                onSuccess: function(result) {
                                    /* You may add your own implementation here */
                                
                                    console.log(result);
                                    send_response_to_form(result);
                                },
                                onPending: function(result) {
                                    /* You may add your own implementation here */
                                
                                    console.log(result);
                                    send_response_to_form(result);
                                },
                                onError: function(result) {
                                    /* You may add your own implementation here */
                            
                                    console.log(result);
                                    send_response_to_form(result);
                                },
                                onClose: function() {
                                    /* You may add your own implementation here */
                                
                                }
                            })
                        });
                        function send_response_to_form(result){
                            document.getElementById('json_callback').value = JSON.stringify(result);
                            $('#submit_form').submit();
                        }
                    </script>
                    <!-- <button class="btn btn-primary" type="button">Beli</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection