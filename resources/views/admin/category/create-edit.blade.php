@extends('layouts.dashboard')
@section('title', 'Category')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">{{ $category->id === null ? 'Tambah' : 'Edit' }} Kategori
        </h2>

        @if ($category->id === null)
            <form action="{{ url('/admin/categories') }}" method="POST">
            @else
                <form action="{{ url('/admin/categories/' . $category->id) }}" method="POST">
                    @method('PUT')
        @endif
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
            <input type="text" id="name" name="name" placeholder="Enter Category Name"
                value="{{ $category->name ?? old('name') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi Kategori:</label>
            <textarea type="text" id="description" name="description" placeholder="Enter Category Description"
                      class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('description') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">{{ $category->description ?? old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-start">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ $category->id === null ? 'Store' : 'Update' }}
            </button>
            <a href="{{ url('/admin/categories') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Kembali</a>
        </div>
        </form>
    </div>
@endsection
