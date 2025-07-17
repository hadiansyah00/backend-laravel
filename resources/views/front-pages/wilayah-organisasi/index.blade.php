@extends('layouts.app-front')

@section('content')
{{-- Panggil Navbar --}}
@include('front-pages.partials.navbar')

{{-- Header Halaman --}}
<header class="pt-32 pb-16 text-center bg-purple-50">
    <div class="container px-6 mx-auto">
        <h1 class="text-4xl font-bold tracking-tight text-purple-800 md:text-5xl">
            Wilayah Pengorganisasian
        </h1>
        <p class="max-w-3xl mx-auto mt-4 text-lg text-purple-700">
            Jelajahi sebaran anggota dan komunitas PEREMPUAN AMAN di seluruh Nusantara. Klik pada setiap titik untuk
            menemukan cerita dan perjuangan mereka.
        </p>
    </div>
</header>

{{-- Section Peta Interaktif --}}
<section class="py-20 bg-white" x-data="{ modalOpen: false, modalData: {} }">
    <div class="container px-6 mx-auto">

        <div class="relative max-w-6xl mx-auto">
            {{-- 1. Gambar Peta Utuh sebagai Latar Belakang --}}
            <img src="{{ asset('assets/img/wilayah/peta-indonesia.png') }}"
                alt="Peta Wilayah Pengorganisasian PEREMPUAN AMAN" class="w-full h-auto">

            {{-- 2. Kumpulan Marker yang Diposisikan di Atas Peta --}}

            <button @click="modalOpen = true; modalData = {
                        title: 'Wilayah Adat Sumatera',
                        description: 'Deskripsi singkat mengenai kegiatan dan anggota di wilayah Sumatera.',
                        images: ['sumatera-1.jpg', 'sumatera-2.jpg']
                    }"
                class="absolute z-10 transition-transform duration-300 ease-in-out hover:scale-125 focus:outline-none"
                style="top: 45%; left: 15%;">
                <img src="{{ asset('assets/wilayah/pin-icon.svg') }}" alt="Pin Lokasi" class="w-6 h-6 drop-shadow-lg">
            </button>

            <button @click="modalOpen = true; modalData = {
                        title: 'Pengorganisasian Kalimantan',
                        description: 'Catatan penting dari Kalimantan. Komunitas di sini aktif dalam menjaga kearifan lokal.',
                        images: ['kalimantan-1.jpg']
                    }"
                class="absolute z-10 transition-transform duration-300 ease-in-out hover:scale-125 focus:outline-none"
                style="top: 42%; left: 40%;">
                <img src="{{ asset('assets/wilayah/pin-icon.svg') }}" alt="Pin Lokasi" class="w-6 h-6 drop-shadow-lg">
            </button>

            <button @click="modalOpen = true; modalData = {
                        title: 'Komunitas Adat Jawa',
                        description: 'Perjuangan komunitas adat di Jawa dalam mempertahankan ruang hidupnya.',
                        images: ['jawa-1.jpg']
                    }"
                class="absolute z-10 transition-transform duration-300 ease-in-out hover:scale-125 focus:outline-none"
                style="top: 72%; left: 38%;">
                <img src="{{ asset('assets/wilayah/pin-icon.svg') }}" alt="Pin Lokasi" class="w-6 h-6 drop-shadow-lg">
            </button>

        </div>
    </div>

    <div x-show="modalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
        <div @click="modalOpen = false" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
        <div @click.away="modalOpen = false" class="relative w-full max-w-3xl bg-white shadow-xl rounded-2xl">
            <button @click="modalOpen = false"
                class="absolute z-10 p-2 text-gray-500 bg-white rounded-full shadow-lg -top-4 -right-4 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div x-data="{ mainImage: '' }"
                x-init="$watch('modalData', value => { mainImage = value.images && value.images.length > 0 ? '/assets/img/wilayah/' + value.images[0] : '' })"
                class="p-6">
                <div class="mb-4 overflow-hidden rounded-lg">
                    <img :src="mainImage" alt="Gambar Utama Wilayah" class="object-cover w-full h-64 bg-gray-100">
                </div>
                <div class="flex -mx-2 overflow-x-auto">
                    <template x-for="image in modalData.images" :key="image">
                        <div class="flex-shrink-0 w-1/4 px-2">
                            <img :src="'/assets/img/wilayah/' + image"
                                @click="mainImage = '/assets/img/wilayah/' + image"
                                class="object-cover w-full h-20 border-2 rounded-md cursor-pointer"
                                :class="{ 'border-purple-600': mainImage === '/assets/img/wilayah/' + image }">
                        </div>
                    </template>
                </div>
                <div class="pt-6 mt-6 border-t">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800" x-text="modalData.title"></h3>
                    <p class="text-gray-600" x-text="modalData.description"></p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front-pages.partials.footer')
@endsection