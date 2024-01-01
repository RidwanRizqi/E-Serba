@extends('layouts.master')
@section('title', 'E-Serba')
@section('content')
    <div class="container mx-auto pt-20 md:pt-0 pb-5">
        <div id="default-carousel" class="relative w-full pt-3" data-carousel="slide">
            <div class="relative h-96 md:h-screen overflow-hidden rounded-lg z-0">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/image-removebg-preview (5).png') }}" style="height: 900px"
                         class="absolute block max-w-full md:max-w-8xl transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/image-removebg-preview (6).png') }}" style="height: 900px"
                         class="absolute block max-w-full md:max-w-8xl transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/images/image-removebg-preview (7).png') }}" style="height: 900px"
                         class="absolute block max-w-full md:max-w-8xl transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>

            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="bg-gray-900 text-white text-center py-3 px-3 md:px-0 w-full">
        <a href="#" class="block">
            <span class="font-bold">Temukan Produk Sesuai Kebutuhanmu!</span>
            Hanya di E-Serba E-Commerce Serba Ada
        </a>
    </div>

    {{-- Shop By Category --}}
    <div class="py-7">
        <h1 class="text-center font-bold text-3xl pb-5">Kategori Produk Yang Anda Butuhkan</h1>
        <hr class="block m-auto bg-gray-900 h-1 w-5/6 rounded">
        <div class="flex justify-center px-4 md:px-0">
            <div class="grid md:grid-cols-3 pt-5 gap-y-2 md:gap-y-4 md:gap-x-5">
                @foreach ($categories as $category)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-5">
                            <a href="{{ url('/?category_id=' . $category->id) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $category->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-white">{{ $category->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Latest Products --}}
    <div class="py-7">
        <h1 class="text-center font-bold text-3xl pb-5">Produk Kami</h1>
        <hr class="block m-auto bg-gray-900 h-1 w-5/6 rounded">
        <div class="flex justify-center px-4 md:px-0">
            <div class="grid md:grid-cols-3 pt-5 gap-y-2 md:gap-y-4 md:gap-x-5">
                @foreach ($products->all() as $product)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ auth()->user() ? url('/product-details/' . $product->id) : route('login') }}" class="block relative">
                            <div class="overflow-hidden rounded-t-lg h-96"> <!-- Set a specific height, adjust as needed -->
                                <img class="object-cover w-full h-full" src="{{ asset('storage/' . $product->image) }}" alt="" />
                            </div>
                        </a>



                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-white">{{ $product->description }}</p>
                            @auth
                                <form action="{{ url('carts/create') }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="number" name="product_id" class="hidden" value="{{ $product->id }}">
                                    @php
                                        $addedToCart = false;
                                        foreach (auth()->user()->carts as $cart) {
                                            if ($cart->status == 'Added to Cart' && $cart->product_id === $product->id) {
                                                $addedToCart = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if ($addedToCart)
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white {{ $product->quantity === 0 ? 'bg-red-500' : 'bg-yellow-700' }} rounded-lg"
                                            disabled>
                                            {{ $product->quantity === 0 ? 'Stok Habis' : 'Keranjang' }}
                                            <svg fill="none" class="w-4 h-4 ml-2 -mr-1" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    @else
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white {{ $product->quantity === 0 ? 'bg-red-500 hover:bg-red-800' : 'bg-blue-700 hover:bg-blue-800' }} rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300"
                                            {{ $product->quantity === 0 ? 'disabled' : '' }}>
                                            {{ $product->quantity === 0 ? 'Stok Habis' : 'Tambahkan Ke Keranjang' }}
                                            <svg fill="none" class="w-4 h-4 ml-2 -mr-1" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </form>
                            @endauth
                            <a href="{{ auth()->user() ? url('/product-details/' . $product->id) : route('login') }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Detail
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
