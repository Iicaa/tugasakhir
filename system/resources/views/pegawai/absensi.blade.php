@extends('template.base')
@section('content')
<script src="https://code.jsqr.de/jsqr-1.0.2-min.js"></script>
<center>
    <h3>SCAN QR CODE ABSENSI</h3>
</center>
<video autoplay="true" id="video-webcam" width="100%">
        Browsermu tidak mendukung bro, upgrade donk!
    </video>

    <form action="{{url('x/absensi')}}" method="POST">
        @csrf
        <input type="hidden" name="kode" id="hasilQr">
    </form>
    


<script src="https://cdn.jsdelivr.net/npm/jsqr"></script>
<script type="text/javascript">
    var video = document.querySelector("#video-webcam");
    var hasilQrInput = document.getElementById("hasilQr");
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: { facingMode: "environment" } }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;

        // tunggu elemen video selesai dimuat
        video.onloadedmetadata = function() {
            // buat elemen canvas untuk merender video
            var canvas = document.createElement("canvas");
            var context = canvas.getContext("2d");

            // set ukuran canvas sama dengan ukuran video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // mulai membaca video dan mencari QR code
            setInterval(function() {
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                var code = jsQR(imageData.data, imageData.width, imageData.height);

                if (code) {
                    hasilQrInput.value = code.data;
                    // Anda dapat menambahkan logika di sini untuk mengirim data QR code ke server atau melakukan tindakan lainnya

                    // Otomatis kirim formulir saat QR code terdeteksi
                    document.querySelector('form').submit();
                }
            }, 1000); // interval pembacaan QR code
        };
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }
</script>



@endsection
