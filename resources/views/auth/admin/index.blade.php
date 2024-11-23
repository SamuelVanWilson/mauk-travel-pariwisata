<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    
    <x-admin-sidebar>
        <div class=" overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Handphone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUser as $dataUser)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/profile/'.$dataUser->gambar) }}" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $dataUser->nama }}</div>
                                <div class="font-normal text-gray-500">{{ $dataUser->email }}</div>
                            </div>  
                        </th>
                        <td class="px-6 py-4 {{ ($dataUser->role->nama == 'admin') ? 'text-green-500' : 'text-gray-500' }}">
                            {{ $dataUser->role->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $dataUser->no_handphone }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('auth.update.akun') }}" class="font-medium text-purple-600 dark:text-purple-500 hover:underline">Edit</a>
                            <form action="{{ route('auth.destroy.akun', $dataUser->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </x-admin-sidebar>
    

</x-layout>