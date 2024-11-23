<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ Auth::user()->gambar }}</x-slot>
    <section class="bg-white py-8 antialiased mb-28 dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mx-auto max-w-5xl">
            <div class="gap-4 mt-6 sm:flex sm:items-start sm:justify-start">
              <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">My orders</h2>
              </div>
            </div>
      
            <div class="mt-6 flow-root sm:mt-8">
              <div class="divide-y w-5/6 mx-auto divide-gray-200 dark:divide-gray-700">

                @foreach ($riwayatTransaksi as $transaksi)
                  <div class="flex flex-wrap items-center gap-y-4 py-6">
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                      <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Tempat Wisata</dt>
                      <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                        <a href="#" class="hover:underline">{{ $transaksi->tour->nama_wisata }}</a>
                      </dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                      <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Tanggal Berkunjung:</dt>
                      <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $transaksi->tanggal_berkunjung }}</dd>
                    </dl>

                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                      <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Jumlah Tiket</dt>
                      <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $transaksi->quantity }}</dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                      <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Total Pembayaran:</dt>
                      <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $transaksi->price }}</dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                      <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                      @if ($transaksi->status == 'Menunggu Pembayaran')
                        <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-300">
                          <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                          </svg>
                          {{ $transaksi->status }}
                        </dd>
                      @elseif($transaksi->status == 'Transaksi Berhasil')
                        <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                          {{ $transaksi->status }}
                        </dd>
                      @else
                        <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                          {{ $transaksi->status }}
                        </dd>
                      @endif
                    </dl>
        
                    <div class=" grid sm:grid-cols-1 lg:flex lg:w-10 lg:items-center lg:justify-end gap-4">
                      <a href="{{ route('detail_pesan', $transaksi->id) }}" class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">View details</a>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
      </section>
</x-layout>