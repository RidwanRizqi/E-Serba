@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container mx-auto p-5">
        <div class="flex items-center justify-between mb-2">
            <div class="text-xl mb-3 font-semibold py-2">Dashboard</div>
            <div class="text-lg mb-3 font-semibold">
                <a href="{{ url('/') }}" class="text-white rounded-lg px-5 py-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                    Halaman Utama
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-4 sm:grid-cols-3 gap-4 pb-5 clear-both">
            <div>
                <a href="{{ url('/admin/users') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">User Aktif:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ auth()->user()->where('role', 'user')->where('is_active', true)->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/admin/categories') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Kategori:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $categories->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/admin/products') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Produk:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $products->where('quantity' > 0)->count() }}</span>
                    </h5>
                </a>
            </div>
            <div>
                <a href="{{ url('/admin/orders') }}"
                    class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Pesanan:
                        <span
                            class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $orders->count() }}</span>
                    </h5>
                </a>
            </div>
        </div>

        <div class="align-middle py-3">
            <span class="text-gray-700 text-xl font-semibold">10 Produk Terbaru</span>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg clear-both">
            <table class="text-sm text-left text-gray-500 dark:text-white w-full clear-both">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-blue-950 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Nama Produk</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Jumlah</th>
                    <th scope="col" class="px-6 py-3">Harga</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $index => $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}</th>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4">{{ $product->description }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="" width="100px">
                        </td>
                        <td class="px-6 py-4 {{ $product->quantity === 0 ? 'text-red-600' : '' }}">
                            {{ $product->quantity }}
                        </td>
                        <td class="px-6 py-4">Rp. {{ $product->price }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ url('/admin/products/' . $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex gap-4">
                                    <a href="{{ url('/admin/products/' . $product->id . '/edit') }}"
                                       class="text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                        </svg> Edit
                                    </a>
                                    <a href="{{ url('/admin/products/' . $product->id) }}" class="text-indigo-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd"
                                                  d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                  clip-rule="evenodd" />
                                        </svg> Detail
                                    </a>
                                    <button class="text-red-600"
                                            onclick="return confirm('Yakin hapus?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                  d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                  clip-rule="evenodd" />
                                        </svg> Hapus
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
