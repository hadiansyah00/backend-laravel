@extends('front.layouts.app')

@section('content')
<!-- Hero Section Custom -->
<section class="custom-hero">
    <h1>Selamat Datang di Company Profile Kami</h1>
    <a href="/tentang-kami" class="btn">Pelajari Lebih Lanjut</a>
</section>

<!-- Featured Sections dari Database -->
@foreach($featuredSections as $section)
@include("front.pages.partials.{$section->type}", [
'data' => json_decode($section->content, true)
])
@endforeach
@endsection