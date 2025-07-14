<x-app-layout>
    <x-navbar :menus="$menus" />

    <main class="container mx-auto py-8 px-4">
        @foreach($sections as $section)
        @includeIf("sections.{$section->type}", [
        'data' => json_decode($section->content, true)
        ])
        @endforeach
    </main>
</x-app-layout>