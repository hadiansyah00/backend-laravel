<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User: ') . $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Memanggil form terpadu, dan mengirim data 'user' dan 'roles' --}}
                    @include('users.form', ['user' => $user, 'roles' => $roles])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>