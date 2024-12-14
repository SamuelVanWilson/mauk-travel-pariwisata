<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @notifyCss
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('asset_web/logo.png') }}" type="image/png">
    <style>
      #navBar {
        z-index: 50; /* Pastikan nilai z-index cukup tinggi */
        position: fixed;
        top: 0;
        width: 100%;
      }
      main {
        padding-top: 100px;
      }
      .nt-top {
        top: 4em;
      }
    </style>
</head>
<body>
@include('notify::components.notify')
<nav class="bg-white border-b fixed w-full top-0 border-gray-200 dark:bg-gray-900 z-50" id="navBar">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{asset('asset_web/logo.png')}}" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mauk Tour</span>
    </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @auth
      <p class="me-2 mt-1.5 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
        {{ Auth::user()->formatted_saldo }}
      </p>
      @endauth
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        @auth
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 shadow bg-purple-300 rounded-full border-purple-500 border-2" src="{{ asset('storage/profile/'.$gambar) }}" alt="user photo">
        @endauth
        @guest
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 shadow bg-red-300 rounded-full border-red-500 border-2" src="{{ asset('storage/profile/user.jpg') }}" alt="user photo">
        @endguest
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        @auth
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{ route('tours.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Wisata</a>
            </li>
            <li>
              <a href="{{ route('riwayat') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Daftar Pesan</a>
            </li>
            <li>
              <a href="{{ route('auth.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
          </ul>
        @endauth
        @guest
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{ route('tours.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Wisata</a>
            </li>
            <li>
              <a href="{{ route('auth.login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Login</a>
            </li>
            <li>
              <a href="{{ route('auth.register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Register</a>
            </li>
          </ul>
        @endguest
      </div>
  </div>
  </div>
</nav>

  

