@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-xl font-semibold text-gray-800 pb-5">{{ $product->id === null ? 'Tambah' : 'Edit' }} Produk Form
        </h2>

        @if ($product->id === null)
            <form action="{{ url('/admin/products') }}" method="POST" enctype="multipart/form-data">
            @else
                <form action="{{ url('/admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
        @endif
        @csrf
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Pilih Kategori</label>
            <select id="category_id"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('category_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                name="category_id">
                <option value="" selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id === $category->id || old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
            <input type="text" id="name" name="name"
                value="{{ $product->name ?? old('name') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
            <textarea id="description" name="description" rows="4"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('description') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                >{{ $product->description ?? old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

{{--                    add quantity--}}
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Jumlah Stok:</label>
            <input type="number" id="quantity" name="quantity"
                value="{{ $product->quantity ?? old('quantity') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('quantity') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('quantity')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Harga:</label>
            <input type="number" id="price" name="price"
                value="{{ $product->price ?? old('price') }}"
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('price') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
            @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="image">Gambar Produk</label>
            <input
                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('image') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                id="image" type="file" name="image">
            @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-start">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ $product->id === null ? 'Tambah' : 'Update' }}
            </button>
            <a href="{{ url('/admin/products') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mx-1">Kembali</a>
        </div>
        </form>
    </div>
@endsection
