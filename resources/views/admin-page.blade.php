<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    <x-admin-sidebar>
        <main class="h-screen"></main>
    </x-admin-sidebar>
</x-layout>