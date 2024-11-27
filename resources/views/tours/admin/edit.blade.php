<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    <x-admin-sidebar>
        
        <!-- Main modal -->
        <div  class=" top-0 right-0 left-0 justify-center items-center w-full md:inset-0 ">
            <div class=" p-4 w-full max-w-2xl  ">
                <!-- Modal content -->
                <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <a
                        href="{{ route('tours.show', $wisata->nama_wisata) }}   "
                        title=""
                        class=" py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        role="button"
                        >
                        Kembali
                    </a>
                    <!-- Modal header -->
                    <div class="flex justify-between flex-col items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Wisata
                        </h3>
                        <img src="{{ asset('storage/img_wisata/'.$wisata->gambar) }}" class="rounded-sm object-cover h-2/4 w-full">
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.update', $wisata->nama_wisata) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="nama_wisata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama_wisata" id="nama" value="{{ old('nama_wisata', $wisata->nama_wisata) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Nama Wisata" required>
                                @error('nama_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Wisata</label>
                                <input type="text" name="tempat_wisata" id="lokasi" value="{{ old('tempat_wisata', $wisata->tempat_wisata) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Product tempat" required>
                                @error('tempat_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input type="number" name="harga" id="harga" value="{{ old('harga', intval($wisata->harga)) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="$2999" required>
                                @error('harga')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                                    @foreach ($kategori as $item)
                                        @if ($wisata->nama_wisata == $item->nama)
                                            <option value="{{ $item->nama }}" selected>{{ $item->nama }}</option>
                                        @else
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kategori')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Wisata</label>
                                <textarea id="description" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Tulis Deskripsi Hal Yang Menarik Tentang Wisatanya">{{ old('deskripsi', $wisata->deskripsi) }}</textarea>                    
                                @error('deskripsi')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div>
                                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Wisata</label>
                                <input type="file" id="gambar" name="gambar" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg focus:ring-purple-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 " placeholder="Tulis Deskripsi Hal Yang Menarik Tentang Wisatanya"></input>                    
                                @error('gambar')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-layout>