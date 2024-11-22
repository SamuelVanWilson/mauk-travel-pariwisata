<x-header>
    <x-slot name="title">{{ $title }}</x-slot>
    @auth
        <x-slot name="gambar">{{ $gambar }}</x-slot>
    @endauth
</x-header>
    {{-- @auth('admin')
        
    @endauth --}}
    {{ $slot }}
<x-footer></x-footer>