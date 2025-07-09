@if ($errors->any())
<div class="p-4 mb-4 text-red-700 bg-red-100 border-l-4 border-red-500" role="alert">
    <p class="font-bold">Terjadi Kesalahan</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}"
    method="POST">
    @csrf
    @if (isset($permission))
    @method('PUT')
    @endif

    <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nama Permission:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $permission->name ?? '') }}"
            placeholder="Contoh: manage products"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
            required>
    </div>

    <div class="flex items-center justify-end">
        <a href="{{ route('permissions.index') }}"
            class="px-4 py-2 mr-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700 focus:outline-none focus:shadow-outline">
            Batal
        </a>
        <button type="submit"
            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
            {{ isset($permission) ? 'Update' : 'Simpan' }}
        </button>
    </div>
</form>
