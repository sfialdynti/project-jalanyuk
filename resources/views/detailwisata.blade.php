<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <title>JalanYuk</title>
</head>
<body style="background-color: #001928" class="ubuntu">
    <style>
        #map {
            height: 300px;
            width: 100%;
        }

        .ubuntu {
            font-family: "Ubuntu", sans-serif;
            font-style: normal;
        }
    </style>

    @extends('template')
    @section('content')

    <div class="container mb-5" style="margin-top: 100px">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset('storage/foto/'.$wisata->foto) }}" alt="" class="rounded-4" width="380px;" style="height: 460px; object-fit: cover">
            </div>
            <div class="col">
                <div id="map" class="border border-white rounded-5"></div>
                <div class="d-flex mt-3">
                    <p class="fw-bold text-white" style="font-size: 23px">{{ $wisata->nama_wisata }}</p>
                    <p class="ms-3 mt-2" style="color: #4284a8">{{ $wisata->kategoris->nama_kategori }}</p>
                </div>
                <p style="color: #5d737f">{{ $wisata->deskripsi }}
                </p>
            </div>
        </div>
    </div>

    @endsection


    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Latitude: {{ $wisata->latitude }}, Longitude: {{ $wisata->longitude }}");
            var map = L.map('map').setView([{{ $wisata->latitude }}, {{ $wisata->longitude }}], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                .bindPopup('<b>{{ $wisata->nama_wisata }}</b><br>{{ $wisata->lokasi }}')
                .openPopup();
        });
    </script>
</body>
</html>