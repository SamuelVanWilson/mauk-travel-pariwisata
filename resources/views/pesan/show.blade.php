<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ Auth::user()->gambar }}</x-slot>
    <section class="mt-10 py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <a
            href="/tours-mauk"
            title=""
            class=" py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            role="button"
            >
            Kembali
            </a>
          <div class="py-10 lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
              <img class="w-full dark:hidden" src="{{ asset('storage/img_wisata/'. $gambarWisata) }}" alt="" />
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <p
                class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
              >
              Tanggal Berkunjung: {{ $wisata->tanggal_berkunjung }}
              </p>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <h1
                  class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                >
                  {{ $wisata->tour->nama_wisata }}
                </h1>
              </div>
    
    
              <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
              <div class="mt-6 ">
                Jumlah Pemesanan: <b>{{ $wisata->quantity }}</b>
              </div>
              <div class="">
                Total Harga: Rp.<b>{{ $wisata->price }}</b>
              </div>
              <p class="mb-6 text-gray-500 dark:text-gray-400">
                {{ $deskripsiWisata }}
              </p>
            </div>
          </div>
        </div>
      </section>
</x-layout>