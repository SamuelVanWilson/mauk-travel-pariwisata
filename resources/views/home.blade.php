<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    @auth
        <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    @endauth
    <main class="bg-white dark:bg-gray-900 ">
    <section id="hero" class="h-screen flex flex-col justify-center items-center px-4 lg:px-16 lg:flex-row">
        <div class="w-full flex justify-center mb-6 lg:mb-0 lg:order-2 lg:w-1/2">
            <img src="{{ asset('asset_web/landing_page1.webp') }}" class="rounded-md w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full" alt="mockup">
        </div>
        <div class="text-center lg:text-left lg:w-1/2">
            <h1 class="text-3xl font-extrabold tracking-tight leading-tight mb-4 md:text-4xl lg:text-5xl xl:text-6xl dark:text-white max-w-lg mx-auto lg:mx-0">
                Temukan Destinasi Wisata Terbaik
            </h1>
            <p class="text-gray-500 font-light mb-6 md:text-lg lg:text-xl lg:mb-8 dark:text-gray-400 max-w-lg mx-auto lg:mx-0">
                Jelajahi tempat-tempat menakjubkan di daerah mauk dengan mudah. Rencanakan perjalanan Anda sekarang!
            </p>
            <a href="{{ route('tours.index') }}" 
            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white rounded-lg bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-900">
                Lihat Wisata
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900 py-12 px-4 sm:py-16 lg:px-6" id="feature">
        <div class="mx-auto max-w-screen-xl text-center">
            <h2 class="text-4xl font-extrabold tracking-tight mb-6 text-gray-900 dark:text-white">Fitur Unggulan Kami</h2>
            <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400 max-w-2xl mx-auto mb-12">
                Solusi inovatif untuk perjalanan Anda dengan layanan terbaik yang dirancang untuk kenyamanan Anda.
            </p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 max-w-screen-xl mx-auto">

            <div class="text-center">
                <div class="flex justify-center items-center w-14 h-14 mb-4 mx-auto rounded-full bg-purple-100 dark:bg-purple-900">
                    <svg class="w-7 h-7 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Destinasi Unggulan</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Pilih dari berbagai rekomendasi destinasi eksotis untuk liburan tak terlupakan.
                </p>
            </div>

            <div class="text-center">
                <div class="flex justify-center items-center w-14 h-14 mb-4 mx-auto rounded-full bg-purple-100 dark:bg-purple-900">
                    <svg class="w-7 h-7 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Kemudahan Transportasi</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Nikmati layanan pemesanan transportasi langsung dari platform kami.
                </p>
            </div>

            <div class="text-center">
                <div class="flex justify-center items-center w-14 h-14 mb-4 mx-auto rounded-full bg-purple-100 dark:bg-purple-900">
                    <svg class="w-7 h-7 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Harga Terbaik</h3>
                <p class="text-gray-500 dark:text-gray-400">
                    Dapatkan penawaran harga terbaik yang sesuai dengan anggaran Anda.
                </p>
            </div>
        </div>
    </section>


    <section class="bg-white px-4 py-8 antialiased dark:bg-gray-900 md:py-16" id="product">
    <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
        <div class="lg:col-span-5 lg:mt-0">
        <a href="#">
            <img class="mb-4 h-56 w-56 object-contain dark:hidden sm:h-96 sm:w-96 md:h-full md:w-full rounded-md" 
                src="{{ asset('asset_web/landing_page3.jpeg') }}" 
                alt="peripherals" />
            <img class="mb-4 hidden dark:block md:h-full object-contain rounded-md" 
                src="{{ asset('asset_web/landing_page2.jpeg') }}" 
                alt="peripherals" />
        </a>
        </div>
        <div class="me-auto place-self-center lg:col-span-7">
        <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
            Jelajahi Destinasi <br />
            Impian Anda
        </h1>
        <p class="mb-6 text-gray-500 dark:text-gray-400">
            Temukan berbagai pengalaman seru di seluruh daerah mauk dengan layanan kami. Rencanakan perjalanan Anda, hemat waktu, dan nikmati perjalanan tanpa khawatir.
        </p>
        <a href="{{ route('tours.index') }}" 
            class="inline-flex items-center justify-center rounded-lg bg-purple-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-900">
            Pesan Sekarang
        </a>
        </div>    
    </div>
    </section>


    <section class="bg-white dark:bg-gray-900" id="faq">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white text-start">Pertanyaan yang Sering Diajukan</h2>
            <div class="grid pt-8 text-left border-t w-full border-gray-200 md:gap-16 dark:border-gray-700">
                <div class="flex flex-wrap justify-center gap-6 w-full sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="mb-10 w-full sm:w-2/5 lg:w-full xl:w-full">
                        <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                            <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            Apakah tiket ini bisa dibatalkan setelah dipesan?
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">Tiket yang sudah dipesan tidak bisa dibatalkan atau dikembalikan. Namun, Anda dapat memindahkan tiket ke orang lain dengan syarat tertentu. Hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                    <div class="mb-10 w-full sm:w-2/5 lg:w-full xl:w-full">
                        <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                            <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            Bagaimana cara mendapatkan e-tiket setelah pembayaran?
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">Setelah pembayaran berhasil, e-tiket akan dikirimkan melalui email Anda dalam waktu 5-10 menit. Pastikan email yang Anda masukkan saat pemesanan benar.</p>
                    </div>
                    <div class="mb-10 w-full sm:w-2/5 lg:w-full xl:w-full">
                        <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                            <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            Apakah tiket memiliki masa berlaku?
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">Ya, tiket hanya berlaku untuk acara yang telah Anda pilih saat pemesanan. Tiket tidak dapat digunakan untuk tanggal atau acara lain.</p>
                    </div>
                    <div class="mb-10 w-full sm:w-2/5 lg:w-full xl:w-full">
                        <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                            <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            Apakah tersedia harga khusus untuk pembelian grup?
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400">Kami menawarkan harga khusus untuk pembelian grup minimal 10 tiket. Hubungi tim kami untuk mendapatkan penawaran terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>
</x-layout>