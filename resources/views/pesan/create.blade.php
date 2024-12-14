<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ Auth::user()->gambar }}</x-slot>
    <main>
        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Payment</h2>
          
                <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                  <form action="{{ route('proses_pesan') }}" method="POST" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                    @csrf
                    <div class="mb-6 grid grid-cols-2 gap-4">
                      <div class="col-span-2 sm:col-span-1">
                        <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nama pemesan* </label>
                        <input type="text" id="full_name" name="nama" value="{{ old('nama', Auth::user()->nama) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500" required />
                      </div>
          
                      <div class="col-span-2 sm:col-span-1">
                        <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> No Telepon (sesuai akun kamu)* </label>
                        <input type="text" id="card-number-input" pattern="^(+62)[0-9]{10-13}$" disabled value="{{ Auth::user()->no_handphone }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500" required />
                      </div>
          
                      <div>
                        <label for="card-expiration-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal berkunjung* </label>
                        <div class="relative">
                          <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                              <path
                                fill-rule="evenodd"
                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </div>
                          <input datepicker datepicker-format="yy/mm/dd" id="card-expiration-input" value="{{ old('tanggal_berkunjung') }}" name="tanggal_berkunjung" type="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500" placeholder="tahun/bulan/tanggal" required />
                        </div>
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email (sesuai akun kamu)* </label>
                        <input type="text" id="email" value="{{ Auth::user()->email }}" disabled class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-purple-500 dark:focus:ring-purple-500" placeholder="Bonnie Green" required />
                      </div>
                    </div>
                    
                    <select name="payment_method" class="w-full mb-4 rounded-lg text-sm font-medium text-gray-900 p-2.5 border-gray-300 bg-gray-50">
                      <option value="cash">Cash (langsung di tempat)</option>
                      <option value="e-wallet">E-Wallet (saldo kamu harus cukup)</option>
                    </select>

                    {{-- <input type="hidden" name="session_id" value="{{ session('data_pesan') }}"> --}}
                    <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4  focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Pay now</button>
                  </form>
          
                  <div class="mt-6 grow sm:mt-8 lg:mt-0">
                    <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                      <div class="space-y-2">
                        <dl>
                          <h3>{{ $dataPesan['nama_wisata'] }}</h3>
                        </dl>

                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tiket Masuk</dt>
                          <dd class="text-base font-medium text-gray-900 dark:text-white">{{$wisata->formatted_harga }}</dd>
                        </dl>
          
                        <dl class="flex items-center justify-between gap-4">
                          <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah Tiket</dt>
                          <dd class="text-base font-medium text-gray-900 dark:text-white">x{{ $dataPesan['jumlah_pemesanan'] }}</dd>
                        </dl>

                      </div>
          
                      <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                        <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $totalHarga }}</dd>
                      </dl>
                    </div>
          
                    <div class="mt-6 flex items-center justify-center gap-8">
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg" alt="" />
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="" />
                      <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="" />
                      <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg" alt="" />
                    </div>
                  </div>
                </div>
          
                <p class="mt-6 text-center text-gray-500 dark:text-gray-400 sm:mt-8 lg:text-left">
                  Payment processed by <a href="#" title="" class="font-medium text-purple-700 underline hover:no-underline dark:text-purple-500">Paddle</a> for <a href="#" title="" class="font-medium text-purple-700 underline hover:no-underline dark:text-purple-500">Flowbite LLC</a>
                  - United States Of America
                </p>
              </div>
            </div>
          </section>
          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </main>
</x-layout>