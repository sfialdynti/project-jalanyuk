@extends('template')
@section('content')
<style>
    .card-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
            height: 100%;
        }

        .card-content {
            min-height: 60px;
        }
</style>

    <div class="container ubuntu text-white mb-5" style="margin-top: 100px">
        <div class="border-bottom">
            <h4 class="fw-bold mb-4">Hasil Pencarian: {{ $cari }}</h4>
        </div>
        <div class="row">
            @if ($wisata->isNotEmpty())
            @foreach ($wisata as $item)
            <div class="col-3 mt-5">
                <div class="card-container shadow rounded-5" style="height: 100%;">
                    <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="" class="rounded-5" style="width: 200px; height: 300px; object-fit: cover">
                    
                    <div class="card-content mt-3">
                        <li class="fw-bold">{{ $item->nama_wisata }}</li>
                        <li style="font-size: 12px">Terletak di {{ $item->lokasi }}</li>
                    </div>
            
                    <li class="mt-2 w-100" style="list-style-type: none">
                        <a href="{{ route('detail.wisata', ['id' => $item->id]) }}" class="text-decoration-none">
                            <button class="rounded-5 py-1 border-0 w-100 d-flex justify-content-between align-items-center px-3" style="background-color: #f0f0f0;">
                                <span class="ubuntu" style="font-size: 13px">Lihat Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="black" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                </svg>
                            </button>
                        </a>
                    </li>
                </div>
            </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>

@endsection