<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>
    <div class="card m-5">
        <div class="card-body flex">
            <h4>{{ $kategori->nama }}</h4>
            <div class="justify-content-end">
                <button class="btn btn-outline-primary">Edit</button>
                <button class="btn btn-outline-danger">Delete</button>
            </div>
        </div>

    </div>
    <div class="col-auto ms-5">
        <a class="btn btn-primary" href="{{ route('kategori.index') }}">
            <i class="bi-chevron-left me-1"></i> Back
        </a>
    </div>
</x-app-layout>
