@extends('front.layouts.app')

@section('content')
<!-- Hero Section Custom -->
<section class="custom-hero">
    <h1>Selamat Datang di Company Profile Kami</h1>
    <a href="/tentang-kami" class="btn">Pelajari Lebih Lanjut</a>
</section>

<!-- Featured Sections dari Database -->
<!-- front/home.blade.php -->
@if($page)
<h1>{{ $page->title }}</h1>
<div>{!! $page->content !!}</div>

@foreach($featuredSections as $section)
<div class="section">
    <h2>{{ $section->type }}</h2>
    <div>{!! $section->content !!}</div>
</div>
@endforeach
@endif

@endsection