<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-800">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-24 w-auto" src="{{ asset('assets/images/logo.png') }}"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">
                Daftar Akun Baru
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ url('/registers') }}" method="POST">
                @csrf
                <div>
                    <label for="name"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nama</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="name" required
                            placeholder="Masukkan nama anda" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:ring-gray-600 dark:text-white dark:focus:ring-indigo-500">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone"
                           class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nomor Telepon</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="text" autocomplete="phone" required
                               placeholder="Masukkan Nomor Telepon Anda" value="{{ old('phone') }}"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:ring-gray-600 dark:text-white dark:focus:ring-indigo-500">
                    </div>
                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            placeholder="Masukkan Alamat Email Anda" value="{{ old('email') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:ring-gray-600 dark:text-white dark:focus:ring-indigo-500">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            placeholder="Masukkan Password Anda"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:ring-gray-600 dark:text-white dark:focus:ring-indigo-500">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="confirm_password"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Konfirmasi
                        Password</label>
                    <div class="mt-2">
                        <input id="confirm_password" name="password_confirmation" type="password"
                            autocomplete="new-password" required placeholder="Konfirmasi Password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-800 dark:ring-gray-600 dark:text-white dark:focus:ring-indigo-500">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus:ring-indigo-500">Sign
                        up</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="{{ url('/logins') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">Login ke akun anda.</a>
            </p>
        </div>
    </div>
</body>

</html>
