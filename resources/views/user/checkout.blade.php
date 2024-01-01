@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <div class="container mx-auto pt-20 pb-5 px-4">
        <form action="{{ url('/checkouts') }}" method="POST">
            @csrf
            <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                <div class="px-4 pt-8">
                    <p class="text-xl font-medium">Checkout</p>
                    <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                        <div class="flex flex-col items-center rounded-lg bg-white sm:flex-row">
                            <img class="m-2 h-32 w-32 rounded-md border object-cover object-center"
                                src="{{ asset('storage/' . $product->image) }}" alt="" />
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ $product->name }}</span>
                                <span class="float-right text-gray-400">{{ $product->category->name }}</span>
                                <p class="text-lg font-bold">Rp. {{ $product->price }}</p>
                                <span class="float-right text-gray-400 pb-1">Stok: {{ $product->quantity }}</span>
                                <div class="relative">
                                    <input type="number" id="total_quantity" name="total_quantity"
                                        class="w-full rounded-md border border-gray-200 px-2 py-2 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Jumlah Dibeli" value="{{ old('total_quantity') }}" />
                                    <div
                                        class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('total_quantity')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <p class="mt-8 text-lg font-medium">Metode Pengiriman</p>
                    <div class="mt-5 grid gap-6">
                        <div class="relative">
                            <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                            <span
                                class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                            <label
                                class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                                for="radio_1">
                                {{-- <img class="w-14 object-contain" src="" alt="" /> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-14">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="ml-5">
                                    <span class="mt-2 font-semibold">E-Serba Express</span>
                                    <p class="text-slate-500 text-sm leading-6">Pengiriman: 1 Hari</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <p class="text-xl font-medium">Alamat Rumah COD</p>
                    <div class="">
                        <label for="address" class="mt-4 mb-2 block text-sm font-medium">Alamat Pengiriman</label>
                        <div class="flex flex-col sm:flex-row">
                            <div class="relative flex-shrink-0 sm:w-12/12">
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Alamat" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @error('address')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('state')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                        @error('zip')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <div class="mt-6 border-t border-b py-2">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Subtotal</p>
                                <p class="font-semibold text-gray-900" id="subtotal">Rp. 0</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Pajak</p>
                                <p class="font-semibold text-gray-900" id="vat">Rp. 0</p>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900" id="total">Rp. 0</p>
                        </div>
                    </div>
                    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Order</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bodyscript')
    <script>
        function updateOrderSummary() {
            const quantityInput = document.getElementById('total_quantity');
            const quantity = parseInt(quantityInput.value) || 0;
            const productPrice = parseFloat("{{ $product->price }}");

            const subtotal = quantity * productPrice;
            const vat = (quantity > 0) ? 0.05 * subtotal : 0;
            const total = subtotal + vat;

            document.getElementById('subtotal').textContent = "Rp. " + subtotal.toFixed(2);
            document.getElementById('vat').textContent = "Rp. " + vat.toFixed(2);
            document.getElementById('total').textContent = "Rp. " + total.toFixed(2);
        }
        document.getElementById('total_quantity').addEventListener('input', updateOrderSummary);
        updateOrderSummary();
    </script>
@endsection
