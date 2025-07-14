@extends('front.layouts.app')

@section('content')
@foreach($page->sections as $section)
@includeIf("front.pages.partials.{$section->type}", [
'data' => json_decode($section->content, true)
])
@endforeach
@endsection