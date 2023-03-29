<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="d-flex card">
        <div class="card-body flex-fill justify-content-center text-center" style="background-color: #a2d9ff">
            <form action="{{ route('kategori.store') }}" method="post" class="container mt-5">
                @csrf
                <div class="mb-3">
                    <label class="fs-4 fw-bold">Add Kategori</label>
                </div>
                <div class="mb-2">
                    <input type="text" id="name" name="name" placeholder="name">
                </div>
                <button type="submit" class="btn btn-primary btn-sm bg-primary">Submit</button>
            </form>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1"
                d="M0,96L48,96C96,96,192,96,288,80C384,64,480,32,576,48C672,64,768,128,864,128C960,128,1056,64,1152,53.3C1248,43,1344,85,1392,106.7L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
        <div class="card-body flex-fill row">
            <h2 class="text-center fw-bold fs-4 mb-3">All Kategori</h2>
            @foreach ($kategori as $item)
                {{-- <input type="text" type="hidden" value="{{ $item['id'] }}"> --}}
                <ul class="list-group flex-fill" style="width: 30%">
                    <a href="{{ route('kategori.show', $item) }}">
                        <li class="list-group-item text-center text-primary text-decoration-underline">
                            {{ $item['nama'] }}</li>
                    </a>
                </ul>
            @endforeach
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1"
                d="M0,224L48,229.3C96,235,192,245,288,240C384,235,480,213,576,224C672,235,768,277,864,256C960,235,1056,149,1152,112C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
        <footer class="text-center" style="background-color: #a2d9ff">>HEHEHE</footer>
    </div>
</x-app-layout>
