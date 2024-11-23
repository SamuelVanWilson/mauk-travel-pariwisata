<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    @auth
        <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    @endauth
    <section class="mt-10 py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <a
            href="/tours-mauk   "
            title=""
            class=" py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            role="button"
            >
            Kembali
            </a>
          <div class="py-10 lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
              <img class="w-full dark:hidden" src="{{ asset('storage/img_wisata/'. $wisata->gambar) }}" alt="" />
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
              >
                {{ $wisata->nama_wisata }}
              </h1>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p
                  class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                >
                  Rp. {{ $wisata->harga }}
                </p>
              </div>
    
              <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                
                @if (Auth::user()->role->nama == 'admin')
                  <a
                  href="{{ route('admin.edit', $wisata->nama_wisata) }}"
                  class="text-white mt-4 sm:mt-0 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 flex items-center justify-center"
                  role="button"
                  >
    
                  Edit
                  </a>

                  <form action="{{ route('admin.destroy', $wisata->nama_wisata) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button
                    type="submit"
                    class="text-white mt-4 sm:mt-0 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center justify-center"
                    role="button"
                    >
      
                    Hapus
                    </button>
                  </form>
                @else
                  <form action="{{ route('pesan', $wisata->nama_wisata) }}" method="get">
                    <input type="number" name="quantity" placeholder="Jumlah Tiket">
                    <button type="submit"
                    class="text-white mt-4 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 flex items-center justify-center"
                    role="button"
                    >
      
                    Beli Tiket
                    </button>
                  </form>

                @endif
                  
              </div>
    
              <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
              
              <li class="flex items-center gap-2">
                <svg class="h-10 w-10 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                </svg>
                <p class="text-md font-medium text-gray-500 dark:text-gray-400">{{ $wisata->category->nama }}</p>
              </li>
              <p class="mb-6 text-gray-500 dark:text-gray-400">
                {{ $wisata->deskripsi }}
              </p>
            </div>
          </div>
        </div>
      </section>
</x-layout>