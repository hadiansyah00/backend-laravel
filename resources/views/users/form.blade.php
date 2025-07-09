{{--
Form ini bersifat dinamis.
- Jika variabel $user ada (isset($user)), maka form ini akan menjadi form EDIT.
- Jika tidak ada, maka akan menjadi form CREATE.
--}}

@if ($errors->any())
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
    <p class="font-bold">Terjadi Kesalahan</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
    @csrf
    {{-- Method spoofing untuk form edit --}}
    @if (isset($user))
    @method('PUT')
    @endif

    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
            required>
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
            required>
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
            Password @if(isset($user)) (Baru, opsional) @endif
        </label>
        <input type="password" name="password" id="password"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
            {{ !isset($user) ? 'required' : '' }}>
        @if(isset($user))
        <p class="text-xs text-gray-600 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
        @endif
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi
            Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">Roles:</label>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
            @foreach ($roles as $role)
            <div class="flex items-center">
                <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->name }}"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{-- Cek jika role ini
                    sudah dimiliki user (untuk form edit) atau ada di input lama (jika validasi gagal) --}}
                    @if(isset($user) && $user->hasRole($role->name))
                checked
                @elseif(is_array(old('roles')) && in_array($role->name, old('roles')))
                checked
                @endif
                >
                <label for="role_{{ $role->id }}" class="ml-2 block text-sm text-gray-900">{{ $role->name }}</label>
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('users.index') }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
            Batal
        </a>
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ isset($user) ? 'Update' : 'Simpan' }}
        </button>
    </div>
</form>