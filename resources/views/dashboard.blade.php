<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <h3 class="font-bold">Menu Navigasi Sesuai Role:</h3>
                        <ul>
                            {{-- Tampilkan link ini jika user punya izin 'manage users' (hanya admin) --}}
                            @can('manage users')
                            <li><a href="{{ route('admin.users') }}" class="text-blue-500 hover:underline">Kelola
                                    User</a></li>
                            @endcan

                            {{-- Tampilkan link ini jika user punya izin 'manage articles' (admin & writer) --}}
                            @can('manage articles')
                            <li><a href="{{ route('articles.index') }}" class="text-blue-500 hover:underline">Kelola
                                    Artikel</a></li>
                            @endcan

                            {{-- Tampilkan link ini hanya untuk role 'admin' --}}
                            @role('admin')
                            <li class="text-green-600">Anda adalah seorang Admin.</li>
                            @endrole

                            {{-- Tampilkan link ini hanya untuk role 'writer' --}}
                            @role('writer')
                            <li class="text-yellow-600">Anda adalah seorang Penulis.</li>
                            @endrole
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>