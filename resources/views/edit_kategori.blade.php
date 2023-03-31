<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>
    <div class="card m-5">
        <div class="card-body d-flex">
            <form action="{{ route('kategori.update', $kategori) }}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="namaa" class="rounded" value="{{ $kategori['nama'] }}">
                <button type="submit" class="btn btn-primary text-center bg-primary ms-2">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
