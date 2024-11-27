<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    @auth
        <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    @endauth
    @if ($userRole == 'admin')
      <x-admin-sidebar>
        <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12 {{ empty($tours) ? 'h-screen' : '' }}">
          <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
              <div>
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Wisata Mauk</h2>
              </div>
              <div class="flex items-center space-x-4">
                <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Category
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>

            {{-- CARD CONTAINER --}}
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
              {{-- CARD ITEMS --}}
              @forelse ($tours as $tour)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                  <div class="h-56 w-full">
                    <a href="{{ route('tours.show', $tour->nama_wisata) }}">
                      <img class="mx-auto h-full object-cover" src="{{ asset('storage/img_wisata/'.$tour->gambar) }}" alt="" />
                    </a>
                  </div>
                  <div class="pt-6">
          
                    <a href="{{ route('tours.show', $tour->nama_wisata) }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $tour->nama_wisata }}</a>
          
                    <ul class="mt-2 flex items-center gap-4">
                      <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $tour->category->nama }}</p>
                      </li>
                    </ul>
                    
                    {{-- CARD ITEMS --}}
                    <div class="mt-4 flex items-center justify-between gap-4">
                      <p class="text-sm font-extrabold leading-tight text-gray-900 dark:text-white">{{ $tour->formatted_harga }}</p>
          
                      <a href="{{ route('tours.show', $tour->nama_wisata) }}" class="inline-flex items-center rounded-lg bg-purple-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Detail
                        <svg class="w-5 h-5 ml-2 -mr-1 -mb-1" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" stroke-width="2" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </a>
                    </div>
                  </div>
                </div>
                @empty
                  <p class="text-start text-gray-600">Belum Ada Data Wisata!!!</p>
              @endforelse
            </div>
          </div>
          <!-- Filter modal -->
          <form action="#" method="get" id="filterModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-xl md:h-auto">
              <!-- Modal content -->
              <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                  <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Category</h3>
                  <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="filterModal">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                </div>
                <!-- Modal body -->
                <div class="px-4 md:px-5">
                  <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                      <li class="mr-1" role="presentation">
                        <button class="inline-block pb-2 pr-1" id="brand-tab" data-tabs-target="#brand" type="button" role="tab" aria-controls="profile" aria-selected="false">Wisata</button>
                      </li>
                    </ul>
                  </div>
                  <div id="myTabContent">
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-3" id="brand" role="tabpanel" aria-labelledby="brand-tab">
        
                      <div class="space-y-2">
        
                        <div class="flex items-center">
                          <input id="beats" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
        
                          <label for="beats" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Pantai </label>
                        </div>
        
        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center space-x-4 rounded-b p-4 dark:border-gray-600 md:p-5">
                  <button type="submit" class="rounded-lg bg-purple-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-700 dark:hover:bg-primary-800 dark:focus:ring-primary-800">Tampilkan</button>
                  <button type="reset" class="rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </section>
      </x-admin-sidebar>
    @else
      <section class="bg-gray-50 py-8 mb-28 antialiased dark:bg-gray-900 md:py-12">
          <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
              <div>
                <nav class="flex" aria-label="Breadcrumb">
                  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                      <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                      </a>
                    </li>
                    <li>
                      <div class="flex items-center">
                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Products</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Electronics</span>
                      </div>
                    </li>
                  </ol>
                </nav>
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Wisata Mauk</h2>
              </div>
              <div class="flex items-center space-x-4">
                <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Category
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
              </div>
            </div>

            {{-- CARD CONTAINER --}}
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
              {{-- CARD ITEMS --}}
              @foreach ($tours as $tour)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                  <div class="h-56 w-full">
                    <a href="{{ route('tours.show', $tour->nama_wisata) }}">
                      <img class="mx-auto h-full object-cover" src="{{ asset('storage/img_wisata/'.$tour->gambar) }}" alt="" />
                    </a>
                  </div>
                  <div class="pt-6">
          
                    <a href="{{ route('tours.show', $tour->nama_wisata) }}" class="object-cover text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $tour->nama_wisata }}</a>
          
                    <ul class="mt-2 flex items-center gap-4">
                      <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $tour->category->nama }}</p>
                      </li>
                    </ul>
                    
                    {{-- CARD ITEMS --}}
                    <div class="mt-4 flex items-center justify-between gap-4">
                      <p class="text-md font-extrabold leading-tight text-gray-900 dark:text-white">{{ $tour->formatted_harga }}</p>
          
                      <a href="{{ route('tours.show', $tour->nama_wisata) }}" class="inline-flex items-center rounded-lg bg-purple-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Lihat Wisata
                        <svg class="w-5 h-5 ml-2 -mr-1 -mb-1" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" stroke-width="2" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
          <!-- Filter modal -->
          <form action="#" method="get" id="filterModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-xl md:h-auto">
              <!-- Modal content -->
              <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                  <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Category</h3>
                  <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="filterModal">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                </div>
                <!-- Modal body -->
                <div class="px-4 md:px-5">
                  <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                      <li class="mr-1" role="presentation">
                        <button class="inline-block pb-2 pr-1" id="brand-tab" data-tabs-target="#brand" type="button" role="tab" aria-controls="profile" aria-selected="false">Wisata</button>
                      </li>
                    </ul>
                  </div>
                  <div id="myTabContent">
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-3" id="brand" role="tabpanel" aria-labelledby="brand-tab">
        
                      <div class="space-y-2">
        
                        <div class="flex items-center">
                          <input id="beats" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
        
                          <label for="beats" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Pantai </label>
                        </div>
        
        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center space-x-4 rounded-b p-4 dark:border-gray-600 md:p-5">
                  <button type="submit" class="rounded-lg bg-purple-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-700 dark:hover:bg-primary-800 dark:focus:ring-primary-800">Tampilkan</button>
                  <button type="reset" class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
                </div>
              </div>
            </div>
          </form>
      </section>
    @endif
</x-layout>