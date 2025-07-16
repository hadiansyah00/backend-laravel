@extends('layouts.app-front')

@section('content')

{{-- Memanggil komponen Navbar dari folder partials --}}
@include('front-pages.partials.navbar')

{{-- Memanggil komponen Hero Section dari folder partials --}}
@include('front-pages.partials.hero')
@include('front-pages.partials.title')
@include('front-pages.partials.visi-misi')
@include('front-pages.partials.berita', ['berita' => $berita])
@include('front-pages.partials.video')
@include('front-pages.partials.buku', ['buku' => $buku])

{{-- Bagian Berita --}}

{{-- Bagian konten utama halaman depan --}}
{{-- Contoh bagian konten selanjutnya di bawah Hero Section --}}

{{-- Bagian konten utama halaman depan --}}
{{-- Contoh bagian konten selanjutnya di bawah Hero Section --}}

{{-- Bagian konten utama halaman depan --}}
{{-- Contoh bagian konten selanjutnya di bawah Hero Section --}}
<div class="py-20 bg-gray-50">
    <div class="container px-6 mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800">Program dan Kegiatan Kami</h2>
        <p class="max-w-3xl mx-auto mt-4 text-gray-600">
            Di sini Anda bisa menjelaskan lebih lanjut mengenai program-program unggulan, berita terbaru, atau informasi
            penting lainnya yang ingin ditampilkan di halaman depan.
        </p>
    </div>
</div>

{{-- Anda bisa menambahkan bagian lain seperti footer di sini --}}

@endsection